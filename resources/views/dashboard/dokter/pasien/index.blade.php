@extends('layouts.dokter')
@section('title', 'Data Pasien - RSHP UNAIR')

@section('content')
<section class="min-h-screen bg-[#f5f7ff] p-8">
  <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">🐾 Data Pasien (Pemilik & Hewan)</h1>

  <div class="bg-white shadow-md rounded-xl overflow-x-auto border border-gray-200">
    <table class="min-w-full text-sm text-left border-collapse">
      <thead class="bg-[#002080] text-white text-xs uppercase">
        <tr>
          <th class="py-3 px-4">ID Pemilik</th>
          <th class="py-3 px-4">Nama Pemilik</th>
          <th class="py-3 px-4">Email</th>
          <th class="py-3 px-4">No. WA</th>
          <th class="py-3 px-4">Alamat</th>
          <th class="py-3 px-4">Nama Hewan</th>
          <th class="py-3 px-4">Jenis Hewan</th>
          <th class="py-3 px-4">Ras Hewan</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @forelse($pasien as $p)
        <tr class="hover:bg-gray-50 transition duration-150">
          <td class="py-3 px-4">{{ $p->idpemilik }}</td>
          <td class="py-3 px-4 font-medium text-gray-900">{{ $p->nama_pemilik }}</td>
          <td class="py-3 px-4 text-gray-700">{{ $p->email }}</td>
          <td class="py-3 px-4">{{ $p->no_wa ?? '-' }}</td>
          <td class="py-3 px-4">{{ $p->alamat ?? '-' }}</td>
          <td class="py-3 px-4">{{ $p->nama_hewan ?? '-' }}</td> {{-- ✅ sudah disesuaikan --}}
          <td class="py-3 px-4">{{ $p->nama_jenis_hewan ?? '-' }}</td>
          <td class="py-3 px-4">{{ $p->nama_ras ?? '-' }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="text-center py-5 text-gray-500 italic">Belum ada data pasien.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection
