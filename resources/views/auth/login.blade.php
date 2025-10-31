@extends('layouts.public')

@section('title', 'Login - RSHP Universitas Airlangga')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-[#f5f7ff] px-6 py-10">
  <div class="bg-white shadow-xl rounded-2xl w-full max-w-2xl p-10 border border-gray-100">
    
    {{-- Header Form --}}
    <div class="text-center mb-8">
      <h1 class="text-3xl font-bold text-[#002080]">Login ke Sistem RSHP</h1>
      <p class="text-gray-600 text-sm mt-2">
        Masuk untuk mengakses layanan dan data sesuai peran Anda di RSHP Universitas Airlangga
      </p>
    </div>

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
      @csrf
      
      {{-- Email --}}
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#002080]/40 focus:border-[#002080] focus:outline-none @error('email') border-red-500 @enderror">
        @error('email')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#002080]/40 focus:border-[#002080] focus:outline-none @error('password') border-red-500 @enderror">
        @error('password')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember & Forgot --}}
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center gap-2">
          <input type="checkbox" name="remember" class="accent-[#002080]" {{ old('remember') ? 'checked' : '' }}>
          <span>Ingat saya</span>
        </label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-[#002080] hover:underline font-medium">
            Lupa password?
          </a>
        @endif
      </div>

      {{-- Tombol Login --}}
      <div class="pt-3">
        <button type="submit"
                class="w-full bg-[#002080] hover:bg-[#00185e] text-white py-2.5 rounded-lg font-semibold text-sm transition">
          Masuk
        </button>
      </div>
    </form>

    {{-- Register Link --}}
    <p class="text-center text-sm text-gray-600 mt-8">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-[#002080] font-semibold hover:underline">Daftar Sekarang</a>
    </p>
  </div>
</section>
@endsection
