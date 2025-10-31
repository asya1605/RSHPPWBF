@extends('layouts.pemilik')
@section('title', 'Daftar Reservasi')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-lg font-bold text-blue-800 mb-4">📅 Daftar Reservasi</h2>

  @if($reservasi->isEmpty())
    <p class="text-gray-600">Belum ada data reservasi.</p>
  @else
    <table class="w-full border border-gray-300 rounded">
      <thead class="bg-blue-100 text-left">
        <tr>
          <th class="p-2 border">#</th>
          <th class="p-2 border">Waktu Daftar</th>
          <th class="p-2 border">Pet</th>
          <th class="p-2 border">Dokter</th>
          <th class="p-2 border">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($reservasi as $r)
          <tr class="hover:bg-blue-50">
            <td class="p-2 border">#{{ $r->idreservasi_dokter }} ({{ $r->no_urut }})</td>
            <td class="p-2 border">{{ $r->waktu_daftar }}</td>
            <td class="p-2 border">{{ $r->nama_pet }}</td>
            <td class="p-2 border">{{ $r->nama_dokter ?? '-' }}</td>
            <td class="p-2 border">
              @if($r->status == '0') <span class="text-yellow-600">Menunggu</span>
              @elseif($r->status == '1') <span class="text-green-600">Selesai</span>
              @else <span class="text-red-600">Batal</span> @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
