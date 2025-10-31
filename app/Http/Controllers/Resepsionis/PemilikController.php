<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemilikController extends Controller
{
    public function create()
    {
        return view('dashboard.resepsionis.registrasi-pemilik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'no_wa' => 'required|string',
            'alamat' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            $iduser = DB::table('user')->insertGetId([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::table('pemilik')->insert([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
                'iduser' => $iduser,
            ]);
        });

        return back()->with('success', 'Pemilik berhasil didaftarkan.');
    }
}
