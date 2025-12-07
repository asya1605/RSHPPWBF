<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PemilikController extends Controller
{
    # Helper untuk redirect dengan pesan
    private function redirectWithMessage($route, $message, $type = 'success')
    {
        return redirect()->route($route)->with($type, $message);
    }

   # Index (aktif & terhapus)
    public function index(Request $request)
    {
        try {
        $query = DB::table('pemilik')
            ->select('idpemilik', 'nama', 'email', 'no_wa', 'alamat', 'deleted_at', 'deleted_by')
            ->orderBy('idpemilik', 'asc'); // urut ID dari kecil ke besar

            // Jika user klik toggle show_deleted, tampilkan data terhapus
            if ($request->has('show_deleted')) {
                $query->whereNotNull('deleted_at');
            } else {
                $query->whereNull('deleted_at');
            }

            $pemilikList = $query->get();

            return view('dashboard.admin.pemilik.index', [
                'pemilikList' => $pemilikList,
                'showDeleted' => $request->has('show_deleted')
            ]);
        } catch (QueryException $e) {
            Log::error("Error fetch pemilik: " . $e->getMessage());
            return back()->with('danger', 'Gagal memuat data pemilik.');
        }
    }

   # Create
    public function create()
    {
        return view('dashboard.admin.pemilik.create');
    }

    # Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|unique:user,email',
            'password' => 'required|min:5',
            'no_wa'    => 'required|string|max:20',
            'alamat'   => 'required|string|max:255',
        ]);

        // ambil idrole untuk Pemilik (dari tabel role)
        $idrolePemilik = DB::table('role')
            ->where('nama_role', 'Pemilik')
            ->value('idrole');

        try {
            DB::transaction(function () use ($validated, $idrolePemilik) {
                // 1) buat akun di tabel user
                $iduser = DB::table('user')->insertGetId([
                    'nama'     => $validated['nama'],
                    'email'    => $validated['email'],
                    'password' => bcrypt($validated['password']),
                ]);

                // 2) buat data pemilik, hubungkan ke user lewat id_user
                DB::table('pemilik')->insert([
                    'nama'     => $validated['nama'],
                    'email'    => $validated['email'],
                    'password' => bcrypt($validated['password']),
                    'no_wa'    => $validated['no_wa'],
                    'alamat'   => $validated['alamat'],
                    'id_user'  => $iduser,
                ]);

                // 3) KASIH ROLE PEMILIK 🔥
                DB::table('role_user')->insert([
                    'iduser' => $iduser,
                    'idrole' => $idrolePemilik, // misal 5
                    'status' => 1,
                ]);
            });

            return $this->redirectWithMessage(
                'admin.pemilik.index',
                '✅ Pemilik baru berhasil ditambahkan.'
            );
        } catch (\Throwable $e) {
            Log::error("Error insert pemilik (admin): " . $e->getMessage());
            return back()->withInput()->with('danger', 'Gagal menambahkan data.');
        }
    }


   # Edit
    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        if (!$pemilik) {
            return $this->redirectWithMessage('admin.pemilik.index', 'Data tidak ditemukan.', 'danger');
        }
        return view('dashboard.admin.pemilik.edit', compact('pemilik'));
    }

    # Update
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

    # Soft Delete
    public function destroy($id)
    {
        try {
            $cek = DB::table('pet')->where('idpemilik', $id)->count();
            if ($cek > 0) {
                return back()->with('danger', "Tidak bisa dihapus. Masih dipakai di $cek data pet.");
            }

            DB::table('pemilik')->where('idpemilik', $id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_by' => Auth::id(),
            ]);

            return back()->with('success', '🗑️ Data pemilik berhasil dihapus (soft delete).');
        } catch (\Throwable $e) {
            Log::error("Error soft delete pemilik: " . $e->getMessage());
            return back()->with('danger', 'Gagal menghapus data.');
        }
    }

    #
    public function restore($id)
    {
        try {
            DB::table('pemilik')->where('idpemilik', $id)->update([
                'deleted_at' => null,
                'deleted_by' => null,
            ]);

            return back()->with('success', '♻️ Data pemilik berhasil dipulihkan.');
        } catch (\Throwable $e) {
            Log::error("Error restore pemilik: " . $e->getMessage());
            return back()->with('danger', 'Gagal memulihkan data.');
        }
    }
}
