@extends('layouts.perawat')

@section('title', 'Buat Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-screen bg-[#f5f7ff] py-10 px-6">
  <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-8 border border-gray-200">
    <h1 class="text-2xl font-bold text-[#002080] mb-6">🆕 Buat Rekam Medis Baru</h1>

    <form action="{{ route('perawat.rekam-medis.store') }}" method="POST" class="space-y-5">
      @csrf
      <input type="hidden" name="idreservasi" value="{{ request('idreservasi') }}">
      <input type="hidden" name="idpet" value="{{ request('idpet') }}">

      <div>
        <label class="block font-semibold mb-1">Dokter Pemeriksa</label>
        <select name="iduser_dokter" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
          <option value="">-- Pilih Dokter --</option>
          @foreach($listDokter as $d)
          <option value="{{ $d->iduser }}">{{ $d->nama }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-semibold mb-1">Anamnesa</label>
        <textarea name="anamnesa" rows="3" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30"></textarea>
      </div>

      <div>
        <label class="block font-semibold mb-1">Temuan Klinis</label>
        <textarea name="temuan_klinis" rows="3" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30"></textarea>
      </div>

      <div>
        <label class="block font-semibold mb-1">Diagnosa</label>
        <textarea name="diagnosa" rows="3" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30"></textarea>
      </div>

      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('perawat.rekam-medis.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
          ← Batal
        </a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded-lg font-medium">
          Simpan & Lanjut
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
