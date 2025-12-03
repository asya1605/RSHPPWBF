@extends('layouts.admin.main')
@section('title', 'Detail Kategori Klinis')

@section('content')
<section class="min-h-[85vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md border border-gray-200 px-7 py-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-3 mb-5 border-b border-gray-100 pb-3">
      <div>
        <h2 class="text-lg font-bold text-[#002080] flex items-center gap-2">
          📋 Detail Kategori Klinis
        </h2>
        <p class="text-xs text-gray-500 mt-1">
          Informasi singkat mengenai kategori klinis yang terdaftar di sistem.
        </p>
      </div>
      <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-[#002080] border border-blue-100">
        ID: #{{ $kategori->idkategori_klinis }}
      </span>
    </div>

    {{-- Detail --}}
    <div class="text-sm text-gray-700 space-y-3">
      <div class="flex justify-between gap-3">
        <span class="text-gray-500">Nama Kategori Klinis</span>
        <span class="font-semibold text-right">{{ $kategori->nama_kategori_klinis }}</span>
      </div>
    </div>

    {{-- Aksi --}}
    <div class="flex justify-between items-center mt-8">
      <a
        href="{{ route('admin.kategori-klinis.index') }}"
        class="inline-flex items-center text-xs md:text-sm text-gray-600 hover:text-gray-800"
      >
        ← Kembali ke daftar
      </a>

      <a
        href="{{ route('admin.kategori-klinis.edit', $kategori->idkategori_klinis) }}"
        class="inline-flex items-center bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2.5 rounded-lg
               text-xs md:text-sm font-semibold shadow-sm transition"
      >
        ✏️ Edit
      </a>
    </div>

  </div>
</section>
@endsection
