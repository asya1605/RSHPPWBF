@extends('layouts.admin')

@section('title', 'Data Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  {{-- 🔹 Navigasi Atas --}}
  <div class="bg-[#002080] text-white py-3 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center items-center gap-10 font-semibold text-[15px] tracking-wide">
      <a href="{{ route('dashboard.admin') }}" class="hover:text-[#ffd700]">🏠 Home</a>
      <a href="{{ route('dashboard.admin.data') }}" class="hover:text-[#ffd700]">📋 Data Master</a>
      <a href="{{ route('logout') }}" class="hover:text-red-300">🚪 Logout</a>
    </div>
  </div>

  {{-- 🔹 Konten Utama --}}
  <div class="max-w-6xl mx-auto py-12 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">📄 Data Rekam Medis</h1>

    {{-- ✅ Flash Messages (Success & Danger) --}}
    @foreach(['success'=>'green','danger'=>'red'] as $type=>$color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center font-medium">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- 🔹 Tombol Tambah --}}
    <div class="flex justify-end mb-5">
      <a href="{{ route('admin.rekam-medis.create') }}" 
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-medium shadow-sm transition">
        ➕ Tambah Rekam Medis
      </a>
    </div>

    {{-- 🔹 Tabel Data --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">Tanggal</th>
            <th class="py-3 px-4">Nama Hewan</th>
            <th class="py-3 px-4">Pemilik</th>
            <th class="py-3 px-4">Dokter Pemeriksa</th>
            <th class="py-3 px-4">Diagnosa</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($data as $item)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">
                {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}
              </td>
              <td class="py-3 px-4 font-semibold">{{ $item->pet->nama ?? '-' }}</td>
              <td class="py-3 px-4">{{ $item->pet->pemilik->nama ?? '-' }}</td>
              <td class="py-3 px-4">{{ $item->dokter->username ?? '-' }}</td>
              <td class="py-3 px-4">{{ $item->diagnosa ?? '-' }}</td>
              <td class="py-3 px-4 text-center flex justify-center gap-2">
                {{-- Tombol Edit --}}
                <a href="{{ route('admin.rekam-medis.edit', $item->idrekam_medis) }}" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium">
                  ✏️ Ubah
                </a>
                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.rekam-medis.destroy', $item->idrekam_medis) }}" 
                      method="POST" onsubmit="return confirm('Yakin ingin menghapus rekam medis ini?')" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-medium">
                    🗑️ Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-5 text-gray-500 italic">
                Belum ada data rekam medis yang tercatat.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- 🔹 Helper Info --}}
    <div class="mt-5 text-center text-gray-500 text-sm">
      Menampilkan total <span class="font-semibold text-[#002080]">{{ count($data) }}</span> rekam medis.
    </div>
  </div>
</section>
@endsection
