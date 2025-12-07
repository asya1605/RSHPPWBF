@extends('layouts.admin.main')

@section('title', 'Tambah Jenis Hewan - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex justify-center items-center px-4 py-10">
  <div class="w-full max-w-2xl">
    
    {{-- BREADCRUMB --}}
    <div class="mb-6 animate-slideDown">
      <div class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('admin.jenis-hewan.index') }}" class="hover:text-[#002080] transition-colors">
          <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 0h8" />
          </svg>
          Data Jenis Hewan
        </a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-[#002080] font-semibold">Tambah Jenis Hewan</span>
      </div>
    </div>

    {{-- MAIN FORM CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">
      
      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-[#002080] to-[#0040A0] p-8">
        <div class="flex items-center gap-4">
          <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl animate-float">
            {{-- Icon paw --}}
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.49 3.17a2.25 2.25 0 11-2.98 3.36 2.25 2.25 0 012.98-3.36zm5 0a2.25 2.25 0 11-2.98 3.36 2.25 2.25 0 012.98-3.36zM6.5 4.75A2.25 2.25 0 104.53 8.6 2.25 2.25 0 006.5 4.75zm11 3.5A2.25 2.25 0 1015.53 12 2.25 2.25 0 0017.5 8.25zM8.75 13.5c-1.88 0-3.25 1.5-3.25 3.25 0 1.24.7 2.39 1.8 3.01 1.28.7 2.86.99 4.7.99s3.42-.29 4.7-.99c1.1-.62 1.8-1.77 1.8-3.01 0-1.75-1.37-3.25-3.25-3.25-.86 0-1.63.32-2.25.84a3.64 3.64 0 00-2.5-.84z" />
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-black text-white mb-1">Tambah Jenis Hewan</h2>
            <p class="text-blue-100 text-sm">
              Daftarkan jenis hewan baru yang dapat digunakan pada data ras dan pet.
            </p>
          </div>
        </div>
      </div>

      {{-- ALERTS --}}
      <div class="p-8 pb-0">
        @if (session('danger'))
          <div class="alert-danger animate-slideDown mb-6">
            <div class="flex items-center gap-3">
              <div class="bg-red-600 p-2 rounded-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <div>
                <p class="font-bold">Perhatian!</p>
                <p class="text-sm">{{ session('danger') }}</p>
              </div>
            </div>
          </div>
        @endif

        @if ($errors->any())
          <div class="alert-danger animate-slideDown mb-6">
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
      <form method="POST" action="{{ route('admin.jenis-hewan.store') }}" class="p-8 pt-4">
        @csrf

        <div class="space-y-6">
          {{-- Nama Jenis Hewan --}}
          <div class="form-group">
            <label class="form-label" for="nama_jenis_hewan">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11.49 3.17a2.25 2.25 0 11-2.98 3.36 2.25 2.25 0 012.98-3.36zM6.5 4.75A2.25 2.25 0 104.53 8.6 2.25 2.25 0 006.5 4.75z" />
              </svg>
              <span>Nama Jenis Hewan</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.49 3.17a2.25 2.25 0 11-2.98 3.36 2.25 2.25 0 012.98-3.36zM6.5 4.75A2.25 2.25 0 104.53 8.6 2.25 2.25 0 006.5 4.75z" />
                </svg>
              </div>
              <input
                id="nama_jenis_hewan"
                type="text"
                name="nama_jenis_hewan"
                value="{{ old('nama_jenis_hewan') }}"
                class="form-input"
                placeholder="Contoh: Kucing, Anjing, Kelinci"
                required
              >
            </div>
            <p class="form-hint">
              Nama jenis hewan akan digunakan pada data ras dan pet.
            </p>
            @error('nama_jenis_hewan')
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
              <div class="text-sm text-blue-800">
                <p class="font-semibold mb-1">Catatan:</p>
                <ul class="space-y-1 text-blue-700">
                  <li>• Pastikan nama jenis hewan tidak duplikat.</li>
                  <li>• Jenis hewan ini akan muncul pada pilihan ras dan data pet.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
          <a
            href="{{ route('admin.jenis-hewan.index') }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 font-medium transition-colors"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali</span>
          </a>

          <div class="flex gap-3">
            <a
              href="{{ route('admin.jenis-hewan.index') }}"
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
              <span>Simpan Jenis</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

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
    50% { transform: translateY(-10px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-slideDown { animation: slideDown 0.5s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .form-group {
    @apply space-y-2;
  }

  .form-label {
    @apply flex items-center gap-2 text-sm font-bold text-gray-700;
  }

  .input-wrapper {
    @apply relative;
  }

  .input-icon {
    @apply absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none;
  }

  .form-input {
    @apply w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm
           focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
           transition-all shadow-sm hover:border-gray-300;
  }

  .form-hint {
    @apply text-xs text-gray-500 mt-1;
  }

  .alert-danger {
    @apply bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 
           p-4 rounded-xl shadow-md;
  }

  .btn-cancel {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-3 
           rounded-xl font-bold border-2 border-gray-300 shadow-md
           hover:border-gray-400 hover:shadow-lg hover:scale-105 transition-all;
  }

  .btn-submit {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0] 
           text-white px-6 py-3 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all;
  }
</style>

@endsection
