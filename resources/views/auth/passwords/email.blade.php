@extends('layouts.app')

@section('title', 'Lupa Password - RSHP UNAIR')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-[#f5f7ff]">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8 border border-gray-100 text-center">
    <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
         alt="Logo UNAIR" class="h-16 mx-auto mb-4">

    <h1 class="text-2xl font-bold text-[#002080] mb-3">Lupa Password</h1>
    <p class="text-gray-600 mb-6 text-sm">Masukkan alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password.</p>

    @if (session('status'))
      <div class="bg-green-100 border border-green-300 text-green-700 rounded-lg p-3 mb-5 text-sm">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5 text-left">
      @csrf

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Alamat Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/40 focus:outline-none @error('email') border-red-500 @enderror">
        @error('email')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
              class="w-full bg-[#002080] hover:bg-[#00185e] text-white py-2 rounded-lg font-semibold transition">
        Kirim Link Reset Password
      </button>

      <p class="text-center text-sm text-gray-600 mt-4">
        <a href="{{ route('login') }}" class="text-[#002080] hover:underline">Kembali ke Login</a>
      </p>
    </form>
  </div>
</section>
@endsection
