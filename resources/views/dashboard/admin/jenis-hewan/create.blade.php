@extends('layouts.admin')

@section('title', 'Tambah Jenis Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">Tambah Jenis Hewan</h2>

    {{-- Pesan error validasi --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form Tambah Jenis Hewan --}}
    <form method="POST" action="{{ route('admin.jenis-hewan.store') }}" class="space-y-4">
      @csrf

      <div>
        <label for="nama_jenis_hewan" class="block text-sm font-medium text-gray-700 mb-1">
          Nama Jenis Hewan
        </label>
        <input id="nama_jenis_hewan" type="text" name="nama_jenis_hewan"
               value="{{ old('nama_jenis_hewan') }}"
               placeholder="contoh: Kucing / Anjing / Kelinci"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#002080]/40"
               required>
        @error('nama_jenis_hewan')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-between items-center pt-2">
        <a href="{{ route('admin.jenis-hewan.index') }}"
           class="text-gray-600 hover:text-gray-800 text-sm flex items-center gap-1">
          ← Kembali
        </a>
        <button type="submit"
                class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
