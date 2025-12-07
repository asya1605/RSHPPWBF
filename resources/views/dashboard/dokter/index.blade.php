@extends('layouts.dokter')

@section('title', 'Dashboard Dokter - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 py-12 px-6">
  <div class="max-w-7xl mx-auto">
    
    {{-- WELCOME BANNER --}}
    <div class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-indigo-700 rounded-3xl p-8 md:p-12 shadow-2xl overflow-hidden mb-8 animate-fadeIn">
      <!-- Decorative Elements -->
      <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 left-0 w-48 h-48 bg-indigo-400/20 rounded-full blur-2xl"></div>
      
      <div class="relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
          <div class="text-white text-center md:text-left">
            <div class="flex items-center justify-center md:justify-start gap-3 mb-4">
              <div class="bg-white/20 backdrop-blur-sm p-4 rounded-2xl animate-float">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
              </div>
              <h1 class="text-4xl md:text-5xl font-black">
                Halo, Dokter! 👩‍⚕️
              </h1>
            </div>
            <p class="text-blue-100 text-lg leading-relaxed max-w-2xl">
              Selamat datang di <span class="font-bold text-white">Dashboard Dokter RSHP Universitas Airlangga</span>.<br>
              Kelola pasien dan rekam medis dengan sistem yang efisien dan terintegrasi.
            </p>
          </div>
          
          <!-- Quick Stats -->
          <div class="flex gap-4">
            <div class="bg-white/20 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/30 text-center">
              <p class="text-white text-3xl font-black mb-1">{{ date('d') }}</p>
              <p class="text-blue-100 text-sm font-semibold">{{ date('M Y') }}</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/30 text-center">
              <p class="text-white text-3xl font-black mb-1">{{ date('H:i') }}</p>
              <p class="text-blue-100 text-sm font-semibold">WIB</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- MAIN MENU CARDS --}}
    <div class="grid md:grid-cols-3 gap-6 mb-8">
      
      {{-- Data Pasien --}}
      <a href="{{ route('dokter.pasien.index') }}" 
         class="group glass rounded-3xl p-8 shadow-xl border border-white hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 animate-fadeIn delay-100">
        <div class="flex items-start justify-between mb-6">
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
            </svg>
          </div>
          <div class="bg-blue-100 px-3 py-1 rounded-full">
            <span class="text-blue-800 text-xs font-bold">PASIEN</span>
          </div>
        </div>
        
        <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
          Data Pasien
        </h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Lihat dan kelola data pasien hewan yang terdaftar di sistem RSHP
        </p>
        
        <div class="flex items-center gap-2 text-blue-600 font-semibold group-hover:gap-4 transition-all">
          <span>Lihat Data</span>
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </div>
      </a>

      {{-- Rekam Medis --}}
      <a href="{{ route('dokter.rekam-medis.index') }}" 
         class="group glass rounded-3xl p-8 shadow-xl border border-white hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 animate-fadeIn delay-200">
        <div class="flex items-start justify-between mb-6">
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          </div>
          <div class="bg-teal-100 px-3 py-1 rounded-full">
            <span class="text-teal-800 text-xs font-bold">REKAM MEDIS</span>
          </div>
        </div>
        
        <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-teal-600 transition-colors">
          Rekam Medis
        </h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Akses dan perbarui catatan rekam medis pasien dengan lengkap
        </p>
        
        <div class="flex items-center gap-2 text-teal-600 font-semibold group-hover:gap-4 transition-all">
          <span>Lihat Rekam Medis</span>
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </div>
      </a>

      {{-- Profil Dokter --}}
      <a href="{{ route('dokter.profil.index') }}" 
         class="group glass rounded-3xl p-8 shadow-xl border border-white hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 animate-fadeIn delay-300">
        <div class="flex items-start justify-between mb-6">
          <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
          <div class="bg-purple-100 px-3 py-1 rounded-full">
            <span class="text-purple-800 text-xs font-bold">PROFIL</span>
          </div>
        </div>
        
        <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
          Profil Dokter
        </h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Kelola informasi profil dan pengaturan akun dokter Anda
        </p>
        
        <div class="flex items-center gap-2 text-purple-600 font-semibold group-hover:gap-4 transition-all">
          <span>Lihat Profil</span>
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </div>
      </a>
    </div>

    {{-- QUICK ACCESS SECTION --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
      
      {{-- Shortcut Actions --}}
      <div class="glass rounded-3xl p-8 shadow-xl border border-white animate-fadeIn delay-400">
        <div class="flex items-center gap-3 mb-6">
          <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-3 rounded-xl shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h2 class="text-2xl font-black gradient-text">Aksi Cepat</h2>
        </div>
        
        <div class="space-y-3">
          <a href="{{ route('dokter.pasien.index') }}" 
             class="flex items-center gap-4 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-100 hover:shadow-md transition-all group">
            <div class="bg-blue-600 p-2 rounded-lg">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-bold text-gray-900">Cari Pasien</p>
              <p class="text-sm text-gray-600">Temukan data pasien dengan cepat</p>
            </div>
            <svg class="w-5 h-5 text-blue-600 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
          
          <a href="{{ route('dokter.rekam-medis.index') }}" 
             class="flex items-center gap-4 p-4 bg-gradient-to-r from-teal-50 to-emerald-50 rounded-xl border border-teal-100 hover:shadow-md transition-all group">
            <div class="bg-teal-600 p-2 rounded-lg">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-bold text-gray-900">Tambah Rekam Medis</p>
              <p class="text-sm text-gray-600">Buat catatan medis baru</p>
            </div>
            <svg class="w-5 h-5 text-teal-600 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>

      {{-- Tips & Info --}}
      <div class="glass rounded-3xl p-8 shadow-xl border border-white animate-fadeIn delay-500">
        <div class="flex items-center gap-3 mb-6">
          <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-3 rounded-xl shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <h2 class="text-2xl font-black gradient-text">Tips Penggunaan</h2>
        </div>
        
        <div class="space-y-4">
          <div class="flex items-start gap-3">
            <div class="bg-amber-100 p-2 rounded-lg flex-shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900 mb-1">Selalu Update Data</p>
              <p class="text-sm text-gray-600">Pastikan data rekam medis selalu ter-update untuk pelayanan terbaik</p>
            </div>
          </div>
          
          <div class="flex items-start gap-3">
            <div class="bg-amber-100 p-2 rounded-lg flex-shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900 mb-1">Gunakan Fitur Search</p>
              <p class="text-sm text-gray-600">Manfaatkan fitur pencarian untuk menemukan data dengan cepat</p>
            </div>
          </div>
          
          <div class="flex items-start gap-3">
            <div class="bg-amber-100 p-2 rounded-lg flex-shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900 mb-1">Backup Data Rutin</p>
              <p class="text-sm text-gray-600">Data pasien di-backup otomatis oleh sistem setiap hari</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- SYSTEM INFO --}}
    <div class="glass rounded-3xl p-6 shadow-xl border border-white animate-fadeIn delay-600">
      <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="flex items-center gap-3">
          <div class="bg-gradient-to-br from-green-500 to-green-600 p-3 rounded-xl shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <div>
            <p class="font-bold text-gray-900">Sistem Aktif</p>
            <p class="text-sm text-gray-600">Semua layanan berjalan normal</p>
          </div>
        </div>
        
        <div class="flex items-center gap-4 text-sm text-gray-600">
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span>Server Online</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span>Database Connected</span>
          </div>
        </div>
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
  .delay-200 { animation-delay: 0.2s; }
  .delay-300 { animation-delay: 0.3s; }
  .delay-400 { animation-delay: 0.4s; }
  .delay-500 { animation-delay: 0.5s; }
  .delay-600 { animation-delay: 0.6s; }
</style>

@endsection