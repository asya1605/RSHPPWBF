@extends('layouts.resepsionis')
@section('title', 'Temu Dokter')

@section('content')
<section class="p-8 bg-[#f6f8ff] min-h-[85vh]">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow border border-gray-200">
    <h2 class="text-xl font-bold text-blue-900 mb-4">📅 Daftar Temu Dokter</h2>

    {{-- Filter tanggal --}}
    <form method="get" class="flex flex-wrap items-center gap-3 mb-6">
      <label class="font-medium">Tanggal:</label>
      <input type="date" name="date" value="{{ $selectedDate }}" class="border rounded-lg px-3 py-2">
      <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">Lihat</button>
    </form>

    {{-- Tambah antrian --}}
    <form method="POST" action="{{ route('resepsionis.temu.store') }}" class="flex flex-wrap gap-3 items-center mb-6">
      @csrf
      <select name="idpet" required class="border rounded-lg px-3 py-2">
        <option value="">— Pilih Pet —</option>
        @foreach ($allPets as $p)
          <option value="{{ $p->idpet }}">{{ $p->nama }}</option>
        @endforeach
      </select>
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">+ Tambah Antrian</button>
    </form>

    {{-- Alert --}}
    @if (session('success'))
      <div class="p-3 mb-4 rounded bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
      </div>
    @endif

    {{-- Tabel Antrian --}}
    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-300 text-sm">
        <thead class="bg-blue-100">
          <tr>
            <th class="border p-2">No Urut</th>
            <th class="border p-2">Waktu Daftar</th>
            <th class="border p-2">Nama Pet</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($antrian as $a)
            <tr class="hover:bg-blue-50">
              <td class="border p-2 text-center">{{ $a->no_urut }}</td>
              <td class="border p-2">{{ $a->waktu_daftar }}</td>
              <td class="border p-2">{{ $a->nama_pet }}</td>
              <td class="border p-2 text-center">
                @if($a->status == 0)
                  <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                @elseif($a->status == 1)
                  <span class="px-3 py-1 rounded-full bg-green-100 text-green-800">Selesai</span>
                @else
                  <span class="px-3 py-1 rounded-full bg-red-100 text-red-800">Batal</span>
                @endif
              </td>
              <td class="border p-2 text-center">
                <form method="POST" action="{{ route('resepsionis.temu.update', $a->idreservasi_dokter) }}" class="inline">
                  @csrf @method('PUT')
                  <input type="hidden" name="status" value="1">
                  <button class="text-green-700 hover:underline">Selesai</button>
                </form>
                <form method="POST" action="{{ route('resepsionis.temu.update', $a->idreservasi_dokter) }}" class="inline" onsubmit="return confirm('Batalkan antrian ini?')">
                  @csrf @method('PUT')
                  <input type="hidden" name="status" value="2">
                  <button class="text-red-700 hover:underline ml-2">Batal</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center py-3">Tidak ada antrian hari ini.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
