<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    # Validasi 
    private function validateJenisHewan($request)
    {
        return $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan'
        ]);
    }

    # Format nama kapital 
    private function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }

    # Index 
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $list = DB::table('jenis_hewan')
            ->when(!$request->has('show_deleted'), fn($q) => $q->whereNull('deleted_at'))
            ->orderBy('idjenis_hewan', 'asc')
            ->get();


        return view('dashboard.admin.jenis-hewan.index', compact('list', 'showDeleted'));
    }

    # Form tambah 
    public function create()
    {
        return view('dashboard.admin.jenis-hewan.create');
    }

    # Simpan baru 
    public function store(Request $request)
    {
        $data = $this->validateJenisHewan($request);
        $data['nama_jenis_hewan'] = $this->formatNamaJenisHewan($data['nama_jenis_hewan']);

        JenisHewan::create($data);

        return redirect()->route('admin.jenis-hewan.index')
            ->with('success', '✅ Jenis hewan berhasil ditambahkan.');
    }

    # Edit 
    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('dashboard.admin.jenis-hewan.edit', compact('jenis'));
    }

    # Update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan'
        ]);

        $namaBaru = $this->formatNamaJenisHewan($request->nama_jenis_hewan);

        JenisHewan::where('idjenis_hewan', $id)->update(['nama_jenis_hewan' => $namaBaru]);

        return redirect()->route('admin.jenis-hewan.index')
            ->with('success', '✏️ Jenis hewan berhasil diperbarui.');
    }

    # Soft delete 
    public function destroy($id)
    {
        $used = DB::table('ras_hewan')->where('idjenis_hewan', $id)->exists();
        if ($used) {
            return redirect()->route('admin.jenis-hewan.index')
                ->with('danger', '⚠️ Tidak dapat dihapus: masih digunakan pada tabel ras.');
        }

        JenisHewan::findOrFail($id)->delete();

        return redirect()->route('admin.jenis-hewan.index')
            ->with('success', '🗑️ Jenis hewan berhasil dihapus (soft delete).');
    }

    # Restore data 
    public function restore($id)
    {
        JenisHewan::withTrashed()->where('idjenis_hewan', $id)->restore();
        return redirect()->route('admin.jenis-hewan.index')
            ->with('success', '♻️ Jenis hewan berhasil dipulihkan.');
    }
}
