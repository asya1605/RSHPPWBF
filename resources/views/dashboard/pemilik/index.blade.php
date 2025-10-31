@extends('layouts.pemilik')

@section('title', 'Dashboard Pemilik - RSHP UNAIR')

@section('content')
<section class="min-h-[80vh] flex flex-col items-center justify-center text-center">

  {{-- Kartu Utama --}}
  <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
    @php use Illuminate\Support\Facades\Auth; @endphp
    <h2 class="text-3xl font-bold text-[#002080] mb-3">
      Halo, {{ Auth::user()->nama ?? Auth::user()->name ?? 'Pengguna' }} 👋
    </h2>

    <p class="text-gray-600 mb-6 leading-relaxed">
      Selamat datang di <strong>Portal Pemilik Hewan</strong> Rumah Sakit Hewan Pendidikan Universitas Airlangga.
      Anda dapat melihat data hewan peliharaan, membuat reservasi, dan memantau layanan secara online.
    </p>

    <div class="flex flex-wrap justify-center gap-4 mt-6">
      <a href="{{ route('pemilik.reservasi.index') }}"
         class="inline-flex items-center gap-2 bg-[#002080] hover:bg-[#00185e] text-white px-6 py-3 rounded-lg font-medium transition">
         📅 Lihat Reservasi
      </a>
      <a href="{{ route('pemilik.pet.index') }}"
         class="inline-flex items-center gap-2 bg-[#f0f4ff] hover:bg-[#e0e7ff] text-[#002080] px-6 py-3 rounded-lg border border-[#002080]/20 font-medium transition">
         🐾 Lihat Data Pet
      </a>
    </div>
  </div>

</section>
@endsection
