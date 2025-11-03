@extends('layouts.pemilik')
@section('title', 'Tambah Hewan Peliharaan')

@section('content')
<section class="min-h-[80vh] py-10 px-6 bg-[#f5f7ff]">
  <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl border border-gray-200 p-8">
    <h2 class="text-2xl font-bold text-[#002080] mb-4">🐾 Tambah Hewan Peliharaan</h2>

    <form method="POST" action="{{ route('pemilik.pet.store') }}" class="space-y-5">
      @csrf

      {{-- Nama --}}
      <div>
        <label class="font-semibold text-gray-700">Nama Hewan</label>
        <input type="text" name="nama" value="{{ old('nama') }}"
               class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
        @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Jenis Kelamin --}}
      <div>
        <label class="font-semibold text-gray-700">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
          <option value="">-- Pilih --</option>
          <option value="M">Jantan</option>
          <option value="F">Betina</option>
        </select>
        @error('jenis_kelamin') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Ras Hewan --}}
      <div>
        <label class="font-semibold text-gray-700">Ras Hewan</label>
        <select name="idras_hewan" class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
          <option value="">-- Pilih Ras --</option>
          @foreach($ras as $r)
            <option value="{{ $r->idras_hewan }}">{{ $r->nama_jenis_hewan }} — {{ $r->nama_ras }}</option>
          @endforeach
        </select>
        @error('idras_hewan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Tanggal Lahir --}}
      <div>
        <label class="font-semibold text-gray-700">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
               class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('pemilik.pet.index') }}" class="text-gray-500 hover:underline">← Kembali</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-6 py-2 rounded-lg font-medium">Simpan</button>
      </div>
    </form>
  </div>
</section>
@endsection
