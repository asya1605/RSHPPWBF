@extends('layouts.admin.main')

@section('title', 'Laporan Relasi - RSHP')

@section('content')
<section class="p-8 bg-[#f8fbff] min-h-screen">
  {{-- Header halaman --}}
  <h1 class="text-2xl font-bold text-[#002080] mb-4">
    📊 Laporan Relasi (Raw Query & Query Builder)
  </h1>

  {{-- RAW QUERY --}}
  <div class="bg-white shadow rounded-xl p-6 mb-8">
    <h2 class="text-lg font-semibold text-blue-800 mb-3">🩺 Data Dokter (Raw Query)</h2>
    <table class="w-full border-collapse">
      <thead class="bg-blue-100 text-blue-900">
        <tr>
          <th class="p-2 text-left">Nama</th>
          <th class="p-2 text-left">Email</th>
          <th class="p-2 text-left">Bidang Dokter</th>
          <th class="p-2 text-left">No HP</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rawDokter as $d)
        <tr class="border-b hover:bg-blue-50">
          <td class="p-2">{{ $d->nama_user }}</td>
          <td class="p-2">{{ $d->email }}</td>
          <td class="p-2">{{ $d->bidang_dokter }}</td>
          <td class="p-2">{{ $d->no_hp }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- QUERY BUILDER --}}
  <div class="bg-white shadow rounded-xl p-6">
    <h2 class="text-lg font-semibold text-blue-800 mb-3">💉 Data Perawat (Query Builder)</h2>
    <table class="w-full border-collapse">
      <thead class="bg-blue-100 text-blue-900">
        <tr>
          <th class="p-2 text-left">Nama</th>
          <th class="p-2 text-left">Email</th>
          <th class="p-2 text-left">Pendidikan</th>
          <th class="p-2 text-left">No HP</th>
        </tr>
      </thead>
      <tbody>
        @foreach($queryPerawat as $p)
        <tr class="border-b hover:bg-blue-50">
          <td class="p-2">{{ $p->nama_user }}</td>
          <td class="p-2">{{ $p->email }}</td>
          <td class="p-2">{{ $p->pendidikan }}</td>
          <td class="p-2">{{ $p->no_hp }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  {{-- QUERY BUILDER (Resepsionis) --}}
<div class="bg-white shadow rounded-xl p-6 mt-8">
  <h2 class="text-lg font-semibold text-blue-800 mb-3">📞 Data Resepsionis</h2>
  <table class="w-full border-collapse">
    <thead class="bg-blue-100 text-blue-900">
      <tr>
        <th class="p-2 text-left">Nama</th>
        <th class="p-2 text-left">Email</th>
        <th class="p-2 text-left">No HP</th>
      </tr>
    </thead>
    <tbody>
      @foreach($queryResepsionis as $r)
      <tr class="border-b hover:bg-blue-50">
        <td class="p-2">{{ $r->nama_user }}</td>
        <td class="p-2">{{ $r->email }}</td>
        <td class="p-2">{{ $r->no_hp }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- QUERY BUILDER (Pemilik) --}}
<div class="bg-white shadow rounded-xl p-6 mt-8">
  <h2 class="text-lg font-semibold text-blue-800 mb-3">🐾 Data Pemilik</h2>
  <table class="w-full border-collapse">
    <thead class="bg-blue-100 text-blue-900">
      <tr>
        <th class="p-2 text-left">Nama</th>
        <th class="p-2 text-left">Email</th>
        <th class="p-2 text-left">Alamat</th>
        <th class="p-2 text-left">No HP</th>
      </tr>
    </thead>
    <tbody>
      @foreach($queryPemilik as $p)
      <tr class="border-b hover:bg-blue-50">
        <td class="p-2">{{ $p->nama_user }}</td>
        <td class="p-2">{{ $p->email }}</td>
        <td class="p-2">{{ $p->alamat }}</td>
        <td class="p-2">{{ $p->no_hp }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</section>
@endsection
