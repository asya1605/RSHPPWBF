@extends('layouts.pemilik')
@section('title', 'Detail Rekam Medis')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-6xl mx-auto px-6 py-10">

    {{-- HEADER --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        
        {{-- Title & Subtitle --}}
        <div>
          <div class="flex items-center gap-3 mb-3">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6M9 8h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
              </svg>
            </div>
            <div>
              <h1 class="text-3xl font-black gradient-text">
                Rekam Medis #{{ $header->idrekam_medis }}
              </h1>
              <p class="text-gray-600 text-sm mt-1">
                Detail rekam medis hewan peliharaan Anda di RSHP UNAIR.
              </p>
            </div>
          </div>
        </div>

        {{-- Back Button --}}
        <div class="flex flex-wrap gap-3 justify-start md:justify-end">
          <a href="{{ route('pemilik.rekam-medis.index') }}" class="btn-secondary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali</span>
          </a>
        </div>
      </div>
    </div>

    {{-- HEADER INFO --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-6 animate-fadeIn delay-100">
      <div class="grid md:grid-cols-2 gap-6">

        {{-- Kolom kiri: Pet & Pemilik --}}
        <div class="space-y-4">
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Pet</p>
            <div class="flex items-center gap-3 bg-gradient-to-br from-teal-50 to-teal-100 p-3 rounded-xl">
              <div class="bg-gradient-to-br from-teal-200 to-teal-300 w-9 h-9 rounded-xl flex items-center justify-center">
                <span class="text-lg">🐾</span>
              </div>
              <p class="text-base font-bold text-gray-900">
                {{ $header->nama_pet }}
              </p>
            </div>
          </div>

          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Pemilik</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-3 rounded-xl">
              <p class="text-base font-medium">
                {{ $header->nama_pemilik }}
              </p>
            </div>
          </div>
        </div>

        {{-- Kolom kanan: Anamnesa & Diagnosa --}}
        <div class="space-y-4">
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Anamnesa</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-3 rounded-xl min-h-[64px]">
              <p class="text-sm md:text-base text-gray-800">
                {{ $header->anamnesa ?? '-' }}
              </p>
            </div>
          </div>

          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Diagnosa</p>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 rounded-xl min-h-[64px]">
              <p class="text-sm md:text-base text-gray-900 font-semibold">
                {{ $header->diagnosa ?? '-' }}
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- DETAIL TINDAKAN --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn delay-200">

      <div class="px-6 pt-6 pb-3 border-b border-gray-100 flex items-center justify-between">
        <h3 class="text-base md:text-lg font-bold text-[#002080] flex items-center gap-2">
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white text-sm">
            ✓
          </span>
          <span>Daftar Tindakan Terapi</span>
        </h3>
      </div>

      @if($detail->isEmpty())
        <div class="px-8 py-10 text-center">
          <p class="text-gray-600 text-sm md:text-base">
            Belum ada tindakan yang tercatat pada rekam medis ini.
          </p>
        </div>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Kode</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Deskripsi</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Kategori</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Klinis</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Detail</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($detail as $d)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                  {{-- Kode --}}
                  <td class="px-6 py-3 whitespace-nowrap font-semibold text-gray-900">
                    {{ $d->kode }}
                  </td>

                  {{-- Deskripsi --}}
                  <td class="px-6 py-3 text-gray-800">
                    {{ $d->deskripsi_tindakan_terapi }}
                  </td>

                  {{-- Kategori --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    @if($d->nama_kategori)
                      <span class="inline-block bg-gradient-to-br from-indigo-50 to-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $d->nama_kategori }}
                      </span>
                    @else
                      <span class="text-gray-400 text-xs italic">-</span>
                    @endif
                  </td>

                  {{-- Klinis --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    @if($d->nama_kategori_klinis)
                      <span class="inline-block bg-gradient-to-br from-emerald-50 to-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $d->nama_kategori_klinis }}
                      </span>
                    @else
                      <span class="text-gray-400 text-xs italic">-</span>
                    @endif
                  </td>

                  {{-- Detail --}}
                  <td class="px-6 py-3 text-gray-700">
                    {{ $d->detail ?? '-' }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- FOOTER --}}
        <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
          <p class="text-sm text-gray-600">
            Total
            <span class="font-bold text-[#002080]">{{ $detail->count() }}</span>
            tindakan terapi pada rekam medis ini.
          </p>
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
    50% { transform: translateY(-10px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .btn-secondary {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-2.5 
           rounded-xl font-bold border-2 border-gray-200 shadow-md
           hover:border-gray-300 hover:shadow-lg hover:scale-105 transition-all text-sm;
  }

  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
</style>

@endsection
