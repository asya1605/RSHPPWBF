<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $roles = $user->roles->pluck('nama_role')->map(fn($r) => strtolower($r))->toArray();

            if (in_array('administrator', $roles)) {
                return redirect()->route('dashboard.admin');
            } elseif (in_array('dokter', $roles)) {
                return redirect()->route('dashboard.dokter');
            } elseif (in_array('perawat', $roles)) {
                return redirect()->route('dashboard.perawat');
            } elseif (in_array('resepsionis', $roles)) {
                return redirect()->route('dashboard.resepsionis');
            } elseif (in_array('pemilik', $roles)) {
                return redirect()->route('dashboard.pemilik');
            }

            return redirect()->route('home');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
