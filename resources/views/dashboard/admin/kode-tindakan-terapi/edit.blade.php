@extends('layouts.admin.main')

@section('title', 'Edit Kode Tindakan Terapi - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex justify-center items-center px-4 py-10">
  <div class="w-full max-w-3xl">

    {{-- BREADCRUMB --}}
    <div class="mb-6 animate-slideDown">
      <div class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="hover:text-[#002080] transition-colors">
          <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 7h18M5 11h14M7 15h10" />
          </svg>
          Data Kode Tindakan Terapi
        </a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-[#002080] font-semibold">Edit Kode</span>
      </div>
    </div>

    {{-- MAIN CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">

      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-amber-500 to-amber-600 p-8">
        <div class="flex items-center justify-between gap-4">
          <div class="flex items-center gap-4">
            <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
              </svg>
            </div>
            <div>
              <h2 class="text-2xl font-black text-white mb-1">Edit Kode Tindakan Terapi</h2>
              <p class="text-amber-100 text-sm">
                Perbarui kode, deskripsi, kategori, dan kategori klinis tindakan terapi.
              </p>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl border border-white/30">
              <p class="text-amber-100 text-xs font-semibold mb-0.5">ID</p>
              <p class="text-white text-lg font-black">#{{ $item->idkode_tindakan_terapi }}</p>
            </div>
          </div>
        </div>

        {{-- Mobile badge --}}
        <div class="md:hidden mt-4">
          <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl border border-white/30 inline-block">
            <span class="text-white text-sm font-bold">
              ID: #{{ $item->idkode_tindakan_terapi }}
            </span>
          </div>
        </div>
      </div>

      {{-- ALERTS --}}
      <div class="p-8 pb-0">
        @if (session('error'))
          <div class="alert-danger animate-slideDown mb-4">
            <div class="flex items-center gap-3">
              <div class="bg-red-600 p-2 rounded-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <div>
                <p class="font-bold">Perhatian!</p>
                <p class="text-sm">{{ session('error') }}</p>
              </div>
            </div>
          </div>
        @endif

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
      <form
        method="POST"
        action="{{ route('admin.kode-tindakan-terapi.update', $item->idkode_tindakan_terapi) }}"
        class="p-8 pt-4"
      >
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">

          {{-- Kode --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 7h18M5 11h14M9 15h6"/>
              </svg>
              <span>Kode Tindakan</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h18M5 11h14M9 15h6"/>
                </svg>
              </div>
              <input
                type="text"
                name="kode"
                value="{{ old('kode', $item->kode) }}"
                placeholder="Misal: T001, T-ANES-01"
                class="form-input"
                required
              >
            </div>
            @error('kode')
              <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Kategori --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 10h10M4 14h8M4 18h6"/>
              </svg>
              <span>Kategori</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h10M4 14h8M4 18h6"/>
                </svg>
              </div>
              <select
                name="idkategori"
                class="form-input pl-12 bg-white"
                required
              >
                @foreach($kategori as $k)
                  <option
                    value="{{ $k->idkategori }}"
                    {{ old('idkategori', $item->idkategori) == $k->idkategori ? 'selected' : '' }}
                  >
                    {{ $k->nama_kategori }}
                  </option>
                @endforeach
              </select>
            </div>
            @error('idkategori')
              <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Kategori Klinis --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 11h10M7 15h6M5 7h14M5 19h14"/>
              </svg>
              <span>Kategori Klinis</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 11h10M7 15h6M5 7h14M5 19h14"/>
                </svg>
              </div>
              <select
                name="idkategori_klinis"
                class="form-input pl-12 bg-white"
                required
              >
                @foreach($kategori_klinis as $kk)
                  <option
                    value="{{ $kk->idkategori_klinis }}"
                    {{ old('idkategori_klinis', $item->idkategori_klinis) == $kk->idkategori_klinis ? 'selected' : '' }}
                  >
                    {{ $kk->nama_kategori_klinis }}
                  </option>
                @endforeach
              </select>
            </div>
            @error('idkategori_klinis')
              <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Deskripsi --}}
          <div class="form-group md:col-span-2">
            <label class="form-label">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 12h8m-8 4h5m-5-8h10M5 6h.01M5 10h.01M5 14h.01M5 18h.01"/>
              </svg>
              <span>Deskripsi Tindakan</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h8m-8 4h5m-5-8h10M5 6h.01M5 10h.01M5 14h.01M5 18h.01"/>
                </svg>
              </div>
              <input
                type="text"
                name="deskripsi_tindakan_terapi"
                value="{{ old('deskripsi_tindakan_terapi', $item->deskripsi_tindakan_terapi) }}"
                placeholder="Contoh: Pemberian terapi infus, tindakan bedah minor, prosedur vaksinasi, dll."
                class="form-input"
                required
              >
            </div>
            @error('deskripsi_tindakan_terapi')
              <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
          <a
            href="{{ route('admin.kode-tindakan-terapi.index') }}"
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
              href="{{ route('admin.kode-tindakan-terapi.index') }}"
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
              <span>Simpan Perubahan</span>
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</section>

{{-- STYLES --}}
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
           focus:outline-none focus:border-amber-500 focus:ring-4 focus:ring-amber-100
           transition-all shadow-sm hover:border-gray-300 bg-white;
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
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-amber-600
           text-white px-6 py-3 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all;
  }
</style>

@endsection
