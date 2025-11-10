@extends('layouts.admin.main')
@section('title', 'Edit Kategori Klinis')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Kategori Klinis</h2>

    {{-- Error Validasi --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Pesan Sukses --}}
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-2 rounded mb-3 text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- 🧩 FORM UPDATE --}}
    <form action="{{ route('admin.kategori-klinis.update', $kategori->idkategori_klinis) }}" method="POST">
      @csrf
      @method('PUT') {{-- ⚠️ WAJIB: ubah POST jadi PUT supaya sesuai route resource --}}

      <div class="mb-4">
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Kategori Klinis</label>
        <input type="text" 
               name="nama_kategori_klinis" 
               value="{{ old('nama_kategori_klinis', $kategori->nama_kategori_klinis) }}" 
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" 
               required>
      </div>

      <div class="flex justify-between mt-4">
        <a href="{{ route('admin.kategori-klinis.index') }}" 
           class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" 
                class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
