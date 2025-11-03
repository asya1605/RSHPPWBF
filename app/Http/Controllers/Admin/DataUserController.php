<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    /** 🧩 Menampilkan semua user */
    public function index()
    {
        $users = DB::table('user')->orderBy('iduser')->get();
        return view('dashboard.admin.data-user.index', compact('users'));
    }

    /** ➕ Form tambah user */
    public function create()
    {
        return view('dashboard.admin.data-user.create');
    }

    /** 💾 Simpan user baru */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::table('user')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.data-user.index')->with('success', '✅ User baru berhasil ditambahkan!');
    }

    /** ✏️ Form edit user */
    public function edit($id)
    {
        $user = DB::table('user')->where('iduser', $id)->first();
        if (!$user) {
            return redirect()->route('admin.data-user.index')->with('danger', '❌ User tidak ditemukan.');
        }
        return view('dashboard.admin.data-user.edit', compact('user'));
    }

    /** 🧠 Update nama user */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        DB::table('user')->where('iduser', $id)->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.data-user.index')->with('success', '✏️ Data user berhasil diperbarui!');
    }

    /** 🔒 Reset password ke default */
    public function reset($id)
    {
        $user = DB::table('user')->where('iduser', $id)->first();
        if (!$user) {
            return redirect()->route('admin.data-user.index')->with('danger', '❌ User tidak ditemukan.');
        }

        DB::table('user')->where('iduser', $id)->update([
            'password' => Hash::make('123456'),
        ]);

        return redirect()->route('admin.data-user.index')->with('success', '🔁 Password user berhasil direset menjadi: 123456');
    }

    /** ❌ Hapus user */
    public function destroy($id)
    {
        try {
            DB::table('user')->where('iduser', $id)->delete();
            return redirect()->route('admin.data-user.index')->with('success', '🗑️ User berhasil dihapus!');
        } catch (\Throwable $e) {
            return redirect()->route('admin.data-user.index')->with('danger', '⚠️ Gagal menghapus user.');
        }
    }
}
