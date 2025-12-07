@extends('layouts.admin.main')

@section('title', 'Dashboard Admin - RSHP UNAIR')

@section('content')

{{-- WELCOME BANNER --}}
<section class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-[#00BFA6] rounded-3xl p-8 md:p-12 shadow-2xl overflow-hidden mb-8 animate-fadeIn">
  <!-- Decorative Elements -->
  <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#FFD700]/20 rounded-full blur-2xl"></div>
  
  <div class="relative z-10">
    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="text-white">
        <div class="flex items-center gap-3 mb-4">
          <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl animate-float">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
          </div>
          <h1 class="text-3xl md:text-4xl font-black">Halo, Admin! 🎉</h1>
        </div>
        <p class="text-blue-100 text-lg leading-relaxed max-w-2xl">
          Selamat datang di <span class="font-bold text-[#FFD700]">Dashboard Administrator RSHP Universitas Airlangga</span>.<br>
          Kelola data dan pantau aktivitas sistem dengan mudah.
        </p>
      </div>
      
      <!-- Quick Actions -->
      <div class="flex flex-wrap gap-3">
        <button class="bg-white text-[#002080] px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
          </svg>
          Tambah Data
        </button>
        <button class="bg-[#FFD700] text-[#002080] px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
          Lihat Laporan
        </button>
      </div>
    </div>
  </div>
</section>

{{-- STATISTICS CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  
  {{-- Total User --}}
  <div class="relative group animate-slideRight">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
    <div class="relative glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2">
      <div class="flex items-start justify-between mb-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
        </div>
        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Aktif</span>
      </div>
      <h3 class="text-4xl font-black text-[#002080] mb-2">{{ $stats['total_user'] ?? '-' }}</h3>
      <p class="text-gray-600 font-semibold">Total User</p>
      <div class="mt-4 pt-4 border-t border-gray-200">
        <p class="text-sm text-gray-500">Pengguna terdaftar</p>
      </div>
    </div>
  </div>

  {{-- Total Hewan --}}
  <div class="relative group animate-slideRight delay-100">
    <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-teal-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
    <div class="relative glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2">
      <div class="flex items-start justify-between mb-4">
        <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-3 rounded-xl shadow-lg animate-float" style="animation-delay: 0.2s;">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
          </svg>
        </div>
        <span class="bg-teal-100 text-teal-800 text-xs font-bold px-3 py-1 rounded-full">🐾 Hewan</span>
      </div>
      <h3 class="text-4xl font-black text-[#002080] mb-2">{{ $stats['total_pet'] ?? '-' }}</h3>
      <p class="text-gray-600 font-semibold">Total Hewan</p>
      <div class="mt-4 pt-4 border-t border-gray-200">
        <p class="text-sm text-gray-500">Hewan terdaftar</p>
      </div>
    </div>
  </div>

  {{-- Rekam Medis --}}
  <div class="relative group animate-slideRight delay-200">
    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-purple-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
    <div class="relative glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2">
      <div class="flex items-start justify-between mb-4">
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-3 rounded-xl shadow-lg animate-float" style="animation-delay: 0.4s;">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
        </div>
        <span class="bg-purple-100 text-purple-800 text-xs font-bold px-3 py-1 rounded-full">📋 Medis</span>
      </div>
      <h3 class="text-4xl font-black text-[#002080] mb-2">{{ $stats['total_rekam'] ?? '-' }}</h3>
      <p class="text-gray-600 font-semibold">Rekam Medis</p>
      <div class="mt-4 pt-4 border-t border-gray-200">
        <p class="text-sm text-gray-500">Total rekaman</p>
      </div>
    </div>
  </div>

  {{-- Reservasi --}}
  <div class="relative group animate-slideRight delay-300">
    <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-amber-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
    <div class="relative glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2">
      <div class="flex items-start justify-between mb-4">
        <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-3 rounded-xl shadow-lg animate-float" style="animation-delay: 0.6s;">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
        </div>
        <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">📅 Booking</span>
      </div>
      <h3 class="text-4xl font-black text-[#002080] mb-2">{{ $stats['total_reservasi'] ?? '-' }}</h3>
      <p class="text-gray-600 font-semibold">Reservasi</p>
      <div class="mt-4 pt-4 border-t border-gray-200">
        <p class="text-sm text-gray-500">Total booking</p>
      </div>
    </div>
  </div>
</div>

{{-- QUICK ACCESS MENU --}}
<div class="grid md:grid-cols-2 gap-6 mb-8">
  
  {{-- Recent Activity --}}
  <div class="glass rounded-3xl p-8 shadow-2xl border border-white animate-fadeIn delay-400">
    <div class="flex items-center gap-3 mb-6">
      <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
      <h2 class="text-2xl font-black gradient-text">Aktivitas Terbaru</h2>
    </div>
    
    <div class="space-y-3">
      <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-100 hover:shadow-md transition-all">
        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
        <div class="flex-1">
          <p class="text-sm font-semibold text-gray-800">User baru terdaftar</p>
          <p class="text-xs text-gray-500">5 menit yang lalu</p>
        </div>
      </div>
      
      <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-teal-50 to-emerald-50 rounded-xl border border-teal-100 hover:shadow-md transition-all">
        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
        <div class="flex-1">
          <p class="text-sm font-semibold text-gray-800">Reservasi baru dibuat</p>
          <p class="text-xs text-gray-500">15 menit yang lalu</p>
        </div>
      </div>
      
      <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-purple-50 to-violet-50 rounded-xl border border-purple-100 hover:shadow-md transition-all">
        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
        <div class="flex-1">
          <p class="text-sm font-semibold text-gray-800">Rekam medis diperbarui</p>
          <p class="text-xs text-gray-500">1 jam yang lalu</p>
        </div>
      </div>
    </div>
    
    <button class="mt-6 w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-xl font-bold hover:shadow-lg hover:scale-105 transition-all">
      Lihat Semua Aktivitas
    </button>
  </div>

  {{-- Quick Links --}}
  <div class="glass rounded-3xl p-8 shadow-2xl border border-white animate-fadeIn delay-500">
    <div class="flex items-center gap-3 mb-6">
      <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-3 rounded-xl shadow-lg">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
      </div>
      <h2 class="text-2xl font-black gradient-text">Menu Cepat</h2>
    </div>
    
    <div class="grid grid-cols-2 gap-4">
      <button class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200 hover:shadow-lg hover:scale-105 transition-all text-left group">
        <div class="bg-blue-600 w-10 h-10 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
        </div>
        <p class="font-bold text-gray-800">Kelola User</p>
        <p class="text-xs text-gray-500 mt-1">Tambah & edit user</p>
      </button>
      
      <button class="bg-gradient-to-br from-teal-50 to-teal-100 p-4 rounded-xl border border-teal-200 hover:shadow-lg hover:scale-105 transition-all text-left group">
        <div class="bg-teal-600 w-10 h-10 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
          </svg>
        </div>
        <p class="font-bold text-gray-800">Data Hewan</p>
        <p class="text-xs text-gray-500 mt-1">Lihat semua hewan</p>
      </button>
      
      <button class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200 hover:shadow-lg hover:scale-105 transition-all text-left group">
        <div class="bg-purple-600 w-10 h-10 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
        </div>
        <p class="font-bold text-gray-800">Rekam Medis</p>
        <p class="text-xs text-gray-500 mt-1">Kelola rekam medis</p>
      </button>
      
      <button class="bg-gradient-to-br from-amber-50 to-amber-100 p-4 rounded-xl border border-amber-200 hover:shadow-lg hover:scale-105 transition-all text-left group">
        <div class="bg-amber-600 w-10 h-10 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
        </div>
        <p class="font-bold text-gray-800">Reservasi</p>
        <p class="text-xs text-gray-500 mt-1">Kelola booking</p>
      </button>
    </div>
  </div>
</div>

{{-- SYSTEM INFO --}}
<div class="glass rounded-3xl p-8 shadow-2xl border border-white animate-fadeIn delay-600">
  <div class="flex items-center gap-3 mb-6">
    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-3 rounded-xl shadow-lg">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
    </div>
    <h2 class="text-2xl font-black gradient-text">Informasi Sistem</h2>
  </div>
  
  <div class="grid md:grid-cols-3 gap-4">
    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-5 rounded-xl border border-indigo-100">
      <p class="text-sm text-gray-600 mb-1">Status Server</p>
      <div class="flex items-center gap-2">
        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
        <p class="font-bold text-gray-800">Online</p>
      </div>
    </div>
    
    <div class="bg-gradient-to-br from-teal-50 to-emerald-50 p-5 rounded-xl border border-teal-100">
      <p class="text-sm text-gray-600 mb-1">Database</p>
      <div class="flex items-center gap-2">
        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
        <p class="font-bold text-gray-800">Connected</p>
      </div>
    </div>
    
    <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-5 rounded-xl border border-purple-100">
      <p class="text-sm text-gray-600 mb-1">Last Update</p>
      <p class="font-bold text-gray-800">{{ now()->format('d M Y, H:i') }}</p>
    </div>
  </div>
</div>

<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  @keyframes slideRight {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
  }
  
  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  
  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-slideRight { animation: slideRight 0.6s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }
  
  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
  .delay-300 { animation-delay: 0.3s; }
  .delay-400 { animation-delay: 0.4s; }
  .delay-500 { animation-delay: 0.5s; }
  .delay-600 { animation-delay: 0.6s; }
  
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
</style>

@endsection