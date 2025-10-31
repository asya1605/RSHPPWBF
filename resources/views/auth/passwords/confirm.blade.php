@extends('layouts.app')

@section('title', 'Konfirmasi Password - RSHP UNAIR')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-[#f5f7ff]">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8 border border-gray-100 text-center">
    <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
         alt="Logo UNAIR" class="h-16 mx-auto mb-4">
    <h1 class="text-2xl font-bold text-[#002080] mb-3">Konfirmasi Password</h1>
    <p class="text-gray-600 mb-6 text-sm">Silakan konfirmasi password Anda sebelum melanjutkan ke halaman berikutnya.</p>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5 text-left">
      @csrf

      {{-- Password --}}
      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/40 focus:outline-none @error('password') border-red-500 @enderror">
        @error('password')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Tombol --}}
      <div class="pt-2 text-center">
        <button type="submit"
                class="w-full bg-[#002080] hover:bg-[#00185e] text-white py-2 rounded-lg font-semibold transition">
          Konfirmasi Password
        </button>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="block mt-3 text-sm text-[#002080] hover:underline">
            Lupa password?
          </a>
        @endif
      </div>
    </form>
  </div>
</section>
@endsection
