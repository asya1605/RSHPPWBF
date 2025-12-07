@extends('layouts.perawat')

@section('title', 'Rekam Medis - Perawat | RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-6xl mx-auto px-6 py-8">

    {{-- HEADER SECTION --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        
        {{-- Title & Description --}}
        <div>
          <div class="flex items-center gap-3 mb-3">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6M9 8h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
              </svg>
            </div>
            <div>
              <h1 class="text-3xl font-black gradient-text">Rekam Medis & Reservasi</h1>
              <p class="text-gray-600 text-sm md:text-base mt-1">
                Monitoring reservasi dan rekam medis pasien untuk membantu proses pelayanan perawatan.
              </p>
            </div>
          </div>
        </div>

        {{-- Info Tanggal --}}
        <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-white">
          <p class="text-xs font-semibold text-gray-500 mb-1">Tanggal Aktif</p>
          <p class="text-lg font-black text-[#002080]">
            {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y') }}
          </p>
        </div>
      </div>
    </div>

    {{-- FILTER TANGGAL --}}
    <div class="glass rounded-2xl p-6 shadow-2xl border border-white mb-6 animate-fadeIn delay-100">
      <form method="GET" action="{{ route('perawat.rekam-medis.index') }}" class="flex flex-col md:flex-row md:items-end gap-4">
        
        {{-- Input Tanggal --}}
        <div class="flex-1 max-w-xs">
          <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
            Tanggal
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
              </svg>
            </div>
            <input
              type="date"
              id="tanggal"
              name="tanggal"
              value="{{ $selectedDate }}"
              class="w-full pl-10 pr-3 py-2 border-2 border-gray-200 rounded-xl text-sm
                     focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                     transition-all shadow-sm bg-white"
            />
          </div>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-3">
          <button type="submit" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>Tampilkan</span>
          </button>

          @if(request('tanggal'))
            <a href="{{ route('perawat.rekam-medis.index') }}"
               class="text-sm text-gray-600 hover:text-red-600 transition underline-offset-2 hover:underline">
              Reset
            </a>
          @endif
        </div>
      </form>

      <p class="mt-3 text-sm text-gray-600">
        Menampilkan data untuk tanggal:
        <span class="font-semibold text-[#002080]">
          {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y') }}
        </span>
      </p>
    </div>

    {{-- ========================================================= --}}
    {{-- RESERVASI TANPA REKAM MEDIS --}}
    {{-- ========================================================= --}}
    <div class="glass rounded-3xl p-6 md:p-7 shadow-2xl border border-white mb-10 animate-fadeIn delay-200">
      <div class="flex items-center justify-between gap-3 mb-4">
        <h2 class="text-lg md:text-xl font-bold text-[#002080] flex items-center gap-2">
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-gradient-to-br from-amber-400 to-amber-500 text-white text-sm">
            !
          </span>
          <span>Reservasi Belum Memiliki Rekam Medis</span>
        </h2>
      </div>

      @if ($reservasi->isEmpty())
        <p class="text-gray-500 text-sm">
          Tidak ada reservasi tanpa rekam medis untuk tanggal ini.
        </p>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0] text-xs uppercase tracking-wider">
                <th class="px-4 md:px-6 py-3 font-bold text-white">ID Reservasi</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Pet</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Pemilik</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Waktu Daftar</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach ($reservasi as $r)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                  
                  {{-- ID Reservasi --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                      <span class="text-xs font-bold text-blue-800">#{{ $r->idreservasi_dokter }}</span>
                    </div>
                  </td>

                  {{-- Pet --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                      <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-lg">🐾</span>
                      </div>
                      <span class="font-semibold text-gray-900">{{ $r->nama_pet }}</span>
                    </div>
                  </td>

                  {{-- Pemilik --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ $r->nama_pemilik }}
                  </td>

                  {{-- Waktu Daftar --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ \Carbon\Carbon::parse($r->waktu_daftar)->format('d-m-Y H:i') }}
                  </td>

                  {{-- Aksi --}}
                  <td class="px-4 md:px-6 py-3 text-center whitespace-nowrap">
                    <a href="{{ route('perawat.rekam-medis.create', ['idreservasi' => $r->idreservasi_dokter, 'idpet' => $r->idpet]) }}"
                       class="inline-flex items-center gap-1 bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow hover:shadow-md hover:scale-105 transition">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                      </svg>
                      <span>Buat RM</span>
                    </a>
                  </td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    {{-- ========================================================= --}}
    {{-- DAFTAR REKAM MEDIS --}}
    {{-- ========================================================= --}}
    <div class="glass rounded-3xl p-6 md:p-7 shadow-2xl border border-white animate-fadeIn delay-300">
      <div class="flex items-center justify-between gap-3 mb-4">
        <h2 class="text-lg md:text-xl font-bold text-[#002080] flex items-center gap-2">
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white text-sm">
            RM
          </span>
          <span>Rekam Medis Tanggal Ini</span>
        </h2>
      </div>

      @if ($rekamMedis->isEmpty())
        <p class="text-gray-500 text-sm">
          Belum ada rekam medis yang dibuat untuk tanggal ini.
        </p>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0] text-xs uppercase tracking-wider">
                <th class="px-4 md:px-6 py-3 font-bold text-white">ID RM</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Pet</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Pemilik</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Anamnesa</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Diagnosa</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach ($rekamMedis as $rm)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                  
                  {{-- ID RM --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap">
                    <div class="bg-gradient-to-br from-indigo-100 to-indigo-200 px-3 py-1 rounded-lg inline-block">
                      <span class="text-xs font-bold text-indigo-800">#{{ $rm->idrekam_medis }}</span>
                    </div>
                  </td>

                  {{-- Pet --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                      <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-lg">🐾</span>
                      </div>
                      <span class="font-semibold text-gray-900">{{ $rm->nama_pet }}</span>
                    </div>
                  </td>

                  {{-- Pemilik --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ $rm->nama_pemilik }}
                  </td>

                  {{-- Anamnesa --}}
                  <td class="px-4 md:px-6 py-3 text-gray-700">
                    {{ Str::limit($rm->anamnesa, 40) }}
                  </td>

                  {{-- Diagnosa --}}
                  <td class="px-4 md:px-6 py-3 text-gray-700">
                    {{ Str::limit($rm->diagnosa, 40) }}
                  </td>

                  {{-- Aksi --}}
                  <td class="px-4 md:px-6 py-3 text-center whitespace-nowrap">
                    <a href="{{ route('perawat.rekam-medis.show', $rm->idrekam_medis) }}"
                       class="inline-flex items-center gap-1 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow hover:shadow-md hover:scale-105 transition">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      <span>Detail</span>
                    </a>
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

{{-- STYLES --}}
<style>
  .glass {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
  }

  .gradient-text {
    background: linear-gradient(135deg, #002080 0%, #00BFA6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
  .delay-300 { animation-delay: 0.3s; }

  .btn-primary {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0]
           text-white px-6 py-2.5 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all text-sm;
  }
</style>

@endsection
