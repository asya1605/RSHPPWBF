@extends('layouts.perawat')
@section('title', 'Profil Perawat - RSHP UNAIR')

@section('content')
<section class="p-8 bg-[#f5f7ff] min-h-screen flex justify-center items-center">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg border border-gray-100">
    <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">👩‍⚕️ Profil Perawat</h1>

    <div class="space-y-3 text-sm text-gray-700 leading-relaxed">
      <p><strong>Nama User:</strong> {{ $profil->nama_user ?? '-' }}</p>
      <p><strong>Email:</strong> {{ $profil->email ?? '-' }}</p>
      <p><strong>Role:</strong> {{ $profil->nama_role ?? '-' }}</p>
      <p><strong>No. HP:</strong> {{ $profil->no_hp ?? '-' }}</p>
      <p><strong>Jenis Kelamin:</strong> 
        @if($profil->jenis_kelamin == 'L') Laki-laki 
        @elseif($profil->jenis_kelamin == 'P') Perempuan 
        @else - @endif
      </p>
      <p><strong>Pendidikan:</strong> {{ $profil->pendidikan ?? '-' }}</p>
      <p><strong>Alamat:</strong> {{ $profil->alamat ?? '-' }}</p>
    </div>

    <div class="border-t border-gray-200 my-6"></div>

    <div class="text-center">
      <a href="{{ route('logout') }}" 
         class="inline-block bg-red-500 text-white px-5 py-2 rounded-md hover:bg-red-600 transition">
        🚪 Logout
      </a>
    </div>
  </div>
</section>
@endsection
