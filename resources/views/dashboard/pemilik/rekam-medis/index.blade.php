@extends('layouts.pemilik')
@section('title', 'Daftar Rekam Medis')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-lg font-bold text-blue-800 mb-4">📋 Daftar Rekam Medis</h2>

  @if($rekamMedis->isEmpty())
    <p class="text-gray-600">Belum ada data rekam medis.</p>
  @else
    <table class="w-full border border-gray-300 rounded">
      <thead class="bg-blue-100 text-left">
        <tr>
          <th class="p-2 border">ID RM</th>
          <th class="p-2 border">Tanggal</th>
          <th class="p-2 border">Pet</th>
          <th class="p-2 border">Diagnosa</th>
          <th class="p-2 border">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rekamMedis as $rm)
          <tr class="hover:bg-blue-50">
            <td class="p-2 border">#{{ $rm->idrekam_medis }}</td>
            <td class="p-2 border">{{ $rm->created_at }}</td>
            <td class="p-2 border">{{ $rm->nama_pet }}</td>
            <td class="p-2 border">{{ $rm->diagnosa ?? '-' }}</td>
            <td class="p-2 border">
              <a href="{{ route('pemilik.rekam.show', $rm->idrekam_medis) }}" class="text-blue-700 hover:underline">Detail</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
