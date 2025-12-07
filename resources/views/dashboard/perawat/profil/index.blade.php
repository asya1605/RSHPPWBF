@extends('layouts.perawat')
@section('title', 'Profil Perawat - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-20 flex justify-center items-start pt-16">
  <div class="max-w-3xl w-full px-6 animate-fadeIn">
    
    {{-- HEADER --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white mb-8">
      <div class="flex items-center gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-3.314 0-6 1.79-6 4v1h12v-1c0-2.21-2.686-4-6-4z" />
          </svg>
        </div>

        <div>
          <h1 class="text-3xl font-black gradient-text">Profil Perawat</h1>
          <p class="text-gray-600 text-sm mt-1">
            Informasi akun dan data profil perawat RSHP UNAIR.
          </p>
        </div>
      </div>
    </div>

    {{-- CONTENT CARD --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white">
      @if($profil)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

          {{-- Info kiri --}}
          <div class="md:col-span-2 space-y-4">
            {{-- Nama User --}}
            <div>
              <p class="text-xs font-semibold text-gray-500 mb-1">Nama Perawat</p>
              <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 rounded-xl">
                <p class="text-base font-bold text-[#002080]">
                  {{ $profil->nama_user ?? '-' }}
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

          {{-- Kartu kecil kanan --}}
          <div class="glass rounded-2xl p-5 shadow-xl border border-white flex flex-col justify-between">
            <div>
              <p class="text-xs font-semibold text-gray-500 mb-1">Role</p>
              <p class="text-lg font-black text-[#002080]">
                {{ $profil->nama_role ?? '-' }}
              </p>
            </div>
            <div class="mt-4">
              <p class="text-xs font-semibold text-gray-500 mb-1">Pendidikan</p>
              <p class="text-sm font-medium text-gray-800">
                {{ $profil->pendidikan ?? '-' }}
              </p>
            </div>
          </div>

        </div>

        {{-- Jenis Kelamin & Alamat --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-2">
          <div>
            <p class="text-xs font-semibold text-gray-500 mb-1">Jenis Kelamin</p>
            <span class="inline-block bg-gradient-to-br from-teal-100 to-teal-200 text-teal-800 px-4 py-2 rounded-xl text-sm font-semibold">
              @if($profil->jenis_kelamin == 'L')
                Laki-laki
              @elseif($profil->jenis_kelamin == 'P')
                Perempuan
              @else
                -
              @endif
            </span>
          </div>

          <div class="md:col-span-2">
            <p class="text-xs font-semibold text-gray-500 mb-1">Alamat</p>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl">
              <p class="text-base font-medium">
                {{ $profil->alamat ?? '-' }}
              </p>
            </div>
          </div>
        </div>
      @else
        <div class="text-center py-10">
          <div class="mx-auto bg-gray-100 p-6 rounded-full w-24 h-24 flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M6.938 19h10.124A2 2 0 0020.8 17.2l.75-7.5A2 2 0 0019.56 7H4.44a2 2 0 00-1.99 2.7l.75 7.5A2 2 0 006.938 19z" />
            </svg>
          </div>
          <p class="text-gray-600 font-semibold text-lg">Data profil perawat tidak ditemukan.</p>
          <p class="text-gray-500 text-sm mt-1">Silakan hubungi admin untuk melengkapi data akun Anda.</p>
        </div>
      @endif

      {{-- Logout --}}
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
