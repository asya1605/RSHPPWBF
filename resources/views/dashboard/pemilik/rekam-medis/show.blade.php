@extends('layouts.pemilik')
@section('title', 'Detail Rekam Medis')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-lg font-bold text-blue-800 mb-4">
    📋 Rekam Medis #{{ $header->idrekam_medis }}
  </h2>

  <div class="grid md:grid-cols-2 gap-4 mb-6">
    <div>
      <p><strong>Pet:</strong> {{ $header->nama_pet }}</p>
      <p><strong>Pemilik:</strong> {{ $header->nama_pemilik }}</p>
    </div>
    <div>
      <p><strong>Anamnesa:</strong> {{ $header->anamnesa ?? '-' }}</p>
      <p><strong>Diagnosa:</strong> {{ $header->diagnosa ?? '-' }}</p>
    </div>
  </div>

  <h3 class="text-blue-700 font-semibold mb-2">Daftar Tindakan Terapi</h3>
  @if($detail->isEmpty())
    <p class="text-gray-600">Belum ada tindakan.</p>
  @else
    <table class="w-full border border-gray-300 rounded">
      <thead class="bg-blue-100 text-left">
        <tr>
          <th class="p-2 border">Kode</th>
          <th class="p-2 border">Deskripsi</th>
          <th class="p-2 border">Kategori</th>
          <th class="p-2 border">Klinis</th>
          <th class="p-2 border">Detail</th>
        </tr>
      </thead>
      <tbody>
        @foreach($detail as $d)
          <tr class="hover:bg-blue-50">
            <td class="p-2 border">{{ $d->kode }}</td>
            <td class="p-2 border">{{ $d->deskripsi_tindakan_terapi }}</td>
            <td class="p-2 border">{{ $d->nama_kategori ?? '-' }}</td>
            <td class="p-2 border">{{ $d->nama_kategori_klinis ?? '-' }}</td>
            <td class="p-2 border">{{ $d->detail ?? '-' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif

  <div class="mt-6">
    <a href="{{ route('pemilik.rekam-medis.index') }}" class="text-blue-700 hover:underline">← Kembali</a>
  </div>
</div>
@endsection
