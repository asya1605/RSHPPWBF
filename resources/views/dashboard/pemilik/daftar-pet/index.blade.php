@extends('layouts.pemilik')
@section('title', 'Daftar Pet Saya')

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
                  d="M4 7a4 4 0 118 0 4 4 0 01-8 0zm8 0h8m-8 10a4 4 0 118 0 4 4 0 01-8 0zM4 17h8" />
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Daftar Hewan Peliharaan</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-xl text-sm md:text-base">
            Lihat daftar lengkap hewan peliharaan yang terdaftar pada akun Anda.
          </p>
        </div>

        {{-- (Opsional) Info kecil --}}
        <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-white">
          <p class="text-xs font-semibold text-gray-500 mb-1">Total Hewan</p>
          <p class="text-2xl font-black text-[#002080]">{{ $pets->count() }}</p>
        </div>
      </div>
    </div>

    {{-- MAIN CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn delay-200">

      @if($pets->isEmpty())
        <div class="px-8 py-12 text-center">
          <div class="flex flex-col items-center gap-4">
            <div class="bg-gray-100 p-6 rounded-full">
              <svg class="w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.5 9.5a2.5 2.5 0 115 0 2.5 2.5 0 01-5 0zm10-3a2.5 2.5 0 115 0 2.5 2.5 0 01-5 0zM6 19a3 3 0 016 0v1H6v-1zm9-2a3 3 0 016 0v3h-6v-3z" />
              </svg>
            </div>
            <div>
              <p class="text-gray-700 font-semibold text-lg">Belum ada data hewan peliharaan</p>
              <p class="text-gray-500 text-sm mt-1">
                Silakan tambahkan hewan peliharaan melalui menu yang tersedia pada aplikasi.
              </p>
            </div>
          </div>
        </div>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">ID</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Nama</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Jenis</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Ras</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Kelamin</th>
                <th class="px-6 py-4 text-xs font-bold text-white uppercase tracking-wider">Tanggal Lahir</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($pets as $p)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                  {{-- ID --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                      <span class="text-xs font-bold text-blue-800">#{{ $p->idpet }}</span>
                    </div>
                  </td>

                  {{-- Nama --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                      <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-lg">🐾</span>
                      </div>
                      <span class="font-semibold text-gray-900">{{ $p->nama }}</span>
                    </div>
                  </td>

                  {{-- Jenis --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    <span class="inline-block bg-gradient-to-br from-blue-50 to-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                      {{ $p->nama_jenis_hewan }}
                    </span>
                  </td>

                  {{-- Ras --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    @if($p->nama_ras)
                      <span class="inline-block bg-gradient-to-br from-purple-50 to-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $p->nama_ras }}
                      </span>
                    @else
                      <span class="text-gray-400 text-xs italic">-</span>
                    @endif
                  </td>

                  {{-- Kelamin --}}
                  <td class="px-6 py-3 whitespace-nowrap">
                    @php
                      $gender = $p->jenis_kelamin == 'M' ? 'Jantan' : 'Betina';
                      $genderColor = $p->jenis_kelamin == 'M'
                        ? 'from-sky-100 to-sky-200 text-sky-800'
                        : 'from-pink-100 to-pink-200 text-pink-800';
                    @endphp
                    <span class="inline-block bg-gradient-to-br {{ $genderColor }} px-3 py-1 rounded-full text-xs font-semibold">
                      {{ $gender }}
                    </span>
                  </td>

                  {{-- Tanggal Lahir --}}
                  <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                    {{ $p->tanggal_lahir ?? '-' }}
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
            <span class="font-bold text-[#002080]">{{ $pets->count() }}</span>
            hewan peliharaan terdaftar.
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

  .delay-200 { animation-delay: 0.2s; }
</style>

@endsection
