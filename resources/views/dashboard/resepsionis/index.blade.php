@extends('layouts.resepsionis')

@section('title', 'Dashboard Resepsionis - RSHP UNAIR')

@section('content')
<section class="min-h-[80vh] flex flex-col items-center justify-center text-center px-6">

  {{-- Kartu utama --}}
  <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
    <h2 class="text-3xl font-bold text-[#002080] mb-3">
      Halo, {{ Auth::user()->name }} 👋
    </h2>

    <p class="text-gray-600 mb-6 leading-relaxed">
      Selamat datang di <strong>Sistem Informasi RSHP Universitas Airlangga</strong>.<br>
      Silakan pilih menu untuk melakukan pendaftaran, pengelolaan data pemilik, atau penjadwalan temu dokter.
    </p>

    <div class="flex flex-wrap justify-center gap-4 mt-6">
      <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn-primary flex items-center gap-2">
        📅 <span>Temu Dokter</span>
      </a>
      <a href="{{ route('resepsionis.registrasi-pemilik.create') }}" class="btn-outline flex items-center gap-2">
        🧍‍♀️ <span>Registrasi Pemilik</span>
      </a>
      <a href="{{ route('resepsionis.registrasi-pet.create') }}" class="btn-outline flex items-center gap-2">
        🐾 <span>Registrasi Pet</span>
      </a>
    </div>
  </div>

</section>
@endsection
