@extends('layouts.pemilik')
@section('title', 'Daftar Reservasi')

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
            <h1 class="text-3xl font-black gradient-text">Daftar Reservasi</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-xl text-sm md:text-base">
            Riwayat dan status reservasi pemeriksaan hewan peliharaan Anda.
          </p>
        </div>

        {{-- Action Button --}}
        <div class="flex flex-wrap gap-3">
          <a href="{{ route('pemilik.reservasi.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Reservasi</span>
          </a>
        </div>
      </div>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('ok'))
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

    {{-- MAIN CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn delay-200">

      @if($reservasi->isEmpty())
        <div class="px-8 py-12 text-center">
          <div class="flex flex-col items-center gap-4">
            <div class="bg-gray-100 p-6 rounded-full">
              <svg class="w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
              </svg>
            </div>
            <div>
              <p class="text-gray-700 font-semibold text-lg">Belum ada data reservasi</p>
              <p class="text-gray-500 text-sm mt-1">
                Anda dapat membuat reservasi baru melalui tombol <b>Tambah Reservasi</b> di atas.
              </p>
            </div>
          </div>
        </div>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">#</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Tanggal Reservasi</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Tanggal Periksa</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Hewan</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Dokter</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider text-center">Status</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($reservasi as $r)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                  
                  {{-- ID --}}
                  <td class="px-6 py-3 whitespace-nowrap text-center">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                      <span class="text-xs font-bold text-blue-800">#{{ $r->idreservasi_dokter }}</span>
                    </div>
                  </td>

                  {{-- Tanggal Reservasi --}}
                  <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ \Carbon\Carbon::parse($r->waktu_daftar)->format('d M Y, H:i') }}
                  </td>

                  {{-- Tanggal Periksa --}}
                  <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ $r->tanggal_periksa ?? '-' }}
                  </td>

                  {{-- Hewan --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                      <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-lg">🐾</span>
                      </div>
                      <span class="font-semibold text-gray-900">{{ $r->nama_pet }}</span>
                    </div>
                  </td>

                  {{-- Dokter --}}
                  <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ $r->nama_dokter ?? '-' }}
                  </td>

                  {{-- Status --}}
                  <td class="px-6 py-3 whitespace-nowrap text-center">
                    @php
                      if ($r->status == 0) {
                        $statusText = 'Menunggu';
                        $badgeClass = 'from-yellow-100 to-yellow-200 text-yellow-800';
                      } elseif ($r->status == 1) {
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

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- FOOTER --}}
        <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
          <p class="text-sm text-gray-600">
            Menampilkan
            <span class="font-bold text-[#002080]">{{ $reservasi->count() }}</span>
            reservasi terakhir Anda.
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

  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
</style>

@endsection
