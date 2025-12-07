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
                'nama'     => 'required|string',
                'email'    => 'required|email|unique:user,email',
                'password' => 'required|min:6',
                'no_wa'    => 'required|string',
                'alamat'   => 'required|string',
            ]);

            // ambil idrole untuk "Pemilik" dari tabel role
            $idrolePemilik = DB::table('role')
                ->where('nama_role', 'Pemilik') // pastikan di tabel role ada baris ini
                ->value('idrole');

            DB::transaction(function () use ($request, $idrolePemilik) {
                // 1) insert ke tabel user
                $iduser = DB::table('user')->insertGetId([
                    'nama'     => $request->nama,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                // 2) insert ke tabel pemilik
                DB::table('pemilik')->insert([
                    'nama'     => $request->nama,
                    'email'    => $request->email,
                    'no_wa'    => $request->no_wa,
                    'alamat'   => $request->alamat,
                    'id_user'  => $iduser,
                    'password' => Hash::make($request->password),
                ]);

                // 3) kasih role PEMILIK di tabel role_user
                DB::table('role_user')->insert([
                    'iduser' => $iduser,
                    'idrole' => $idrolePemilik, // misal 5
                    'status' => 1,
                ]);
            });

            return back()->with('success', 'Pemilik berhasil didaftarkan.');
        }
    }