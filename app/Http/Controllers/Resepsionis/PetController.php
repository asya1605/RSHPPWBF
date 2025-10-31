<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function create(Request $request)
    {
        $jenisList = DB::table('jenis_hewan')->orderBy('nama_jenis_hewan')->get();
        $rasList = DB::table('ras_hewan')->orderBy('nama_ras')->get();
        $pemilikList = DB::table('pemilik')->orderBy('nama')->get();

        return view('dashboard.resepsionis.registrasi-pet.create', compact('jenisList', 'rasList', 'pemilikList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string',
            'jenis_kelamin' => 'required|in:M,F',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        DB::table('pet')->insert([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);

        return back()->with('success', 'Pet berhasil didaftarkan.');
    }
}
