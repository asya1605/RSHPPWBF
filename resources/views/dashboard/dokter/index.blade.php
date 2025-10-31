@extends('layouts.dokter')

@section('title', 'Dashboard Dokter - RSHP UNAIR')

@section('content')
<section class="min-h-[80vh] flex flex-col items-center justify-center text-center px-6">


  {{-- Card utama --}}
  <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-xl border border-gray-100 hover:shadow-xl transition-all duration-300">
    <h1 class="text-3xl font-bold text-[#002080] mb-3">Halo, Dokter! 👩‍⚕️</h1>
    <p class="text-gray-600 leading-relaxed mb-8">
      Selamat datang di <strong>Dashboard Dokter RSHP Universitas Airlangga</strong>.<br>
      Anda dapat memantau pasien, mengakses data rekam medis, dan memperbarui catatan klinis dengan mudah.
    </p>
</section>
@endsection
