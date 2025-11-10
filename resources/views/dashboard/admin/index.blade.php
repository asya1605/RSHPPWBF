@extends('layouts.admin.main')

@section('title', 'Dashboard Admin - RSHP UNAIR')

@section('content')
<section class="bg-gradient-to-b from-[#f8fbff] to-[#eef2ff] rounded-xl p-10 shadow-sm">

  {{-- HEADER --}}
  <div class="text-center mb-10">
    <h1 class="text-3xl font-bold text-[#002080] mb-3">Halo, Admin! 🎉</h1>
    <p class="text-gray-600 leading-relaxed">
      Selamat datang di halaman <strong>Administrator RSHP Universitas Airlangga.</strong><br>
      Kelola data dan pantau aktivitas sistem dengan mudah melalui menu di sidebar.
    </p>
  </div>

  {{-- STATISTIK RINGAN --}}
  <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-6">
    <div class="bg-white shadow rounded-lg p-6 text-center border border-gray-100 hover:shadow-md transition">
      <h3 class="text-2xl font-bold text-[#002080]">{{ $stats['total_user'] ?? '-' }}</h3>
      <p class="text-gray-600 text-sm mt-1">Total User</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6 text-center border border-gray-100 hover:shadow-md transition">
      <h3 class="text-2xl font-bold text-[#002080]">{{ $stats['total_pet'] ?? '-' }}</h3>
      <p class="text-gray-600 text-sm mt-1">Total Hewan</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6 text-center border border-gray-100 hover:shadow-md transition">
      <h3 class="text-2xl font-bold text-[#002080]">{{ $stats['total_rekam'] ?? '-' }}</h3>
      <p class="text-gray-600 text-sm mt-1">Rekam Medis</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6 text-center border border-gray-100 hover:shadow-md transition">
      <h3 class="text-2xl font-bold text-[#002080]">{{ $stats['total_reservasi'] ?? '-' }}</h3>
      <p class="text-gray-600 text-sm mt-1">Reservasi</p>
    </div>
  </div>

</section>
@endsection
