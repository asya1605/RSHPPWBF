<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PetController extends Controller
{
    # Helper untuk redirect dengan pesan
    private function redirectMsg($route, $msg, $type = 'success')
    {
        return redirect()->route($route)->with($type, $msg);
    }

    # Index (aktif & terhapus)
    public function index(Request $request)
    {
        try {
        $query = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'pet.*',
                'pemilik.nama as nama_pemilik',
                'pemilik.email as email_pemilik',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->orderBy('pet.idpet', 'asc');  


            // Filter: tampilkan data aktif atau yang sudah dihapus
            if ($request->has('show_deleted')) {
                $query->whereNotNull('pet.deleted_at');
            } else {
                $query->whereNull('pet.deleted_at');
            }

            $pets = $query->get();

            return view('dashboard.admin.pet.index', [
                'pets' => $pets,
                'showDeleted' => $request->has('show_deleted')
            ]);
        } catch (\Throwable $e) {
            Log::error('Gagal menampilkan pet: ' . $e->getMessage());
            return back()->with('danger', 'Gagal memuat data pet.');
        }
    }

    # Create
    public function create()
    {
        $pemilikList = DB::table('pemilik')
            ->whereNull('deleted_at')
            ->orderBy('nama')
            ->get();

        $rasList = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->whereNull('ras_hewan.deleted_at')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('nama_ras')
            ->get();

        return view('dashboard.admin.pet.create', compact('pemilikList', 'rasList'));
    }

    # Store
    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:M,F',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);

        try {
            DB::table('pet')->insert([
                'nama' => $r->nama,
                'tanggal_lahir' => $r->tanggal_lahir,
                'warna_tanda' => $r->warna_tanda,
                'jenis_kelamin' => $r->jenis_kelamin,
                'idpemilik' => $r->idpemilik,
                'idras_hewan' => $r->idras_hewan,
            ]);

            return $this->redirectMsg('admin.pet.index', '🐶 Data Pet berhasil ditambahkan!');
        } catch (\Throwable $e) {
            Log::error('Insert pet error: ' . $e->getMessage());
            return back()->withInput()->with('danger', 'Gagal menambahkan data pet.');
        }
    }

   # Edit
    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();
        if (!$pet) {
            return $this->redirectMsg('admin.pet.index', 'Data Pet tidak ditemukan.', 'danger');
        }

        $pemilikList = DB::table('pemilik')
            ->whereNull('deleted_at')
            ->orderBy('nama')
            ->get();

        $rasList = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->whereNull('ras_hewan.deleted_at')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('nama_ras')
            ->get();

        return view('dashboard.admin.pet.edit', compact('pet', 'pemilikList', 'rasList'));
    }

    # Update
    public function update(Request $r, $id)
    {
        $r->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:M,F',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);

        try {
            DB::table('pet')->where('idpet', $id)->update([
                'nama' => $r->nama,
                'tanggal_lahir' => $r->tanggal_lahir,
                'warna_tanda' => $r->warna_tanda,
                'jenis_kelamin' => $r->jenis_kelamin,
                'idpemilik' => $r->idpemilik,
                'idras_hewan' => $r->idras_hewan,
            ]);

            return $this->redirectMsg('admin.pet.index', '✅ Data Pet berhasil diperbarui!');
        } catch (\Throwable $e) {
            Log::error('Update pet error: ' . $e->getMessage());
            return back()->withInput()->with('danger', 'Gagal memperbarui data pet.');
        }
    }

    # Soft Delete
    public function destroy($id)
    {
        try {
            DB::table('pet')->where('idpet', $id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_by' => Auth::id(),
            ]);
            return back()->with('success', '🗑️ Data Pet berhasil dihapus (soft delete).');
        } catch (\Throwable $e) {
            Log::error('Soft delete pet error: ' . $e->getMessage());
            return back()->with('danger', 'Gagal menghapus data pet.');
        }
    }

    # Restore
    public function restore($id)
    {
        try {
            DB::table('pet')->where('idpet', $id)->update([
                'deleted_at' => null,
                'deleted_by' => null,
            ]);
            return back()->with('success', '♻️ Data Pet berhasil dipulihkan.');
        } catch (\Throwable $e) {
            Log::error('Restore pet error: ' . $e->getMessage());
            return back()->with('danger', 'Gagal memulihkan data pet.');
        }
    }
}
