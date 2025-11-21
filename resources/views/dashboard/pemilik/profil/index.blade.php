@extends('layouts.pemilik')
@section('title', 'Profil Pemilik - RSHP UNAIR')

@section('content')
<section class="p-8 bg-[#f5f7ff] min-h-screen flex justify-center items-center">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg border border-gray-100">
    <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">🐾 Profil Pemilik</h1>

    <div class="space-y-3 text-sm">
      <p><strong>Nama:</strong> {{ $profil->nama ?? '-' }}</p>
      <p><strong>Email:</strong> {{ $profil->email ?? '-' }}</p>
      <p><strong>No. HP:</strong> {{ $profil->no_hp ?? '-' }}</p>
      <p><strong>Alamat:</strong> {{ $profil->alamat ?? '-' }}</p>
      <p><strong>Jumlah Hewan Terdaftar:</strong> {{ $jumlahPet ?? 0 }}</p>
    </div>

    <div class="mt-6 text-center">
      <a href="{{ route('logout') }}" 
         class="inline-block bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
        🚪 Logout
      </a>
    </div>
  </div>
</section>
@endsection
