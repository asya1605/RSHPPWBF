<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class PemilikController extends Controller
{
    /** Helper flash message */
    private function redirectWithMessage($route, $message, $type = 'success')
    {
        return redirect()->route($route)->with($type, $message);
    }

    /** Tampilkan semua data pemilik */
    public function index()
    {
        try {
            $pemilikList = DB::table('pemilik')
                ->select('idpemilik', 'nama', 'email', 'no_wa', 'alamat')
                ->orderBy('nama')
                ->get();
            return view('dashboard.admin.pemilik.index', compact('pemilikList'));
        } catch (QueryException $e) {
            Log::error("Error fetch pemilik: " . $e->getMessage());
            return back()->with('danger', 'Gagal memuat data pemilik.');
        }
    }

    /** Form tambah pemilik */
    public function create()
    {
        return view('dashboard.admin.pemilik.create');
    }

    /** Simpan data baru */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:pemilik,email',
            'password' => 'required|min:5',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ], [
            'email.unique' => 'Email ini sudah digunakan!',
            'password.min' => 'Password minimal 5 karakter.',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $idpemilik = DB::table('pemilik')->insertGetId([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                    'no_wa' => $validated['no_wa'],
                    'alamat' => $validated['alamat'],
                ]);

                $role = DB::table('role')->where('nama_role', 'Pemilik')->first();
                $idrole = $role ? $role->idrole : DB::table('role')->insertGetId(['nama_role' => 'Pemilik']);

                $iduser = DB::table('user')->insertGetId([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                ]);

                DB::table('role_user')->insert([
                    'iduser' => $iduser,
                    'idrole' => $idrole,
                    'status' => 1,
                ]);
            });

            return $this->redirectWithMessage('admin.pemilik.index', '✅ Pemilik baru berhasil ditambahkan.');
        } catch (\Throwable $e) {
            Log::error("Error insert pemilik: " . $e->getMessage());
            return back()->withInput()->with('danger', 'Gagal menambahkan data.');
        }
    }

    /** Form edit */
    public function edit($id)
    {
        try {
            $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
            if (!$pemilik) {
                return $this->redirectWithMessage('admin.pemilik.index', 'Data tidak ditemukan.', 'danger');
            }
            return view('dashboard.admin.pemilik.edit', compact('pemilik'));
        } catch (\Throwable $e) {
            return $this->redirectWithMessage('admin.pemilik.index', 'Terjadi kesalahan memuat data.', 'danger');
        }
    }

    /** Update data */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'no_wa' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        try {
            DB::table('pemilik')->where('idpemilik', $id)->update($validated);
            return $this->redirectWithMessage('admin.pemilik.index', '✅ Data pemilik berhasil diperbarui.');
        } catch (\Throwable $e) {
            Log::error("Error update pemilik: " . $e->getMessage());
            return back()->withInput()->with('danger', 'Gagal memperbarui data.');
        }
    }

    /** Hapus data */
    public function destroy($id)
    {
        try {
            $cek = DB::table('pet')->where('idpemilik', $id)->count();
            if ($cek > 0) {
                return back()->with('danger', "Tidak bisa dihapus. Masih dipakai di $cek data pet.");
            }

            DB::table('pemilik')->where('idpemilik', $id)->delete();
            return back()->with('success', '🗑️ Data pemilik berhasil dihapus.');
        } catch (\Throwable $e) {
            Log::error("Error delete pemilik: " . $e->getMessage());
            return back()->with('danger', 'Gagal menghapus data.');
        }
    }
}
