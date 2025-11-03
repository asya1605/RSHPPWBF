@extends('layouts.pemilik')
@section('title', 'Buat Reservasi Dokter')

@section('content')
<section class="min-h-[80vh] py-10 px-6 bg-[#f5f7ff]">
  <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl border border-gray-200 p-8">
    <h2 class="text-2xl font-bold text-[#002080] mb-4">📅 Buat Reservasi Dokter</h2>

    <form method="POST" action="{{ route('pemilik.reservasi.store') }}" class="space-y-5">
      @csrf

      {{-- Pet --}}
      <div>
        <label class="font-semibold text-gray-700">Pilih Hewan</label>
        <select name="idpet" class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
          <option value="">-- Pilih Hewan --</option>
          @foreach($pets as $p)
            <option value="{{ $p->idpet }}">{{ $p->nama }}</option>
          @endforeach
        </select>
        @error('idpet') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Dokter --}}
      <div>
        <label class="font-semibold text-gray-700">Pilih Dokter</label>
        <select name="iddokter" class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
          <option value="">-- Pilih Dokter --</option>
          @foreach($dokter as $d)
            <option value="{{ $d->iduser }}">{{ $d->nama }}</option>
          @endforeach
        </select>
        @error('iddokter') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Tanggal Pemeriksaan --}}
      <div>
        <label class="font-semibold text-gray-700">Tanggal Pemeriksaan</label>
        <input type="date" name="tanggal_periksa" value="{{ old('tanggal_periksa') }}"
               class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
        @error('tanggal_periksa') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Keluhan (opsional) --}}
      <div>
        <label class="font-semibold text-gray-700">Keluhan</label>
        <textarea name="keluhan" rows="3"
          class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40"
          placeholder="Tuliskan keluhan hewan Anda (opsional)...">{{ old('keluhan') }}</textarea>
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('pemilik.reservasi.index') }}" class="text-gray-500 hover:underline">← Kembali</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-6 py-2 rounded-lg font-medium">Simpan Reservasi</button>
      </div>
    </form>
  </div>
</section>
@endsection
