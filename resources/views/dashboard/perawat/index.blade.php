@extends('layouts.perawat')

@section('title', 'Dashboard Perawat - RSHP UNAIR')

@section('content')

@php
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;

    $user = Auth::user();
    $nama = $user->nama ?? $user->name ?? 'Perawat';

    Carbon::setLocale('id');
    $now = Carbon::now('Asia/Jakarta');

    $jam = (int) $now->format('H');
    if ($jam < 11) {
        $salam = 'Selamat pagi';
    } elseif ($jam < 15) {
        $salam = 'Selamat siang';
    } elseif ($jam < 18) {
        $salam = 'Selamat sore';
    } else {
        $salam = 'Selamat malam';
    }
@endphp

<section class="min-h-screen bg-gradient-to-br from-gray-50 via-teal-50 to-blue-50 py-12 px-6">
  <div class="max-w-7xl mx-auto">
    
    {{-- WELCOME BANNER --}}
    <div class="relative bg-gradient-to-br from-[#00BFA6] via-teal-600 to-[#002080] rounded-3xl p-8 md:p-12 shadow-2xl overflow-hidden mb-8 animate-fadeIn">
      <!-- Decorative Elements -->
      <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 left-0 w-48 h-48 bg-blue-400/20 rounded-full blur-2xl"></div>
      
      <div class="relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
          <div class="text-white text-center md:text-left">
            <div class="flex items-center justify-center md:justify-start gap-3 mb-3">
              <div class="bg-white/20 backdrop-blur-sm p-4 rounded-2xl animate-float">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zm0 2c2.21 0 4 1.343 4 3v2H8v-2c0-1.657 1.79-3 4-3z"/>
                </svg>
              </div>
              <div class="text-left">
                <p class="text-sm text-teal-100 font-semibold">{{ $salam }},</p>
                <h1 class="text-3xl md:text-5xl font-black leading-tight">
                  {{ $nama }} 🩺
                </h1>
              </div>
            </div>
            <p class="text-teal-100 text-lg leading-relaxed max-w-2xl">
              Selamat datang di <span class="font-bold text-white">Dashboard Perawat RSHP Universitas Airlangga</span>.<br>
              Bantu dokter mengelola dan memperbarui <span class="font-semibold">rekam medis hewan</span> secara digital dan terstruktur.
            </p>
          </div>
          
          <!-- Quick Info -->
          <div class="flex gap-4">
            <div class="bg-white/20 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/30 text-center">
              <p class="text-white text-3xl font-black mb-1">{{ $now->translatedFormat('d') }}</p>
              <p class="text-teal-100 text-sm font-semibold">{{ $now->translatedFormat('M Y') }}</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/30 text-center">
              <p class="text-white text-3xl font-black mb-1">{{ $now->format('H:i') }}</p>
              <p class="text-teal-100 text-sm font-semibold">WIB</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- MAIN MENU CARDS --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
      
      {{-- Rekam Medis --}}
      <a href="{{ route('perawat.rekam-medis.index') }}" 
         class="group glass rounded-3xl p-8 shadow-xl border border-white hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 animate-fadeIn delay-100">
        <div class="flex items-start justify-between mb-6">
          <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h4m-2-9h.01M7 4h5.586a1 1 0 01.707.293l4.414 4.414A1 1 0 0118 9.414V20a1 1 0 01-1 1H7a1 1 0 01-1-1V5a1 1 0 011-1z"/>
            </svg>
          </div>
          <div class="bg-purple-100 px-3 py-1 rounded-full">
            <span class="text-purple-800 text-xs font-bold">REKAM MEDIS</span>
          </div>
        </div>
        
        <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
          Kelola Rekam Medis
        </h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Lihat, perbarui, dan lengkapi rekam medis hewan sesuai instruksi dokter.
        </p>
        
        <div class="flex items-center gap-2 text-purple-600 font-semibold group-hover:gap-4 transition-all">
          <span>Buka Rekam Medis</span>
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </div>
      </a>

      {{-- Panduan Tindakan (static card) --}}
      <div class="glass rounded-3xl p-8 shadow-xl border border-white animate-fadeIn delay-200">
        <div class="flex items-start justify-between mb-6">
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M12 4a8 8 0 100 16 8 8 0 000-16z"/>
            </svg>
          </div>
          <div class="bg-blue-100 px-3 py-1 rounded-full">
            <span class="text-blue-800 text-xs font-bold">PANDUAN</span>
          </div>
        </div>

        <h3 class="text-2xl font-black text-gray-900 mb-3">
          Panduan Tindakan
        </h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Pastikan setiap tindakan keperawatan dicatat dengan jelas: diagnosis, terapi, dan respons hewan.
        </p>
        <ul class="text-sm text-gray-600 space-y-1 list-disc list-inside">
          <li>Cek identitas hewan & pemilik sebelum input data</li>
          <li>Konfirmasi instruksi dokter sebelum tindakan</li>
          <li>Catat perubahan kondisi setelah terapi</li>
        </ul>
      </div>
    </div>

    {{-- QUICK ACTIONS & TIPS --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
      
      {{-- Quick Actions --}}
      <div class="glass rounded-3xl p-8 shadow-xl border border-white animate-fadeIn delay-300">
        <div class="flex items-center gap-3 mb-6">
          <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-3 rounded-xl shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h2 class="text-2xl font-black gradient-text">Aksi Cepat</h2>
        </div>
        
        <div class="space-y-3">
          <a href="{{ route('perawat.rekam-medis.index') }}" 
             class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-100 hover:shadow-md transition-all group">
            <div class="bg-purple-600 p-2 rounded-lg">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-bold text-gray-900">Kelola Rekam Medis</p>
              <p class="text-sm text-gray-600">Masuk ke daftar rekam medis hewan.</p>
            </div>
            <svg class="w-5 h-5 text-purple-600 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>

      {{-- Tips Keperawatan --}}
      <div class="glass rounded-3xl p-8 shadow-xl border border-white animate-fadeIn delay-400">
        <div class="flex items-center gap-3 mb-6">
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-3 rounded-xl shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <h2 class="text-2xl font-black gradient-text">Tips Keperawatan</h2>
        </div>
        
        <div class="space-y-4">
          <div class="flex items-start gap-3">
            <div class="bg-teal-100 p-2 rounded-lg flex-shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900 mb-1">Catatan Lengkap</p>
              <p class="text-sm text-gray-600">Tuliskan keluhan, hasil pemeriksaan, dan tindakan secara jelas.</p>
            </div>
          </div>
          
          <div class="flex items-start gap-3">
            <div class="bg-teal-100 p-2 rounded-lg flex-shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900 mb-1">Kolaborasi dengan Dokter</p>
              <p class="text-sm text-gray-600">Pastikan setiap perubahan kondisi hewan dikomunikasikan ke dokter.</p>
            </div>
          </div>
          
          <div class="flex items-start gap-3">
            <div class="bg-teal-100 p-2 rounded-lg flex-shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900 mb-1">Keselamatan Hewan</p>
              <p class="text-sm text-gray-600">Periksa identitas gelang/tag sebelum tindakan untuk menghindari tertukar.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- CONTACT INFO --}}
    <div class="glass rounded-3xl p-6 shadow-xl border border-white animate-fadeIn delay-500">
      <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="flex items-center gap-3">
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <div>
            <p class="font-bold text-gray-900">Butuh Bantuan?</p>
            <p class="text-sm text-gray-600">Hubungi dokter jaga atau admin RSHP</p>
          </div>
        </div>
        
        <div class="flex items-center gap-4 text-sm">
          <a href="tel:+62315992785" class="flex items-center gap-2 text-blue-600 hover:text-blue-700 font-semibold transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <span>(031) 5992785</span>
          </a>
          <a href="https://wa.me/6281234567890" class="flex items-center gap-2 text-green-600 hover:text-green-700 font-semibold transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <span>WhatsApp</span>
          </a>
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
</style>

@endsection
