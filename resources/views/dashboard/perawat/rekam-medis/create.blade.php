@extends('layouts.perawat')

@section('title', 'Buat Rekam Medis - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16 flex justify-center items-start pt-16">
  <div class="max-w-3xl w-full px-6 animate-fadeIn">

    {{-- HEADER --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white mb-8">
      <div class="flex items-center gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6M9 8h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
          </svg>
        </div>

        <div>
          <h1 class="text-3xl font-black gradient-text">Buat Rekam Medis Baru</h1>
          <p class="text-gray-600 text-sm mt-1">
            Isi data anamnesa, temuan klinis, dan diagnosa untuk kunjungan pasien ini.
          </p>
        </div>
      </div>
    </div>

    {{-- FORM CARD --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white">
      <form action="{{ route('perawat.rekam-medis.store') }}" method="POST" class="space-y-6">
        @csrf

        <input type="hidden" name="idreservasi" value="{{ request('idreservasi') }}">
        <input type="hidden" name="idpet" value="{{ request('idpet') }}">

        {{-- Dokter Pemeriksa --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Dokter Pemeriksa <span class="text-red-500">*</span>
          </label>
          <select
            name="iduser_dokter"
            required
            class="input-field"
          >
            <option value="">-- Pilih Dokter --</option>
            @foreach($listDokter as $d)
              <option value="{{ $d->iduser }}" {{ old('iduser_dokter') == $d->iduser ? 'selected' : '' }}>
                {{ $d->nama }}
              </option>
            @endforeach
          </select>
          @error('iduser_dokter')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        {{-- Anamnesa --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Anamnesa
          </label>
          <textarea
            name="anamnesa"
            rows="3"
            class="input-field"
          >{{ old('anamnesa') }}</textarea>
          @error('anamnesa')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        {{-- Temuan Klinis --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Temuan Klinis
          </label>
          <textarea
            name="temuan_klinis"
            rows="3"
            class="input-field"
          >{{ old('temuan_klinis') }}</textarea>
          @error('temuan_klinis')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        {{-- Diagnosa --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Diagnosa
          </label>
          <textarea
            name="diagnosa"
            rows="3"
            class="input-field"
          >{{ old('diagnosa') }}</textarea>
          @error('diagnosa')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        {{-- ACTIONS --}}
        <div class="pt-4 flex flex-wrap justify-between gap-3">
          <a href="{{ route('perawat.rekam-medis.index') }}" class="btn-secondary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
            </svg>
            <span>Batal</span>
          </a>

          <button type="submit" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7" />
            </svg>
            <span>Simpan & Lanjut</span>
          </button>
        </div>
      </form>
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

  .input-field {
    @apply w-full border-2 border-gray-200 rounded-xl px-3 py-2 text-sm
           focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
           transition-all shadow-sm bg-white;
  }

  .error {
    @apply text-xs text-red-500 mt-1;
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
           text-white px-6 py-2.5 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all text-sm;
  }

  .btn-secondary {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-2.5
           rounded-xl font-bold border-2 border-gray-200 shadow-md
           hover:border-gray-300 hover:shadow-lg hover:scale-105 transition-all text-sm;
  }
</style>

@endsection
