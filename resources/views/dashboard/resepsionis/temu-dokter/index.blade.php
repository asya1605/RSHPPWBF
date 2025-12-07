@extends('layouts.resepsionis')
@section('title', 'Temu Dokter')

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
                  d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Daftar Temu Dokter</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-xl text-sm md:text-base">
            Kelola antrian pertemuan dokter dengan pasien berdasarkan tanggal terpilih.
          </p>
        </div>

        {{-- Info Kecil --}}
        <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-white">
          <p class="text-xs font-semibold text-gray-500 mb-1">Tanggal Terpilih</p>
          <p class="text-lg font-black text-[#002080]">
            {{ $selectedDate }}
          </p>
        </div>

      </div>
    </div>

    {{-- MAIN CARD --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white animate-fadeIn delay-100">

      {{-- Filter tanggal --}}
      <form method="get" class="flex flex-col md:flex-row md:items-end gap-4 mb-6">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
              </svg>
            </div>
            <input
              type="date"
              name="date"
              value="{{ $selectedDate }}"
              class="pl-10 pr-3 py-2 border-2 border-gray-200 rounded-xl text-sm
                     focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                     transition-all shadow-sm bg-white"
            >
          </div>
        </div>

        <div class="flex md:justify-start">
          <button type="submit" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7" />
            </svg>
            <span>Lihat</span>
          </button>
        </div>
      </form>

      {{-- Tambah antrian --}}
      <form method="POST" action="{{ route('resepsionis.temu-dokter.store') }}" class="flex flex-col md:flex-row gap-4 items-end mb-6">
        @csrf
        <div class="flex-1">
          <label for="idpet" class="block text-sm font-semibold text-gray-700 mb-2">
            Pilih Pet
          </label>
          <select
            name="idpet"
            id="idpet"
            required
            class="w-full border-2 border-gray-200 rounded-xl px-3 py-2 text-sm
                   focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                   transition-all shadow-sm bg-white"
          >
            <option value="">— Pilih Pet —</option>
            @foreach ($allPets as $p)
              <option value="{{ $p->idpet }}">{{ $p->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="flex md:justify-start">
          <button type="submit" class="btn-success">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Antrian</span>
          </button>
        </div>
      </form>

      {{-- Alert --}}
      @if (session('success'))
        <div class="glass rounded-2xl px-4 py-3 shadow border border-green-100 mb-6 bg-green-50/80">
          <p class="text-sm font-medium text-green-800">
            {{ session('success') }}
          </p>
        </div>
      @endif

      {{-- Tabel Antrian --}}
      <div class="overflow-x-auto mt-4">
        <table class="min-w-full text-sm text-left">
          <thead>
            <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
              <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider text-center">No Urut</th>
              <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Waktu Daftar</th>
              <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Nama Pet</th>
              <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider text-center">Status</th>
              <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse ($antrian as $a)
              <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">

                {{-- No Urut --}}
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                    <span class="text-xs font-bold text-blue-800">{{ $a->no_urut }}</span>
                  </div>
                </td>

                {{-- Waktu Daftar --}}
                <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                  {{ \Carbon\Carbon::parse($a->waktu_daftar)->format('d M Y, H:i') }}
                </td>

                {{-- Nama Pet --}}
                <td class="px-6 py-3 whitespace-nowrap">
                  <div class="flex items-center gap-2">
                    <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                      <span class="text-lg">🐾</span>
                    </div>
                    <span class="font-semibold text-gray-900">{{ $a->nama_pet }}</span>
                  </div>
                </td>

                {{-- Status --}}
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  @php
                    if ($a->status == 0) {
                      $statusText = 'Menunggu';
                      $badgeClass = 'from-yellow-100 to-yellow-200 text-yellow-800';
                    } elseif ($a->status == 1) {
                      $statusText = 'Selesai';
                      $badgeClass = 'from-green-100 to-green-200 text-green-800';
                    } else {
                      $statusText = 'Batal';
                      $badgeClass = 'from-red-100 to-red-200 text-red-800';
                    }
                  @endphp
                  <span class="inline-block bg-gradient-to-br {{ $badgeClass }} px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $statusText }}
                  </span>
                </td>

                {{-- Aksi --}}
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  <div class="inline-flex items-center gap-3">
                    {{-- Selesai --}}
                    <form method="POST" action="{{ route('resepsionis.temu-dokter.update', $a->idreservasi_dokter) }}" class="inline">
                      @csrf @method('PUT')
                      <input type="hidden" name="status" value="1">
                      <button class="text-xs font-semibold text-green-700 hover:underline">
                        Selesai
                      </button>
                    </form>

                    {{-- Batal --}}
                    <form
                      method="POST"
                      action="{{ route('resepsionis.temu-dokter.update', $a->idreservasi_dokter) }}"
                      class="inline"
                      onsubmit="return confirm('Batalkan antrian ini?')"
                    >
                      @csrf @method('PUT')
                      <input type="hidden" name="status" value="2">
                      <button class="text-xs font-semibold text-red-700 hover:underline">
                        Batal
                      </button>
                    </form>
                  </div>
                </td>

              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-6 py-6 text-center text-gray-600 text-sm">
                  Tidak ada antrian hari ini.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

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

  .btn-primary {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0] 
           text-white px-6 py-2.5 rounded-xl font-bold shadow-lg 
           hover:shadow-xl hover:scale-105 transition-all text-sm;
  }

  .btn-success {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600
           text-white px-6 py-2.5 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all text-sm;
  }
</style>

@endsection
