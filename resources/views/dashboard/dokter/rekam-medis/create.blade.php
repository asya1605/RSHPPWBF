@extends('layouts.dokter')

@section('title', 'Tambah Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10 px-6">
  <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl border border-gray-200 p-8">

    <h1 class="text-2xl font-bold text-[#002080] mb-4">🩺 Tambah Rekam Medis Baru</h1>
    <p class="text-gray-600 mb-6">Isi data rekam medis pasien secara lengkap.</p>

    {{-- FORM --}}
    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" class="space-y-5">
      @csrf

      {{-- Hewan --}}
      <div>
        <label for="idpet" class="font-medium text-gray-700">Nama Hewan</label>
        <select id="idpet" name="idpet" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-[#002080]/40 focus:ring-2">
          <option value="">-- Pilih Hewan --</option>
          @foreach($pets as $p)
            <option value="{{ $p->idpet }}" {{ old('idpet') == $p->idpet ? 'selected' : '' }}>
              {{ $p->nama_pet }} — {{ $p->nama_pemilik }}
            </option>
          @endforeach
        </select>
        @error('idpet')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Anamnesa --}}
      <div>
        <label class="font-medium text-gray-700">Anamnesa</label>
        <textarea name="anamnesa" class="w-full border rounded-lg p-2 mt-1 focus:ring-[#002080]/40 focus:ring-2">{{ old('anamnesa') }}</textarea>
        @error('anamnesa')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Temuan Klinis --}}
      <div>
        <label class="font-medium text-gray-700">Temuan Klinis</label>
        <textarea name="temuan_klinis" class="w-full border rounded-lg p-2 mt-1 focus:ring-[#002080]/40 focus:ring-2">{{ old('temuan_klinis') }}</textarea>
      </div>

      {{-- Diagnosa --}}
      <div>
        <label class="font-medium text-gray-700">Diagnosa</label>
        <textarea name="diagnosa" class="w-full border rounded-lg p-2 mt-1 focus:ring-[#002080]/40 focus:ring-2">{{ old('diagnosa') }}</textarea>
        @error('diagnosa')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('dokter.rekam-medis.index') }}" class="text-gray-500 hover:underline">← Kembali</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00175a] text-white px-6 py-2 rounded-lg font-medium">Simpan</button>
      </div>
    </form>

  </div>
</section>
@endsection
