<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PetController extends Controller
{
    /** Helper pesan redirect */
    private function redirectMsg($route, $msg, $type = 'success')
    {
        return redirect()->route($route)->with($type, $msg);
    }

    /** 🔹 Tampilkan semua data Pet */
    public function index()
    {
        try {
            $pets = DB::table('pet')
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
                ->orderBy('pet.nama')
                ->get();

            return view('dashboard.admin.pet.index', compact('pets'));
        } catch (\Throwable $e) {
            Log::error('Gagal menampilkan pet: ' . $e->getMessage());
            return back()->with('danger', 'Gagal memuat data pet.');
        }
    }

    /** 🔹 Form tambah Pet */
    public function create()
    {
        $pemilikList = DB::table('pemilik')->orderBy('nama')->get();
        $rasList = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('nama_ras')
            ->get();

        return view('dashboard.admin.pet.create', compact('pemilikList', 'rasList'));
    }

    /** 🔹 Simpan data baru */
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

    /** 🔹 Form edit */
    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();
        if (!$pet) {
            return $this->redirectMsg('admin.pet.index', 'Data Pet tidak ditemukan.', 'danger');
        }

        $pemilikList = DB::table('pemilik')->orderBy('nama')->get();
        $rasList = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('nama_ras')
            ->get();

        return view('dashboard.admin.pet.edit', compact('pet', 'pemilikList', 'rasList'));
    }

    /** 🔹 Update data */
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

    /** 🔹 Hapus data */
    public function destroy($id)
    {
        try {
            DB::table('pet')->where('idpet', $id)->delete();
            return back()->with('success', '🗑️ Data Pet berhasil dihapus.');
        } catch (\Throwable $e) {
            Log::error('Delete pet error: ' . $e->getMessage());
            return back()->with('danger', 'Gagal menghapus data pet.');
        }
    }
}
