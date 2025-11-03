@extends('layouts.pemilik')
@section('title', 'Daftar Rekam Medis')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-lg font-bold text-blue-800 mb-4">📋 Daftar Rekam Medis</h2>

  {{-- Filter --}}
  <form method="get" class="flex flex-wrap items-center gap-4 mb-5">
    <div>
      <label for="idpet" class="text-gray-700 text-sm font-medium">Pilih Hewan</label>
      <select name="idpet" id="idpet" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">
        <option value="">Semua</option>
        @foreach($pets as $p)
          <option value="{{ $p->idpet }}" {{ $petId == $p->idpet ? 'selected' : '' }}>{{ $p->nama }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="tanggal" class="text-gray-700 text-sm font-medium">Tanggal</label>
      <input type="date" id="tanggal" name="tanggal" value="{{ $tanggal }}"
             class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-medium">
      Filter
    </button>
  </form>

  {{-- Tabel Data --}}
  @if($rekamMedis->isEmpty())
    <p class="text-gray-600">Belum ada data rekam medis.</p>
  @else
    <table class="w-full border border-gray-300 rounded">
      <thead class="bg-blue-100 text-left">
        <tr>
          <th class="p-2 border">#</th>
          <th class="p-2 border">Tanggal</th>
          <th class="p-2 border">Pet</th>
          <th class="p-2 border">Diagnosa</th>
          <th class="p-2 border text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rekamMedis as $rm)
          <tr class="hover:bg-blue-50">
            <td class="p-2 border">#{{ $rm->idrekam_medis }}</td>
            <td class="p-2 border">{{ \Carbon\Carbon::parse($rm->created_at)->format('d M Y, H:i') }}</td>
            <td class="p-2 border">{{ $rm->nama_pet }}</td>
            <td class="p-2 border">{{ $rm->diagnosa ?? '-' }}</td>
            <td class="p-2 border text-center">
              <a href="{{ route('pemilik.rekam.show', $rm->idrekam_medis) }}"
                 class="text-blue-700 font-semibold hover:underline">Detail</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
