@extends('layouts.admin.main')

@section('title', 'Tambah Pet - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex justify-center items-center px-4 py-10">
  <div class="w-full max-w-3xl">
    
    {{-- BREADCRUMB --}}
    <div class="mb-6 animate-slideDown">
      <div class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('admin.pet.index') }}" class="hover:text-[#002080] transition-colors">
          <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 0h8" />
          </svg>
          Data Pet
        </a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-[#002080] font-semibold">Tambah Pet</span>
      </div>
    </div>

    {{-- MAIN FORM CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">
      
      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-[#002080] to-[#0040A0] p-8">
        <div class="flex items-center gap-4">
          <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl animate-float">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-black text-white mb-1">Tambah Pet Baru</h2>
            <p class="text-blue-100 text-sm">
              Lengkapi informasi untuk menambahkan hewan pasien baru ke RSHP UNAIR.
            </p>
          </div>
        </div>
      </div>

      {{-- ALERTS --}}
      <div class="p-8 pb-0">
        @if(session('danger'))
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

        @if($errors->any())
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
                  @foreach($errors->all() as $e)
                    <li class="flex items-start gap-2">
                      <span class="text-red-600 mt-0.5">•</span>
                      <span>{{ $e }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        @endif
      </div>

      {{-- FORM --}}
      <form method="POST" action="{{ route('admin.pet.store') }}" class="p-8 pt-4">
        @csrf

        <div class="space-y-6">

          {{-- Info Box --}}
          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-l-4 border-blue-500 rounded-xl p-4 mb-2">
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
                  <li>• Pastikan pemilik dan ras sudah terdaftar di data master.</li>
                  <li>• Data ini akan digunakan pada rekam medis dan layanan klinik.</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="grid md:grid-cols-2 gap-6">
            {{-- Nama Pet --}}
            <div class="form-group">
              <label class="form-label">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Nama Pet</span>
                <span class="text-red-500">*</span>
              </label>
              <div class="input-wrapper">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                </div>
                <input
                  type="text"
                  name="nama"
                  value="{{ old('nama') }}"
                  class="form-input"
                  placeholder="Contoh: Guguk, Olla, Jinji"
                  required
                >
              </div>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-group">
              <label class="form-label">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14"/>
                </svg>
                <span>Tanggal Lahir</span>
              </label>
              <div class="input-wrapper">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14"/>
                  </svg>
                </div>
                <input
                  type="date"
                  name="tanggal_lahir"
                  value="{{ old('tanggal_lahir') }}"
                  class="form-input"
                >
              </div>
            </div>

            {{-- Warna / Tanda --}}
            <div class="form-group">
              <label class="form-label">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
                </svg>
                <span>Warna / Tanda</span>
              </label>
              <div class="input-wrapper">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
                  </svg>
                </div>
                <input
                  type="text"
                  name="warna_tanda"
                  value="{{ old('warna_tanda') }}"
                  class="form-input"
                  placeholder="Contoh: Putih polos, belang cokelat"
                >
              </div>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="form-group">
              <label class="form-label">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v4m0 0a2 2 0 100-4 2 2 0 000 4zM6 20l3-3m0 0l3 3m-3-3v-7m6 10V10m0 0l3 3m-3-3l-3 3"/>
                </svg>
                <span>Jenis Kelamin</span>
              </label>
              <div class="input-wrapper">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v4m0 0a2 2 0 100-4 2 2 0 000 4zM6 20l3-3m0 0l3 3m-3-3v-7m6 10V10m0 0l3 3m-3-3l-3 3"/>
                  </svg>
                </div>
                <select
                  name="jenis_kelamin"
                  class="form-input bg-white"
                >
                  <option value="M" {{ old('jenis_kelamin') == 'M' ? 'selected' : '' }}>Jantan</option>
                  <option value="F" {{ old('jenis_kelamin') == 'F' ? 'selected' : '' }}>Betina</option>
                </select>
              </div>
            </div>

            {{-- Pemilik --}}
            <div class="form-group md:col-span-1">
              <label class="form-label">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span>Pemilik</span>
                <span class="text-red-500">*</span>
              </label>
              <div class="input-wrapper">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                </div>
                <select
                  name="idpemilik"
                  class="form-input bg-white"
                  required
                >
                  <option value="">-- Pilih Pemilik --</option>
                  @foreach($pemilikList as $p)
                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                      {{ $p->nama }} ({{ $p->email }})
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            {{-- Ras Hewan --}}
            <div class="form-group md:col-span-1">
              <label class="form-label">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 13l4 4L19 7"/>
                </svg>
                <span>Ras Hewan</span>
                <span class="text-red-500">*</span>
              </label>
              <div class="input-wrapper">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <select
                  name="idras_hewan"
                  class="form-input bg-white"
                  required
                >
                  <option value="">-- Pilih Ras --</option>
                  @foreach($rasList as $r)
                    <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                      {{ $r->nama_ras }} — {{ $r->nama_jenis_hewan }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
          <a
            href="{{ route('admin.pet.index') }}"
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
              href="{{ route('admin.pet.index') }}"
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
              <span>Simpan Pet</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

{{-- STYLES (kalau sudah global dari halaman lain, bagian ini boleh dihapus) --}}
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

  .form-group { @apply space-y-2; }
  .form-label { @apply flex items-center gap-2 text-sm font-bold text-gray-700; }
  .input-wrapper { @apply relative; }
  .input-icon { @apply absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none; }

  .form-input {
    @apply w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm
           focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
           transition-all shadow-sm hover:border-gray-300;
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
