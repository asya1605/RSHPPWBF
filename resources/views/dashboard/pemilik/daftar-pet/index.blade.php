@extends('layouts.pemilik')
@section('title', 'Daftar Pet Saya')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-lg font-bold text-blue-800 mb-4">🐾 Daftar Hewan Peliharaan</h2>

  @if($pets->isEmpty())
    <p class="text-gray-600">Belum ada data hewan peliharaan.</p>
  @else
    <table class="w-full border border-gray-300 rounded">
      <thead class="bg-blue-100 text-left">
        <tr>
          <th class="p-2 border">ID</th>
          <th class="p-2 border">Nama</th>
          <th class="p-2 border">Jenis</th>
          <th class="p-2 border">Ras</th>
          <th class="p-2 border">Kelamin</th>
          <th class="p-2 border">Tanggal Lahir</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pets as $p)
          <tr class="hover:bg-blue-50">
            <td class="p-2 border">#{{ $p->idpet }}</td>
            <td class="p-2 border">{{ $p->nama }}</td>
            <td class="p-2 border">{{ $p->nama_jenis_hewan }}</td>
            <td class="p-2 border">{{ $p->nama_ras }}</td>
            <td class="p-2 border">{{ $p->jenis_kelamin == 'M' ? 'Jantan' : 'Betina' }}</td>
            <td class="p-2 border">{{ $p->tanggal_lahir ?? '-' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
