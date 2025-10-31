@extends('layouts.perawat')

@section('title', 'Rekam Medis - Perawat | RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10 px-6">
  <div class="max-w-6xl mx-auto">

    {{-- 🔹 Header --}}
    <div class="flex flex-wrap items-center justify-between mb-6">
      <h1 class="text-2xl font-bold text-[#002080]">
        📋 Rekam Medis & Reservasi
      </h1>

      {{-- 🔹 Filter Tanggal --}}
      <form method="GET" action="{{ route('perawat.rekam-medis.index') }}" class="flex items-center gap-3">
        <label for="tanggal" class="text-sm font-medium text-[#002080]">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal"
               value="{{ $selectedDate }}"
               class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-[#002080] focus:outline-none bg-white shadow-sm" />
        <button type="submit"
                class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded-lg text-sm font-medium transition">
          Tampilkan
        </button>

        @if(request('tanggal'))
          <a href="{{ route('perawat.rekam-medis.index') }}"
             class="text-sm text-gray-600 hover:text-red-600 transition">Reset</a>
        @endif
      </form>
    </div>

    {{-- 🔹 Info tanggal aktif --}}
    <p class="text-sm text-gray-600 mb-8">
      Menampilkan data untuk tanggal:
      <span class="font-semibold text-[#002080]">{{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y') }}</span>
    </p>

    {{-- ========================================================= --}}
    {{-- Daftar Reservasi tanpa Rekam Medis --}}
    {{-- ========================================================= --}}
    <div class="bg-white shadow-md rounded-xl border border-gray-200 p-6 mb-10">
      <h2 class="text-lg font-semibold text-[#002080] mb-3">Reservasi Belum Memiliki Rekam Medis</h2>

      @if ($reservasi->isEmpty())
        <p class="text-gray-500 text-sm">Tidak ada reservasi tanpa rekam medis untuk tanggal ini.</p>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm border border-gray-200">
            <thead class="bg-[#002080] text-white">
              <tr>
                <th class="px-3 py-2">ID Reservasi</th>
                <th class="px-3 py-2">Pet</th>
                <th class="px-3 py-2">Pemilik</th>
                <th class="px-3 py-2">Waktu Daftar</th>
                <th class="px-3 py-2 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reservasi as $r)
              <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-3 py-2">#{{ $r->idreservasi_dokter }}</td>
                <td class="px-3 py-2 font-medium">{{ $r->nama_pet }}</td>
                <td class="px-3 py-2">{{ $r->nama_pemilik }}</td>
                <td class="px-3 py-2">{{ \Carbon\Carbon::parse($r->waktu_daftar)->format('d-m-Y H:i') }}</td>
                <td class="px-3 py-2 text-center">
                  <a href="{{ route('perawat.rekam-medis.create', ['idreservasi' => $r->idreservasi_dokter, 'idpet' => $r->idpet]) }}"
                     class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs font-medium">Buat RM</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    {{-- ========================================================= --}}
    {{-- Daftar Rekam Medis --}}
    {{-- ========================================================= --}}
    <div class="bg-white shadow-md rounded-xl border border-gray-200 p-6">
      <h2 class="text-lg font-semibold text-[#002080] mb-3">Rekam Medis Tanggal Ini</h2>

      @if ($rekamMedis->isEmpty())
        <p class="text-gray-500 text-sm">Belum ada rekam medis yang dibuat untuk tanggal ini.</p>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm border border-gray-200">
            <thead class="bg-[#002080] text-white">
              <tr>
                <th class="px-3 py-2">ID RM</th>
                <th class="px-3 py-2">Pet</th>
                <th class="px-3 py-2">Pemilik</th>
                <th class="px-3 py-2">Anamnesa</th>
                <th class="px-3 py-2">Diagnosa</th>
                <th class="px-3 py-2 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rekamMedis as $rm)
              <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-3 py-2">#{{ $rm->idrekam_medis }}</td>
                <td class="px-3 py-2 font-medium">{{ $rm->nama_pet }}</td>
                <td class="px-3 py-2">{{ $rm->nama_pemilik }}</td>
                <td class="px-3 py-2">{{ Str::limit($rm->anamnesa, 40) }}</td>
                <td class="px-3 py-2">{{ Str::limit($rm->diagnosa, 40) }}</td>
                <td class="px-3 py-2 text-center">
                  <a href="{{ route('perawat.rekam-medis.show', $rm->idrekam_medis) }}"
                     class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-lg text-xs font-medium">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection
