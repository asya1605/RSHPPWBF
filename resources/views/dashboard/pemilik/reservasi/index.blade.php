@extends('layouts.pemilik')
@section('title', 'Daftar Reservasi')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-lg font-bold text-blue-800">📅 Daftar Reservasi</h2>
    <a href="{{ route('pemilik.reservasi.create') }}"
       class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-medium">
       + Tambah Reservasi
    </a>
  </div>

  @if(session('ok'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
      {{ session('ok') }}
    </div>
  @endif

  @if($reservasi->isEmpty())
    <p class="text-gray-600">Belum ada data reservasi.</p>
  @else
    <table class="w-full border border-gray-300 rounded text-sm">
      <thead class="bg-blue-100 text-left">
        <tr>
          <th class="p-2 border">#</th>
          <th class="p-2 border">Tanggal Reservasi</th>
          <th class="p-2 border">Tanggal Periksa</th>
          <th class="p-2 border">Hewan</th>
          <th class="p-2 border">Dokter</th>
          <th class="p-2 border">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($reservasi as $r)
          <tr class="hover:bg-blue-50 transition">
            <td class="p-2 border text-center">#{{ $r->idreservasi_dokter }}</td>
            <td class="p-2 border">{{ \Carbon\Carbon::parse($r->waktu_daftar)->format('d M Y, H:i') }}</td>
            <td class="p-2 border">{{ $r->tanggal_periksa ?? '-' }}</td>
            <td class="p-2 border">{{ $r->nama_pet }}</td>
            <td class="p-2 border">{{ $r->nama_dokter ?? '-' }}</td>
            <td class="p-2 border text-center">
              @if($r->status == 0)
                <span class="text-yellow-600 font-medium">Menunggu</span>
              @elseif($r->status == 1)
                <span class="text-green-600 font-medium">Selesai</span>
              @else
                <span class="text-red-600 font-medium">Batal</span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
