<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Ambil role aktif user
            $role = DB::table('role_user')
                ->join('role', 'role.idrole', '=', 'role_user.idrole')
                ->where('role_user.iduser', $user->iduser)
                ->where('role_user.status', 1)
                ->value('role.nama_role');

            if (!$role) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Role tidak aktif.');
            }

            session(['role' => strtolower($role)]);

            switch (strtolower($role)) {
                case 'administrator':
                    return redirect()->route('dashboard.admin');
                case 'dokter':
                    return redirect()->route('dashboard.dokter');
                case 'perawat':
                    return redirect()->route('dashboard.perawat');
                case 'resepsionis':
                    return redirect()->route('dashboard.resepsionis');
                case 'pemilik':
                    return redirect()->route('dashboard.pemilik');
                default:
                    return redirect()->route('site.home');
            }
        }

        return back()->with('error', 'Email atau password salah!');
    }

    //  Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session role dan reset token
        $request->session()->forget('role');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama (menu publik)
        return redirect()->route('site.home')->with('success', 'Anda berhasil logout dari sistem.');
    }

    //  Form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = DB::table('role')->where('nama_role', 'Pemilik')->first();
        if ($role) {
            DB::table('role_user')->insert([
                'iduser' => $user->iduser,
                'idrole' => $role->idrole,
                'status' => 1,
            ]);
        }

        Auth::login($user);
        session(['role' => 'pemilik']);

        return redirect()->route('dashboard.pemilik')->with('success', 'Akun berhasil dibuat!');
    }
}
