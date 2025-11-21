@extends('layouts.public')

@section('title', 'Register - RSHP Universitas Airlangga')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-[#f5f7ff] px-6 py-10">
  <div class="bg-white shadow-xl rounded-2xl w-full max-w-2xl p-10 border border-gray-100">

    {{-- Header --}}
    <div class="text-center mb-8">
      <h1 class="text-3xl font-bold text-[#002080]">Daftar Akun RSHP</h1>
      <p class="text-gray-600 text-sm mt-2">
        Isi data diri Anda untuk membuat akun baru dan mengakses layanan RSHP Universitas Airlangga
      </p>
    </div>

    {{-- Form Register --}}
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      {{-- Nama --}}
      <div>
        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
        <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#002080]/40 focus:border-[#002080] focus:outline-none @error('nama') border-red-500 @enderror">
        @error('nama')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

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

      {{-- Konfirmasi Password --}}
      <div>
        <label for="password-confirm" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#002080]/40 focus:border-[#002080] focus:outline-none">
      </div>

      {{-- Tombol Daftar --}}
      <div class="pt-3">
        <button type="submit"
                class="w-full bg-[#002080] hover:bg-[#00185e] text-white py-2.5 rounded-lg font-semibold text-sm transition">
          Daftar Sekarang
        </button>
      </div>
    </form>

    {{-- Link ke Login --}}
    <p class="text-center text-sm text-gray-600 mt-8">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="text-[#002080] font-semibold hover:underline">Masuk di sini</a>
    </p>
  </div>
</section>
@endsection
