@extends('layouts.pemilik')
@section('title', 'Profil Pemilik - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-20 flex justify-center items-start pt-16">
  <div class="max-w-3xl w-full px-6 animate-fadeIn">
    
    {{-- HEADER --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white mb-8">
      <div class="flex items-center gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A9 9 0 1118 19v-1a3 3 0 00-3-3H9a3 3 0 00-3 3v1.5a8.96 8.96 0 01-.879-1.696z" />
          </svg>
        </div>

        <div>
          <h1 class="text-3xl font-black gradient-text">Profil Pemilik</h1>
          <p class="text-gray-600 text-sm mt-1">Informasi akun dan data dasar pemilik hewan.</p>
        </div>
      </div>
    </div>

    {{-- CONTENT CARD --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        {{-- Info Utama --}}
        <div class="md:col-span-2 space-y-4">

          {{-- Nama --}}
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Nama</p>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 rounded-xl">
              <p class="text-base font-bold text-[#002080]">
                {{ $profil->nama ?? '-' }}
              </p>
            </div>
          </div>

          {{-- Email --}}
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Email</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-3 rounded-xl">
              <p class="text-base font-medium">
                {{ $profil->email ?? '-' }}
              </p>
            </div>
          </div>

          {{-- No HP --}}
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">No. HP</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-3 rounded-xl">
              <p class="text-base font-medium">
                {{ $profil->no_hp ?? '-' }}
              </p>
            </div>
          </div>

        </div>

        {{-- Kartu Statistik --}}
        <div class="glass rounded-2xl p-5 shadow-xl border border-white flex flex-col justify-between">
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Jumlah Hewan Terdaftar</p>
            <p class="text-3xl font-black text-[#002080]">
              {{ $jumlahPet ?? 0 }}
            </p>
          </div>
          <div class="mt-4">
            <p class="text-xs text-gray-500">
              Hewan peliharaan yang terhubung dengan akun Anda di RSHP UNAIR.
            </p>
          </div>
        </div>

      </div>

      {{-- Alamat --}}
      <div class="mt-4">
        <p class="text-xs font-semibold text-gray-500 mb-1">Alamat</p>
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl">
          <p class="text-base font-medium">
            {{ $profil->alamat ?? '-' }}
          </p>
        </div>
      </div>

      {{-- ACTIONS --}}
      <div class="mt-8 flex justify-end">
        <a href="{{ route('logout') }}" class="btn-danger">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H9m4 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
          </svg>
          <span>Logout</span>
        </a>
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
    50% { transform: translateY(-8px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .btn-danger {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600
           text-white px-6 py-2.5 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all text-sm;
  }
</style>

@endsection
