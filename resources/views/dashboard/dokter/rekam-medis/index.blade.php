@extends('layouts.dokter')

@section('title', 'Rekam Medis Dokter - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10 px-6">

  {{-- HEADER PAGE --}}
  <div class="max-w-6xl mx-auto mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-2xl font-bold text-[#002080] mb-1 flex items-center gap-2">
        📋 Daftar Rekam Medis
      </h1>
      <p class="text-gray-600 text-sm">
        Menampilkan data rekam medis pasien sesuai tanggal yang dipilih.
      </p>
    </div>
    <a href="{{ route('dokter.rekam-medis.create') }}"
       class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg font-medium transition shadow">
      + Tambah Rekam Medis
    </a>
  </div>

  {{-- ALERT SUCCESS --}}
  @if (session('ok'))
    <div class="max-w-6xl mx-auto mb-6">
      <div class="bg-green-100 text-green-800 border border-green-300 rounded-lg px-4 py-3 shadow-sm flex items-center justify-between">
        <span>✅ {{ session('ok') }}</span>
        <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">✕</button>
      </div>
    </div>
  @endif

  {{-- FILTER FORM --}}
  <div class="max-w-6xl mx-auto mb-8 bg-white p-5 rounded-xl shadow-md border border-gray-200">
    <form method="get" class="flex flex-wrap items-center gap-4">
      <label for="date" class="font-medium text-gray-700">Tanggal</label>
      <input type="date" id="date" name="date"
             value="{{ $selectedDate }}"
             class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/40 focus:outline-none">
      <button type="submit"
              class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg font-medium transition">
        Filter
      </button>
    </form>
  </div>

  {{-- INFO --}}
  <div class="max-w-6xl mx-auto mb-5 text-gray-600">
    Menampilkan rekam medis pada <b>{{ $selectedDate }}</b>.
  </div>

  {{-- TABLE DATA --}}
  <div class="max-w-6xl mx-auto">
    @if ($list->isEmpty())
      <div class="bg-white text-center text-gray-500 p-6 rounded-lg shadow border border-gray-200">
        Tidak ada rekam medis pada tanggal ini.
      </div>
    @else
      <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-200">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-[#002080] text-white">
            <tr>
              <th class="px-4 py-3">No. Urut</th>
              <th class="px-4 py-3">Waktu</th>
              <th class="px-4 py-3">Reservasi</th>
              <th class="px-4 py-3">Pet</th>
              <th class="px-4 py-3">Pemilik</th>
              <th class="px-4 py-3">Anamnesa</th>
              <th class="px-4 py-3">Diagnosa</th>
              <th class="px-4 py-3">Tindakan</th>
              <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach ($list as $row)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $row->no_urut }}</td>
                <td class="px-4 py-2">{{ $row->created_at->format('d M Y, H:i') }}</td>
                <td class="px-4 py-2">#{{ $row->idreservasi_dokter }}</td>
                <td class="px-4 py-2 font-medium text-gray-800">{{ $row->nama_pet }}</td>
                <td class="px-4 py-2">{{ $row->nama_pemilik }}</td>
                <td class="px-4 py-2">{{ Str::limit($row->anamnesa, 25) }}</td>
                <td class="px-4 py-2">{{ Str::limit($row->diagnosa, 25) }}</td>
                <td class="px-4 py-2">
                  <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full">
                    {{ $row->jml_tindakan }} item
                  </span>
                </td>
                <td class="px-4 py-2 text-center">
                  <a href="{{ route('dokter.rekam-medis.show', $row->idrekam_medis) }}"
                     class="text-[#002080] font-semibold hover:underline">
                     Detail
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</section>
@endsection
