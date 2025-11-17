@extends('layouts.dokter')

@section('title', 'Dashboard Dokter - RSHP UNAIR')

@section('content')
<section class="min-h-[80vh] flex flex-col items-center justify-center text-center px-6 bg-[#f5f7ff]">
  {{-- Card utama --}}
  <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-xl border border-gray-200 hover:shadow-xl transition-all duration-300">
    <h1 class="text-3xl font-bold text-[#002080] mb-3">
      Halo, Dokter! 👩‍⚕️
    </h1>

    <p class="text-gray-600 leading-relaxed mb-8">
      Selamat datang di <strong>Dashboard Dokter RSHP Universitas Airlangga</strong>.<br>
      Anda dapat memantau pasien, mengakses data rekam medis, serta memperbarui catatan klinis dengan mudah.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <a href="{{ route('dokter.pasien.index') }}"
         class="block bg-[#002080] text-white py-3 px-4 rounded-xl hover:bg-[#001760] transition duration-200">
         🐾 Lihat Data Pasien
      </a>

      <a href="{{ route('dokter.rekam-medis.index') }}"
         class="block bg-blue-500 text-white py-3 px-4 rounded-xl hover:bg-blue-600 transition duration-200">
         📋 Rekam Medis
      </a>

      <a href="{{ route('dokter.profil.index') }}"
         class="block bg-indigo-500 text-white py-3 px-4 rounded-xl hover:bg-indigo-600 transition duration-200 sm:col-span-2">
         👨‍⚕️ Profil Dokter
      </a>
    </div>
  </div>
</section>
@endsection
