@extends('layouts.perawat')

@section('title', 'Dashboard Perawat - RSHP UNAIR')

@section('content')
<section class="min-h-[85vh] flex flex-col items-center justify-center text-center px-6">

  {{-- Kartu Utama --}}
  <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-xl border border-gray-100 hover:shadow-xl transition-all duration-300">
    <h1 class="text-3xl font-bold text-[#002080] mb-3">Halo, Perawat! 🩺</h1>
    <p class="text-gray-600 leading-relaxed mb-4">
      Selamat datang di <strong>Dashboard Perawat RSHP Universitas Airlangga</strong>.
    </p>
    <p class="text-gray-700 mb-8">
      Anda dapat membantu dokter mengelola dan memperbarui <strong>rekam medis</strong> hewan secara digital.
    </p>

    <a href="{{ route('perawat.rekam-medis.index') }}"
       class="inline-flex items-center gap-2 bg-[#002080] hover:bg-[#00185e] text-white px-6 py-2 rounded-lg font-medium transition">
       📋 Kelola Rekam Medis
    </a>
  </div>

</section>
@endsection
