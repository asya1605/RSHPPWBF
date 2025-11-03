<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class RoleUserController extends Controller
{
    /** 🟢 Menampilkan semua user & role */
    public function index()
    {
        $users = User::with('roles')->orderBy('nama')->get();
        $roles = Role::orderBy('nama_role')->get();

        return view('dashboard.admin.role-user.index', compact('users', 'roles'));
    }

    /** 🟡 Tambah atau assign role ke user */
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);

        $user = User::findOrFail($request->iduser);
        $role = Role::findOrFail($request->idrole);
        $isActive = $request->has('status') ? 1 : 0;

        if ($isActive) {
            // Nonaktifkan role lain milik user sebelum aktifkan role baru
            $user->roles()->updateExistingPivot($user->roles->pluck('idrole'), ['status' => 0]);
        }

        // Tambah role baru (tanpa duplikasi)
        $user->roles()->syncWithoutDetaching([$role->idrole => ['status' => $isActive]]);

        return redirect()->route('admin.role-user.index')->with('success', '✅ Role berhasil ditambahkan atau diperbarui.');
    }

    /** 🟢 Form konfirmasi aktifkan role */
    public function setActive($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.set_active', compact('iduser', 'idrole'));
    }

    /** 🟢 Proses aktifkan role */
    public function setActiveConfirm(Request $request)
    {
        $user = User::findOrFail($request->iduser);
        $user->roles()->updateExistingPivot($user->roles->pluck('idrole'), ['status' => 0]);
        $user->roles()->updateExistingPivot($request->idrole, ['status' => 1]);

        return redirect()->route('admin.role-user.index')->with('success', '✅ Role berhasil dijadikan aktif.');
    }

    /** ⚫ Form konfirmasi nonaktifkan role */
    public function deactivate($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.deactivate', compact('iduser', 'idrole'));
    }

    /** ⚫ Proses nonaktifkan role */
    public function deactivateConfirm(Request $request)
    {
        DB::table('role_user')
            ->where('iduser', $request->iduser)
            ->where('idrole', $request->idrole)
            ->update(['status' => 0]);

        return redirect()->route('admin.role-user.index')->with('success', '🟤 Role berhasil dinonaktifkan.');
    }

    /** 🔴 Hapus role dari user */
    public function destroyConfirm(Request $request)
    {
        $user = User::findOrFail($request->iduser);
        $user->roles()->detach($request->idrole);

        return redirect()->route('admin.role-user.index')->with('danger', '🗑️ Role berhasil dihapus dari user.');
    }
}
