@extends('layouts.resepsionis')
@section('title', 'Registrasi Pemilik')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16 flex justify-center items-start pt-16">
  <div class="max-w-3xl w-full px-6 animate-fadeIn">

    {{-- HEADER --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white mb-8">
      <div class="flex items-center gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 4v16m8-8H4" />
          </svg>
        </div>

        <div>
          <h1 class="text-3xl font-black gradient-text">Registrasi Pemilik Baru</h1>
          <p class="text-gray-600 text-sm mt-1">
            Tambahkan data pemilik baru untuk keperluan registrasi pasien dan reservasi.
          </p>
        </div>
      </div>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
      <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-green-100 mb-6 bg-green-50/80">
        <p class="text-sm md:text-base text-green-800 font-medium">
          {{ session('success') }}
        </p>
      </div>
    @endif

    {{-- FORM CARD --}}
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white">
      <form method="POST" action="{{ route('resepsionis.registrasi-pemilik.store') }}" class="space-y-6">
        @csrf

        {{-- Nama --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Nama Lengkap <span class="text-red-500">*</span>
          </label>
          <input
            type="text"
            name="nama"
            value="{{ old('nama') }}"
            required
            class="input-field"
          >
          @error('nama') <p class="error">{{ $message }}</p> @enderror
        </div>

        {{-- Email --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Email <span class="text-red-500">*</span>
          </label>
          <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            class="input-field"
          >
          @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        {{-- Password --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Password <span class="text-red-500">*</span>
          </label>
          <input
            type="password"
            name="password"
            required
            class="input-field"
          >
          @error('password') <p class="error">{{ $message }}</p> @enderror
        </div>

        {{-- WhatsApp --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            No. WhatsApp <span class="text-red-500">*</span>
          </label>
          <input
            type="text"
            name="no_wa"
            placeholder="08xxxxxxxxxx"
            value="{{ old('no_wa') }}"
            required
            class="input-field"
          >
          @error('no_wa') <p class="error">{{ $message }}</p> @enderror
        </div>

        {{-- Alamat --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Alamat Lengkap <span class="text-red-500">*</span>
          </label>
          <textarea
            name="alamat"
            rows="3"
            required
            class="input-field"
          >{{ old('alamat') }}</textarea>
          @error('alamat') <p class="error">{{ $message }}</p> @enderror
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="pt-4 flex flex-wrap justify-between gap-3">
          <a href="{{ route('resepsionis.home') }}" class="btn-secondary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali</span>
          </a>

          <button type="submit" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7" />
            </svg>
            <span>Simpan</span>
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

  .input-field {
    @apply w-full border-2 border-gray-200 rounded-xl px-3 py-2 text-sm
           focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
           transition-all shadow-sm bg-white;
  }

  .error {
    @apply text-xs text-red-500 mt-1;
  }

  .gradient-text {
    background: linear-gradient(135deg, #002080 0%, #00BFA6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
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
