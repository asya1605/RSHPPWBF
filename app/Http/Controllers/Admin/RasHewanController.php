<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
   ### 🔹 Index (aktif & terhapus)
public function index(Request $request)
{
    $showDeleted = $request->boolean('show_deleted');

    $query = RasHewan::query()
        ->with(['jenis' => function ($q) {
            $q->select('idjenis_hewan', 'nama_jenis_hewan');
        }]);

    // toggle: aktif / terhapus
    if ($showDeleted) {
        $query->onlyTrashed();
    }

    $rasList = $query
        ->orderBy('idjenis_hewan', 'asc')  // urut per jenis (FK)
        ->orderBy('idras_hewan', 'asc')    // urut per ID ras di dalam jenis tsb
        ->get();

    return view('dashboard.admin.ras-hewan.index', [
        'rasList'     => $rasList,
        'showDeleted' => $showDeleted,
    ]);
}


    # Create
    public function create()
    {
        $jenisList = JenisHewan::orderBy('nama_jenis_hewan')->get();
        return view('dashboard.admin.ras-hewan.create', compact('jenisList'));
    }

    # Store
    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100|unique:ras_hewan,nama_ras',
            'idjenis_hewan' => 'required|integer|exists:jenis_hewan,idjenis_hewan',
        ]);

        RasHewan::create($request->only(['nama_ras', 'idjenis_hewan']));

        return redirect()->route('admin.ras-hewan.index')
            ->with('success', '✅ Ras hewan berhasil ditambahkan!');
    }

    # Edit
    public function edit($id)
    {
        $ras = RasHewan::find($id);
        $jenisList = JenisHewan::orderBy('nama_jenis_hewan')->get();

        if (!$ras) {
            return redirect()->route('admin.ras-hewan.index')
                ->with('danger', '❌ Data ras tidak ditemukan.');
        }

        return view('dashboard.admin.ras-hewan.edit', compact('ras', 'jenisList'));
    }

    # Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100|unique:ras_hewan,nama_ras,' . $id . ',idras_hewan',
            'idjenis_hewan' => 'required|integer|exists:jenis_hewan,idjenis_hewan',
        ]);

        RasHewan::where('idras_hewan', $id)->update([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras-hewan.index')
            ->with('success', '✏️ Data ras hewan berhasil diperbarui!');
    }

    # Soft Delete
    public function destroy($id)
    {
        $used = DB::table('pet')->where('idras_hewan', $id)->exists();
        if ($used) {
            return redirect()->route('admin.ras-hewan.index')
                ->with('danger', '⚠️ Tidak dapat dihapus: masih digunakan pada data Pet.');
        }

        RasHewan::findOrFail($id)->delete();

        return redirect()->route('admin.ras-hewan.index')
            ->with('success', '🗑️ Ras hewan berhasil dihapus (soft delete).');
    }

    # Restore
    public function restore($id)
    {
        RasHewan::withTrashed()->where('idras_hewan', $id)->restore();

        return redirect()->route('admin.ras-hewan.index')
            ->with('success', '♻️ Ras hewan berhasil dipulihkan.');
    }
}
