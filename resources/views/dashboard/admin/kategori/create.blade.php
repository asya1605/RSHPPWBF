@extends('layouts.admin.main')

@section('title', 'Tambah Kategori - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex justify-center items-center px-4 py-10">
  <div class="w-full max-w-md">
    
    {{-- BREADCRUMB --}}
    <div class="mb-6 animate-slideDown">
      <div class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('admin.kategori.index') }}" class="hover:text-[#002080] transition-colors">
          <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 0h8" />
          </svg>
          Data Kategori
        </a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-[#002080] font-semibold">Tambah Kategori</span>
      </div>
    </div>

    {{-- MAIN FORM CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">
      
      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-[#002080] to-[#0040A0] p-6">
        <div class="flex items-center gap-4">
          <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl animate-float">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
            </svg>
          </div>
          <div>
            <h2 class="text-xl font-black text-white mb-1">Tambah Kategori</h2>
            <p class="text-blue-100 text-xs">
              Daftarkan kategori baru untuk produk, obat, atau layanan.
            </p>
          </div>
        </div>
      </div>

      {{-- ALERTS --}}
      <div class="p-6 pb-0">
        @if ($errors->any())
          <div class="alert-danger animate-slideDown mb-4">
            <div class="flex items-start gap-3">
              <div class="bg-red-600 p-2 rounded-lg flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <div class="flex-1">
                <p class="font-bold mb-2">Periksa kembali data berikut:</p>
                <ul class="space-y-1 text-sm">
                  @foreach ($errors->all() as $error)
                    <li class="flex items-start gap-2">
                      <span class="text-red-600 mt-0.5">•</span>
                      <span>{{ $error }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        @endif
      </div>

      {{-- FORM --}}
      <form method="POST" action="{{ route('admin.kategori.store') }}" class="p-6 pt-3">
        @csrf

        <div class="space-y-5">
          {{-- Nama Kategori --}}
          <div class="form-group">
            <label class="form-label" for="nama_kategori">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
              </svg>
              <span>Nama Kategori</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
                </svg>
              </div>
              <input
                id="nama_kategori"
                type="text"
                name="nama_kategori"
                value="{{ old('nama_kategori') }}"
                placeholder="Contoh: Obat, Vitamin, Perawatan"
                class="form-input"
                required
              >
            </div>
            <p class="form-hint">Nama kategori akan digunakan di berbagai modul sistem.</p>
            @error('nama_kategori')
              <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Info Box --}}
          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-l-4 border-blue-500 rounded-xl p-4">
            <div class="flex gap-3">
              <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div class="text-xs text-blue-800">
                <p class="font-semibold mb-1">Tips:</p>
                <ul class="space-y-1 text-blue-700">
                  <li>• Gunakan nama kategori yang singkat dan jelas.</li>
                  <li>• Kategori akan membantu filter dan laporan data.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-6 pt-4 border-t border-gray-200 flex items-center justify-between">
          <a
            href="{{ route('admin.kategori.index') }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 font-medium transition-colors text-xs"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali</span>
          </a>

          <div class="flex gap-3">
            <a
              href="{{ route('admin.kategori.index') }}"
              class="btn-cancel"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
              </svg>
              <span>Batal</span>
            </a>
            <button
              type="submit"
              class="btn-submit"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"/>
              </svg>
              <span>Simpan Kategori</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

{{-- STYLES (kalau sudah ada global, bagian ini boleh dihapus) --}}
<style>
  .glass {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(10px);
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-slideDown { animation: slideDown 0.5s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .form-group { @apply space-y-2; }
  .form-label { @apply flex items-center gap-2 text-sm font-bold text-gray-700; }
  .input-wrapper { @apply relative; }
  .input-icon { @apply absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none; }

  .form-input {
    @apply w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm
           focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
           transition-all shadow-sm hover:border-gray-300;
  }

  .form-hint { @apply text-xs text-gray-500 mt-1; }

  .alert-danger {
    @apply bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 
           p-4 rounded-xl shadow-md;
  }

  .btn-cancel {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-5 py-2.5 
           rounded-xl font-bold border-2 border-gray-300 shadow-md text-xs
           hover:border-gray-400 hover:shadow-lg hover:scale-105 transition-all;
  }

  .btn-submit {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0] 
           text-white px-5 py-2.5 rounded-xl font-bold shadow-lg text-xs
           hover:shadow-xl hover:scale-105 transition-all;
  }
</style>

@endsection
