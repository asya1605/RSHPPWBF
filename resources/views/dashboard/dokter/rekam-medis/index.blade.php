@extends('layouts.dokter')

@section('title', 'Rekam Medis Dokter - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-7xl mx-auto px-6 py-8">

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
            <h1 class="text-3xl font-black gradient-text">Daftar Rekam Medis</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl text-sm md:text-base">
            Menampilkan data rekam medis pasien sesuai tanggal yang dipilih.
          </p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3">
          <a href="{{ route('dokter.rekam-medis.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Rekam Medis</span>
          </a>
        </div>
      </div>
    </div>

    {{-- ALERT SUCCESS --}}
    @if (session('ok'))
      <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-green-100 mb-6 animate-fadeIn delay-100 bg-green-50/80">
        <div class="flex items-center justify-between gap-3">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-green-500 flex items-center justify-center">
              <span class="text-white text-lg">✅</span>
            </div>
            <p class="text-sm md:text-base text-green-800 font-medium">
              {{ session('ok') }}
            </p>
          </div>
          <button onclick="this.closest('div').remove()" class="text-green-700 hover:text-green-900 text-lg leading-none">
            ✕
          </button>
        </div>
      </div>
    @endif

    {{-- STATISTICS / INFO SINGKAT --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 animate-fadeIn delay-100">
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <p class="text-gray-600 text-sm mb-1">Tanggal Terpilih</p>
        <p class="text-2xl font-black text-[#002080]">
          {{ $selectedDate }}
        </p>
      </div>
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <p class="text-gray-600 text-sm mb-1">Total Rekam Medis</p>
        <p class="text-2xl font-black text-[#00BFA6]">
          {{ $list->count() }}
        </p>
      </div>
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <p class="text-gray-600 text-sm mb-1">Dokter Login</p>
        <p class="text-2xl font-black text-[#6366F1] truncate">
          {{ auth()->user()->nama ?? '-' }}
        </p>
      </div>
    </div>

    {{-- FILTER FORM --}}
    <div class="glass rounded-2xl p-6 shadow-xl border border-white mb-6 animate-fadeIn delay-200">
      <form method="get" class="flex flex-col md:flex-row md:items-center gap-4">
        <div class="flex items-center gap-3">
          <label for="date" class="font-semibold text-gray-700 text-sm md:text-base">
            Tanggal Rekam Medis
          </label>
        </div>
        <div class="flex flex-1 flex-col sm:flex-row gap-3">
          <div class="relative max-w-xs">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
              </svg>
            </div>
            <input
              type="date"
              id="date"
              name="date"
              value="{{ $selectedDate }}"
              class="w-full pl-10 pr-3 py-2 border-2 border-gray-200 rounded-xl text-sm
                     focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                     transition-all shadow-sm bg-white"
            >
          </div>

          <button type="submit" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>Filter</span>
          </button>
        </div>
      </form>

      <p class="mt-3 text-sm text-gray-600">
        Menampilkan rekam medis pada
        <span class="font-bold text-[#002080]">{{ $selectedDate }}</span>.
      </p>
    </div>

    {{-- TABLE DATA --}}
    <div class="animate-fadeIn delay-300">
      @if ($list->isEmpty())
        <div class="glass rounded-3xl p-10 text-center shadow-2xl border border-dashed border-gray-300">
          <div class="flex flex-col items-center gap-4">
            <div class="bg-gray-100 p-6 rounded-full">
              <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-700 font-semibold text-lg">Tidak ada rekam medis pada tanggal ini</p>
              <p class="text-gray-500 text-sm mt-1">
                Silakan pilih tanggal lain atau tambahkan rekam medis baru.
              </p>
            </div>
          </div>
        </div>
      @else
        <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white">
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
              <thead>
                <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">ID</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Waktu</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Reservasi</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Pet</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Pemilik</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Anamnesa</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Diagnosa</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Tindakan</th>
                  <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider text-center">Aksi</th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-100" id="tableBody">
                @foreach ($list as $row)
                  <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                    {{-- ID REKAM MEDIS --}}
                    <td class="px-6 py-3 whitespace-nowrap">
                      <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                        <span class="text-xs font-bold text-blue-800">#{{ $row->idrekam_medis }}</span>
                      </div>
                    </td>

                    {{-- Waktu --}}
                    <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                      {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y, H:i') }}
                    </td>

                    {{-- Reservasi --}}
                    <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                      @if ($row->idreservasi_dokter)
                        <span class="inline-block bg-indigo-50 text-indigo-700 px-2 py-1 rounded-full text-xs font-semibold">
                          #{{ $row->idreservasi_dokter }}
                        </span>
                      @else
                        <span class="text-gray-400 text-xs italic">-</span>
                      @endif
                    </td>

                    {{-- Pet --}}
                    <td class="px-6 py-3 whitespace-nowrap">
                      <div class="flex items-center gap-2">
                        <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                          <span class="text-lg">🐾</span>
                        </div>
                        <span class="font-semibold text-gray-900">
                          {{ $row->nama_pet }}
                        </span>
                      </div>
                    </td>

                    {{-- Pemilik --}}
                    <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                      {{ $row->nama_pemilik }}
                    </td>

                    {{-- Anamnesa --}}
                    <td class="px-6 py-3 text-gray-700">
                      {{ Str::limit($row->anamnesa, 25) }}
                    </td>

                    {{-- Diagnosa --}}
                    <td class="px-6 py-3 text-gray-700">
                      {{ Str::limit($row->diagnosa, 25) }}
                    </td>

                    {{-- Tindakan --}}
                    <td class="px-6 py-3 whitespace-nowrap">
                      <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $row->jml_tindakan }} item
                      </span>
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-3 text-center whitespace-nowrap">
                      <a href="{{ route('dokter.rekam-medis.show', $row->idrekam_medis) }}"
                         class="inline-flex items-center gap-1 text-sm font-semibold text-[#002080] hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

          {{-- Table Footer --}}
          <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-600">
              Menampilkan
              <span class="font-bold text-[#002080]">{{ $list->count() }}</span>
              rekam medis pada tanggal
              <span class="font-bold text-[#002080]">{{ $selectedDate }}</span>.
            </p>
          </div>
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

  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
  .delay-300 { animation-delay: 0.3s; }

  .btn-primary {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0] 
           text-white px-6 py-3 rounded-xl font-bold shadow-lg 
           hover:shadow-xl hover:scale-105 transition-all;
  }

  .btn-secondary {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-3 
           rounded-xl font-bold border-2 border-gray-200 shadow-md
           hover:border-gray-300 hover:shadow-lg hover:scale-105 transition-all;
  }
</style>

@endsection
