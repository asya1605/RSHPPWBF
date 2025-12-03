@extends('layouts.admin.main')

@section('title', 'Tambah Kode Tindakan Terapi - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-3xl border border-gray-200 px-7 py-6">

    {{-- Header --}}
    <div class="mb-5 border-b border-gray-100 pb-3">
      <h2 class="text-lg font-bold text-[#002080] flex items-center gap-2">
        ➕ Tambah Kode Tindakan Terapi
      </h2>
      <p class="text-xs text-gray-500 mt-1">
        Daftarkan kode tindakan terapi baru beserta deskripsi dan kategorinya untuk digunakan pada rekam medis.
      </p>
    </div>

    {{-- Handling & Validation Feedback --}}
    @if (session('error'))
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-lg mb-4 text-sm">
        {{ session('error') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5 text-sm">
        <p class="font-semibold mb-1">Periksa kembali data berikut:</p>
        <ul class="list-disc ml-5 space-y-0.5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form
      method="POST"
      action="{{ route('admin.kode-tindakan-terapi.store') }}"
      class="grid md:grid-cols-2 gap-5"
    >
      @csrf

      {{-- Kode --}}
      <div class="space-y-1">
        <label class="block mb-1 text-sm font-semibold text-gray-700">
          Kode Tindakan <span class="text-red-500">*</span>
        </label>
        <input
          type="text"
          name="kode"
          value="{{ old('kode') }}"
          placeholder="Misal: T001, T-BEDAH-01"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          required
        >
        @error('kode')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Kategori --}}
      <div class="space-y-1">
        <label class="block mb-1 text-sm font-semibold text-gray-700">
          Kategori <span class="text-red-500">*</span>
        </label>
        <select
          name="idkategori"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          required
        >
          <option value="">-- Pilih Kategori --</option>
          @foreach($kategori as $k)
            <option
              value="{{ $k->idkategori }}"
              {{ old('idkategori') == $k->idkategori ? 'selected' : '' }}
            >
              {{ $k->nama_kategori }}
            </option>
          @endforeach
        </select>
        @error('idkategori')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Deskripsi --}}
      <div class="md:col-span-2 space-y-1">
        <label class="block mb-1 text-sm font-semibold text-gray-700">
          Deskripsi Tindakan <span class="text-red-500">*</span>
        </label>
        <input
          type="text"
          name="deskripsi_tindakan_terapi"
          value="{{ old('deskripsi_tindakan_terapi') }}"
          placeholder="Contoh: Pemberian terapi infus, tindakan bedah minor, prosedur vaksinasi, dll."
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          required
        >
        @error('deskripsi_tindakan_terapi')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Kategori Klinis --}}
      <div class="space-y-1">
        <label class="block mb-1 text-sm font-semibold text-gray-700">
          Kategori Klinis <span class="text-red-500">*</span>
        </label>
        <select
          name="idkategori_klinis"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          required
        >
          <option value="">-- Pilih Kategori Klinis --</option>
          @foreach($kategori_klinis as $kk)
            <option
              value="{{ $kk->idkategori_klinis }}"
              {{ old('idkategori_klinis') == $kk->idkategori_klinis ? 'selected' : '' }}
            >
              {{ $kk->nama_kategori_klinis }}
            </option>
          @endforeach
        </select>
        @error('idkategori_klinis')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Aksi --}}
      <div class="md:col-span-2 flex justify-between items-center pt-4">
        <a
          href="{{ route('admin.kode-tindakan-terapi.index') }}"
          class="inline-flex items-center text-xs md:text-sm text-gray-600 hover:text-gray-800"
        >
          ← Kembali ke daftar
        </a>

        <div class="flex gap-2">
          <a
            href="{{ route('admin.kode-tindakan-terapi.index') }}"
            class="inline-flex items-center px-4 py-2.5 rounded-lg border border-gray-300 text-xs md:text-sm
                   font-medium text-gray-700 hover:bg-gray-100"
          >
            Batal
          </a>
          <button
            type="submit"
            class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2.5 rounded-lg text-xs md:text-sm
                   font-semibold shadow-sm transition"
          >
            Simpan
          </button>
        </div>
      </div>
    </form>

  </div>
</section>
@endsection
