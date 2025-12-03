<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class RoleUserController extends Controller
{
    ###  Daftar role dan user beserta relasinya
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');
        $users = User::with('roles')->orderBy('nama')->get();
        $roles = $showDeleted
            ? Role::onlyTrashed()->orderBy('nama_role')->get()
            : Role::orderBy('nama_role')->get();

        return view('dashboard.admin.role-user.index', compact('users', 'roles', 'showDeleted'));
    }

    # Add or update role for user
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);

        $user = User::findOrFail($request->iduser);
        $isActive = $request->has('status') ? 1 : 0;

        if ($isActive) {
            $user->roles()->updateExistingPivot($user->roles->pluck('idrole'), ['status' => 0]);
        }

        $user->roles()->syncWithoutDetaching([$request->idrole => ['status' => $isActive]]);

        return redirect()->route('admin.role-user.index')->with('success', '✅ Role berhasil ditambahkan atau diperbarui.');
    }

    # Create new role
    public function createRole(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100|unique:role,nama_role',
        ]);

        Role::create(['nama_role' => $request->nama_role]);

        return redirect()->route('admin.role-user.index')->with('success', '🆕 Role baru berhasil ditambahkan.');
    }

    # Delete role (soft delete)
    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.role-user.index')->with('success', '🗑️ Role berhasil dihapus (soft delete).');
    }

   # Restore deleted role
    public function restoreRole($id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        $role->restore();

        return redirect()->route('admin.role-user.index', ['show_deleted' => 1])
            ->with('success', '♻️ Role berhasil dipulihkan.');
    }

    # Form konfirmasi aktifkan role
    public function setActive($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.set_active', compact('iduser', 'idrole'));
    }

    # Proses aktifkan role
    public function setActiveConfirm(Request $request)
    {
        $user = User::findOrFail($request->iduser);
        $user->roles()->updateExistingPivot($user->roles->pluck('idrole'), ['status' => 0]);
        $user->roles()->updateExistingPivot($request->idrole, ['status' => 1]);

        return redirect()->route('admin.role-user.index')->with('success', '✅ Role berhasil dijadikan aktif.');
    }

   # Form konfirmasi nonaktifkan role
    public function deactivate($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.deactivate', compact('iduser', 'idrole'));
    }

    # Proses nonaktifkan role
    public function deactivateConfirm(Request $request)
    {
        DB::table('role_user')
            ->where('iduser', $request->iduser)
            ->where('idrole', $request->idrole)
            ->update(['status' => 0]);

        return redirect()->route('admin.role-user.index')->with('success', '🟤 Role berhasil dinonaktifkan.');
    }

    # Form konfirmasi hapus role dari user
    public function destroyConfirm(Request $request)
    {
        $user = User::findOrFail($request->iduser);
        $user->roles()->detach($request->idrole);

        return redirect()->route('admin.role-user.index')->with('danger', '🗑️ Role berhasil dihapus dari user.');
    }
}
