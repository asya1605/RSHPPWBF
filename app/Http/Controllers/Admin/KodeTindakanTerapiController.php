<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class KodeTindakanTerapiController extends Controller
{
    /**
     * Helper untuk redirect dengan pesan flash.
     */
    private function redirectWithMessage($route, $message, $type = 'success')
    {
        return redirect()->route($route)->with($type, $message);
    }

    /**
     * Tampilkan daftar semua kode tindakan terapi.
     */
    public function index()
    {
        try {
            $data = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
            return view('dashboard.admin.kode-tindakan-terapi.index', compact('data'));
        } catch (QueryException $e) {
            Log::error("Error fetching kode tindakan terapi: " . $e->getMessage());
            return back()->with('error', 'Gagal memuat data kode tindakan terapi.');
        }
    }

    /**
     * Tampilkan form tambah kode tindakan terapi.
     */
    public function create()
    {
        try {
            $kategori = Kategori::all();
            $kategori_klinis = KategoriKlinis::all();
            return view('dashboard.admin.kode-tindakan-terapi.create', compact('kategori', 'kategori_klinis'));
        } catch (\Exception $e) {
            Log::error("Error loading create form: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', 'Gagal membuka halaman tambah data.', 'error');
        }
    }

    /**
     * Simpan data baru kode tindakan terapi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ], [
            'kode.unique' => 'Kode ini sudah digunakan, silakan gunakan kode lain.',
            'idkategori.exists' => 'Kategori tidak ditemukan.',
            'idkategori_klinis.exists' => 'Kategori klinis tidak ditemukan.',
        ]);

        try {
            KodeTindakanTerapi::create($request->all());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', 'Data berhasil ditambahkan!');
        } catch (QueryException $e) {
            Log::error("Error creating kode tindakan terapi: " . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Tampilkan form edit kode tindakan terapi.
     */
    public function edit($id)
    {
        try {
            $item = KodeTindakanTerapi::findOrFail($id);
            $kategori = Kategori::all();
            $kategori_klinis = KategoriKlinis::all();

            return view('dashboard.admin.kode-tindakan-terapi.edit', compact('item', 'kategori', 'kategori_klinis'));
        } catch (\Exception $e) {
            Log::error("Error editing kode tindakan terapi ID {$id}: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', 'Data tidak ditemukan.', 'error');
        }
    }

    /**
     * Update data kode tindakan terapi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ]);

        try {
            $item = KodeTindakanTerapi::findOrFail($id);
            $item->update($request->all());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', 'Data berhasil diperbarui.');
        } catch (QueryException $e) {
            Log::error("Error updating kode tindakan terapi ID {$id}: " . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui data. Silakan coba lagi.');
        }
    }

    /**
     * Hapus data kode tindakan terapi.
     */
    public function destroy($id)
    {
        try {
            $item = KodeTindakanTerapi::findOrFail($id);
            $item->delete();
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error("Error deleting kode tindakan terapi ID {$id}: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', 'Gagal menghapus data.', 'error');
        }
    }
}
