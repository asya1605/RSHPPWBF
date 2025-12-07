@extends('layouts.perawat')

@section('title', 'Detail Rekam Medis - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-6xl mx-auto px-6 py-8">

    {{-- HEADER --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6M9 8h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
            </svg>
          </div>
          <div>
            <h1 class="text-3xl font-black gradient-text">
              Detail Rekam Medis #{{ $rekamMedis->idrekam_medis }}
            </h1>
            <p class="text-gray-600 text-sm mt-1">
              Ringkasan data pasien dan daftar tindakan terapi yang dilakukan.
            </p>
          </div>
        </div>

        <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-white text-sm">
          <p class="text-xs font-semibold text-gray-500 mb-1">Tanggal Rekam Medis</p>
          <p class="font-bold text-[#002080]">
            {{ \Carbon\Carbon::parse($rekamMedis->created_at)->translatedFormat('d F Y, H:i') }}
          </p>
        </div>
      </div>
    </div>

    {{-- INFO UTAMA --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn delay-100">
      <div class="grid md:grid-cols-2 gap-6 text-sm md:text-base text-gray-800">

        <div class="space-y-3">
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Pet</p>
            <div class="flex items-center gap-3 bg-gradient-to-br from-teal-50 to-teal-100 p-3 rounded-xl">
              <div class="bg-gradient-to-br from-teal-200 to-teal-300 w-9 h-9 rounded-xl flex items-center justify-center">
                <span class="text-lg">🐾</span>
              </div>
              <p class="font-bold text-gray-900">
                {{ $rekamMedis->nama_pet }}
              </p>
            </div>
          </div>

          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Pemilik</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-3 rounded-xl">
              <p class="font-medium">{{ $rekamMedis->nama_pemilik }}</p>
            </div>
          </div>
        </div>

        <div class="space-y-3">
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Anamnesa</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-3 rounded-xl min-h-[64px]">
              <p class="text-sm md:text-base">
                {{ $rekamMedis->anamnesa ?? '-' }}
              </p>
            </div>
          </div>

          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Diagnosa</p>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 rounded-xl min-h-[64px]">
              <p class="text-sm md:text-base font-semibold text-gray-900">
                {{ $rekamMedis->diagnosa ?? '-' }}
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- TINDAKAN TERAPI --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white animate-fadeIn delay-200">

      {{-- Header tindakan + form tambah --}}
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-5">
        <h2 class="text-lg md:text-xl font-bold text-[#002080] flex items-center gap-2">
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white text-sm">
            💊
          </span>
          <span>Tindakan Terapi</span>
        </h2>

        {{-- Form Tambah Tindakan --}}
        <form action="{{ route('perawat.rekam-medis.tindakan.store', $rekamMedis->idrekam_medis) }}"
              method="POST"
              class="flex flex-col md:flex-row gap-3 items-stretch md:items-center">
          @csrf
          <select
            name="idkode_tindakan_terapi"
            required
            class="input-field md:w-56"
          >
            <option value="">-- Pilih Kode --</option>
            @foreach($listKode as $kode)
              <option value="{{ $kode->idkode_tindakan_terapi }}">
                {{ $kode->kode }} - {{ $kode->deskripsi_tindakan_terapi }}
              </option>
            @endforeach
          </select>

          <input
            type="text"
            name="detail"
            placeholder="Catatan"
            class="input-field md:w-60"
          >

          <button type="submit" class="btn-success text-xs md:text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah</span>
          </button>
        </form>
      </div>

      {{-- Daftar Tindakan --}}
      @if($detailTindakan->isEmpty())
        <p class="text-gray-500 text-sm">
          Belum ada tindakan yang tercatat pada rekam medis ini.
        </p>
      @else
        <div class="overflow-x-auto mt-4">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0] text-xs uppercase tracking-wider">
                <th class="px-4 md:px-6 py-3 font-bold text-white">Kode</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Deskripsi</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Kategori</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Klinis</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white">Detail</th>
                <th class="px-4 md:px-6 py-3 font-bold text-white text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($detailTindakan as $dt)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                  
                  {{-- Kode --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap font-semibold text-gray-900">
                    {{ $dt->kode }}
                  </td>

                  {{-- Deskripsi --}}
                  <td class="px-4 md:px-6 py-3 text-gray-800">
                    {{ $dt->deskripsi_tindakan_terapi }}
                  </td>

                  {{-- Kategori --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap">
                    @if($dt->nama_kategori)
                      <span class="inline-block bg-gradient-to-br from-indigo-50 to-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $dt->nama_kategori }}
                      </span>
                    @else
                      <span class="text-gray-400 text-xs italic">-</span>
                    @endif
                  </td>

                  {{-- Klinis --}}
                  <td class="px-4 md:px-6 py-3 whitespace-nowrap">
                    @if($dt->nama_kategori_klinis)
                      <span class="inline-block bg-gradient-to-br from-emerald-50 to-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $dt->nama_kategori_klinis }}
                      </span>
                    @else
                      <span class="text-gray-400 text-xs italic">-</span>
                    @endif
                  </td>

                  {{-- Detail --}}
                  <td class="px-4 md:px-6 py-3 text-gray-700">
                    {{ $dt->detail ?? '-' }}
                  </td>

                  {{-- Aksi --}}
                  <td class="px-4 md:px-6 py-3 text-center whitespace-nowrap">

                    <div class="flex flex-col gap-2 items-center">

                      {{-- Update --}}
                      <form
                        action="{{ route('perawat.rekam-medis.tindakan.update', $dt->iddetail_rekam_medis) }}"
                        method="POST"
                        class="flex flex-wrap gap-2 justify-center items-center"
                      >
                        @csrf @method('PUT')

                        <select
                          name="idkode_tindakan_terapi"
                          class="border border-gray-300 rounded-lg px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-blue-100"
                        >
                          @foreach($listKode as $kode)
                            <option
                              value="{{ $kode->idkode_tindakan_terapi }}"
                              {{ $kode->idkode_tindakan_terapi == $dt->idkode_tindakan_terapi ? 'selected' : '' }}
                            >
                              {{ $kode->kode }}
                            </option>
                          @endforeach
                        </select>

                        <input
                          type="text"
                          name="detail"
                          value="{{ $dt->detail }}"
                          class="border border-gray-300 rounded-lg px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-blue-100"
                        >

                        <button
                          type="submit"
                          class="inline-flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-xs font-semibold shadow-sm"
                        >
                          Update
                        </button>
                      </form>

                      {{-- Hapus --}}
                      <form
                        action="{{ route('perawat.rekam-medis.tindakan.destroy', $dt->iddetail_rekam_medis) }}"
                        method="POST"
                        class="inline-block"
                        onsubmit="return confirm('Yakin hapus tindakan ini?')"
                      >
                        @csrf @method('DELETE')
                        <button
                          class="inline-flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs font-semibold shadow-sm"
                        >
                          Hapus
                        </button>
                      </form>
                    </div>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif

    </div>

    {{-- BACK BUTTON --}}
    <div class="mt-8">
      <a href="{{ route('perawat.rekam-medis.index') }}" class="btn-secondary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 19l-7-7 7-7" />
        </svg>
        <span>Kembali ke Daftar</span>
      </a>
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

  .input-field {
    @apply w-full border-2 border-gray-200 rounded-xl px-3 py-2 text-sm
           focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
           transition-all shadow-sm bg-white;
  }

  .btn-success {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600
           text-white px-4 py-2 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all;
  }

  .btn-secondary {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-2.5
           rounded-xl font-bold border-2 border-gray-200 shadow-md
           hover:border-gray-300 hover:shadow-lg hover:scale-105 transition-all text-sm;
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
</style>

@endsection
