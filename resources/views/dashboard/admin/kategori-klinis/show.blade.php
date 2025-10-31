@extends('layouts.admin')
@section('title', 'Detail Kategori Klinis')

@section('content')
<section class="min-h-[85vh] bg-[#f5f7ff] flex justify-center items-center py-10">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    
    <h2 class="text-xl font-bold text-[#002080] mb-6 text-center">📋 Detail Kategori Klinis</h2>

    <div class="text-sm text-gray-700 space-y-3">
      <p><strong>ID Kategori:</strong> {{ $kategori->idkategori_klinis }}</p>
      <p><strong>Nama Kategori Klinis:</strong> {{ $kategori->nama_kategori_klinis }}</p>
    </div>

    <div class="flex justify-between mt-8">
      <a href="{{ route('admin.kategori-klinis.index') }}" 
         class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium">
         ← Kembali
      </a>

      <a href="{{ route('admin.kategori-klinis.edit', $kategori->idkategori_klinis) }}" 
         class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded-lg text-sm font-medium">
         ✏️ Edit
      </a>
    </div>
  </div>
</section>
@endsection
