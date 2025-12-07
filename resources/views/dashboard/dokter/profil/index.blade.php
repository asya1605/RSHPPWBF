@extends('layouts.dokter')

@section('title', 'Profil Dokter')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-20 flex justify-center items-start pt-16">

  <div class="max-w-3xl w-full px-6 animate-fadeIn">
    
    {{-- HEADER --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white mb-8">
      <div class="flex items-center gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 6a4 4 0 110 8 4 4 0 010-8zm0 10c-4 0-8 2-8 4v1h16v-1c0-2-4-4-8-4z" />
          </svg>
        </div>

        <div>
          <h1 class="text-3xl font-black gradient-text">Profil Dokter</h1>
          <p class="text-gray-600 text-sm mt-1">Informasi lengkap mengenai akun dokter Anda.</p>
        </div>
      </div>
    </div>

    {{-- CONTENT CARD --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white">

      @if ($profil)
        
        <div class="grid grid-cols-1 gap-6">

          {{-- NAMA --}}
          <div>
            <p class="text-sm font-semibold text-gray-500 mb-1">Nama Dokter</p>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl">
              <p class="text-lg font-bold text-[#002080]">{{ $profil->nama_user }}</p>
            </div>
          </div>

          {{-- EMAIL --}}
          <div>
            <p class="text-sm font-semibold text-gray-500 mb-1">Email</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl">
              <p class="text-lg font-medium">{{ $profil->email }}</p>
            </div>
          </div>

          {{-- BIDANG --}}
          <div>
            <p class="text-sm font-semibold text-gray-500 mb-1">Bidang Dokter</p>
            <span class="inline-block bg-gradient-to-br from-indigo-100 to-indigo-200 text-indigo-800 px-4 py-2 rounded-xl font-semibold text-sm">
              {{ $profil->bidang_dokter }}
            </span>
          </div>

          {{-- NOMOR HP --}}
          <div>
            <p class="text-sm font-semibold text-gray-500 mb-1">Nomor HP</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl">
              <p class="text-lg font-medium">{{ $profil->no_hp ?? '-' }}</p>
            </div>
          </div>

          {{-- JENIS KELAMIN --}}
          <div>
            <p class="text-sm font-semibold text-gray-500 mb-1">Jenis Kelamin</p>
            <span class="inline-block bg-gradient-to-br from-teal-100 to-teal-200 text-teal-800 px-4 py-2 rounded-xl font-semibold text-sm">
              @if ($profil->jenis_kelamin === 'L') Laki-laki
              @elseif ($profil->jenis_kelamin === 'P') Perempuan
              @else -
              @endif
            </span>
          </div>

          {{-- ALAMAT --}}
          <div>
            <p class="text-sm font-semibold text-gray-500 mb-1">Alamat</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl">
              <p class="text-lg font-medium">{{ $profil->alamat ?? '-' }}</p>
            </div>
          </div>

        </div>

      @else
        <div class="text-center py-10">
          <div class="mx-auto bg-gray-100 p-6 rounded-full w-24 h-24 flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01m-6.938 4h13.856A2 2 0 0021 18V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002.062 2z"/>
            </svg>
          </div>
          <p class="text-gray-600 font-semibold text-lg">Data profil belum tersedia.</p>
          <p class="text-gray-500 text-sm mt-1">Silakan hubungi admin untuk melengkapi data Anda.</p>
        </div>
      @endif

    </div>

  </div>
</section>

{{-- STYLE --}}
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

  .btn-primary {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0]
           text-white px-6 py-3 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all;
  }
</style>

@endsection
