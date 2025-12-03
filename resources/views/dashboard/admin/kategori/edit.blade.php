@extends('layouts.admin.main')

@section('title', 'Edit Kategori - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md border border-gray-200 px-7 py-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-3 mb-4 border-b border-gray-100 pb-3">
      <div>
        <h2 class="text-lg font-bold text-[#002080]">✏️ Edit Kategori</h2>
        <p class="text-xs text-gray-500 mt-1">
          Perbarui nama kategori yang digunakan pada data layanan atau tindakan.
        </p>
      </div>
      <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-[#002080] border border-blue-100">
        ID: #{{ $kategori->idkategori }}
      </span>
    </div>

    {{-- Pesan Error --}}
    @if ($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
        <p class="font-semibold mb-1">Periksa kembali data berikut:</p>
        <ul class="list-disc ml-5 space-y-0.5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form Edit --}}
    <form method="POST" action="{{ route('admin.kategori.update', $kategori->idkategori) }}" class="space-y-4">
      @csrf
      @method('PUT')

      <div class="space-y-1">
        <label for="nama_kategori" class="block text-sm font-semibold text-gray-700">
          Nama Kategori <span class="text-red-500">*</span>
        </label>
        <input
          id="nama_kategori"
          type="text"
          name="nama_kategori"
          value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
          placeholder="Contoh: Rawat Jalan, Rawat Inap, Laboratorium"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          required
        >
        @error('nama_kategori')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex justify-between items-center pt-3">
        <a
          href="{{ route('admin.kategori.index') }}"
          class="inline-flex items-center text-xs md:text-sm text-gray-600 hover:text-gray-800"
        >
          ← Batal &amp; kembali ke daftar
        </a>

        <div class="flex gap-2">
          <a
            href="{{ route('admin.kategori.index') }}"
            class="inline-flex items-center px-4 py-2.5 rounded-lg border border-gray-300 text-xs md:text-sm
                   font-medium text-gray-700 hover:bg-gray-100"
          >
            Batal
          </a>
          <button
            type="submit"
            class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2.5 rounded-lg text-xs md:text-sm font-semibold shadow-sm transition"
          >
            Simpan Perubahan
          </button>
        </div>
      </div>
    </form>

  </div>
</section>
@endsection
