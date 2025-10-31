@extends('layouts.perawat')

@section('title', 'Detail Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10 px-6">
  <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md border border-gray-200 p-8">
    <h1 class="text-2xl font-bold text-[#002080] mb-4">💉 Detail Rekam Medis #{{ $rekamMedis->idrekam_medis }}</h1>

    {{-- Informasi Utama --}}
    <div class="mb-6 text-gray-700">
      <p><b>Pet:</b> {{ $rekamMedis->nama_pet }}</p>
      <p><b>Pemilik:</b> {{ $rekamMedis->nama_pemilik }}</p>
      <p><b>Tanggal:</b> {{ $rekamMedis->created_at }}</p>
    </div>

    {{-- Tindakan Terapi --}}
    <h2 class="text-xl font-semibold text-[#002080] mb-3">💊 Tindakan Terapi</h2>
    <form action="{{ route('perawat.rekam-medis.tindakan.store', $rekamMedis->idrekam_medis) }}" method="POST" class="flex flex-wrap gap-3 items-center mb-5">
      @csrf
      <select name="idkode_tindakan_terapi" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
        <option value="">-- Pilih Kode --</option>
        @foreach($listKode as $kode)
        <option value="{{ $kode->idkode_tindakan_terapi }}">{{ $kode->kode }} - {{ $kode->deskripsi_tindakan_terapi }}</option>
        @endforeach
      </select>
      <input type="text" name="detail" placeholder="Catatan" class="border rounded-lg px-3 py-2 w-64 focus:ring-2 focus:ring-[#002080]/30">
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium">Tambah</button>
    </form>

    {{-- Daftar Tindakan --}}
    @if($detailTindakan->isEmpty())
      <p class="text-gray-500">Belum ada tindakan.</p>
    @else
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm border border-gray-200">
          <thead class="bg-[#002080] text-white">
            <tr>
              <th class="px-3 py-2">Kode</th>
              <th class="px-3 py-2">Deskripsi</th>
              <th class="px-3 py-2">Kategori</th>
              <th class="px-3 py-2">Klinis</th>
              <th class="px-3 py-2">Detail</th>
              <th class="px-3 py-2 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($detailTindakan as $dt)
            <tr class="border-b hover:bg-gray-50 transition">
              <td class="px-3 py-2">{{ $dt->kode }}</td>
              <td class="px-3 py-2">{{ $dt->deskripsi_tindakan_terapi }}</td>
              <td class="px-3 py-2">{{ $dt->nama_kategori }}</td>
              <td class="px-3 py-2">{{ $dt->nama_kategori_klinis }}</td>
              <td class="px-3 py-2">{{ $dt->detail }}</td>
              <td class="px-3 py-2 text-center space-x-2">
                {{-- Update --}}
                <form action="{{ route('perawat.rekam-medis.tindakan.update', $dt->iddetail_rekam_medis) }}" method="POST" class="inline-flex gap-1">
                  @csrf @method('PUT')
                  <select name="idkode_tindakan_terapi" class="border rounded-lg px-2 py-1 text-sm">
                    @foreach($listKode as $kode)
                    <option value="{{ $kode->idkode_tindakan_terapi }}" {{ $kode->idkode_tindakan_terapi == $dt->idkode_tindakan_terapi ? 'selected' : '' }}>
                      {{ $kode->kode }}
                    </option>
                    @endforeach
                  </select>
                  <input type="text" name="detail" value="{{ $dt->detail }}" class="border rounded-lg px-2 py-1 text-sm">
                  <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-xs">Update</button>
                </form>

                {{-- Hapus --}}
                <form action="{{ route('perawat.rekam-medis.tindakan.destroy', $dt->iddetail_rekam_medis) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus tindakan ini?')">
                  @csrf @method('DELETE')
                  <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

    <div class="mt-8">
      <a href="{{ route('perawat.rekam-medis.index') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
        ← Kembali ke Daftar
      </a>
    </div>
  </div>
</section>
@endsection
