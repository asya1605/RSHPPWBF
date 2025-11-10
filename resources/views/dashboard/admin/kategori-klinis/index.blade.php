@extends('layouts.admin.main')
@section('title', 'Data Kategori Klinis')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">
  {{-- CONTENT --}}
  <div class="max-w-5xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">🩺 Data Kategori Klinis</h1>

    {{-- Flash Message --}}
    @foreach(['success'=>'green','danger'=>'red'] as $type=>$color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- Tombol Tambah --}}
    <div class="flex justify-end mb-5">
      <a href="{{ route('admin.kategori-klinis.create') }}" 
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
         ➕ Tambah Kategori Klinis
      </a>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Nama Kategori Klinis</th>
            <th class="py-3 px-4 text-center w-[200px]">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($kategoriList as $k)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4 font-medium text-gray-700">{{ $k->idkategori_klinis }}</td>
              <td class="py-3 px-4">{{ $k->nama_kategori_klinis }}</td>
              <td class="py-3 px-4 text-center space-x-2">
                <a href="{{ route('admin.kategori-klinis.show', $k->idkategori_klinis) }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs shadow-sm">👁️ Detail</a>

                <a href="{{ route('admin.kategori-klinis.edit', $k->idkategori_klinis) }}" 
                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs shadow-sm">✏️ Edit</a>

                <form action="{{ route('admin.kategori-klinis.destroy', $k->idkategori_klinis) }}" 
                      method="POST" class="inline"
                      onsubmit="return confirm('Yakin ingin menghapus kategori klinis ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs shadow-sm">
                    🗑️ Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center py-6 text-gray-500 italic">
                Belum ada data kategori klinis.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
