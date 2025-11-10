@extends('layouts.admin.main')
@section('title', 'Data Pemilik - RSHP UNAIR')

@section('content')

    {{-- Content --}}
  <div class="max-w-6xl mx-auto py-12 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">👤 Data Pemilik</h1>

    {{-- Flash Message Handling --}}
    @foreach(['success'=>'green','danger'=>'red'] as $type=>$color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center font-medium">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    <div class="flex justify-end mb-5">
      <a href="{{ route('admin.pemilik.create') }}" class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-medium">➕ Tambah Pemilik</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4">No. WA</th>
            <th class="py-3 px-4">Alamat</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @forelse($pemilikList as $p)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4 font-semibold">{{ $p->nama }}</td>
              <td class="py-3 px-4">{{ $p->email }}</td>
              <td class="py-3 px-4">{{ $p->no_wa }}</td>
              <td class="py-3 px-4">{{ $p->alamat }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.pemilik.edit', $p->idpemilik) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium mr-2">✏️ Ubah</a>
                <form action="{{ route('admin.pemilik.destroy', $p->idpemilik) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pemilik ini?')" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-medium">🗑️ Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center py-6 text-gray-500 italic">Belum ada data pemilik.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-5 text-center text-gray-500 text-sm">
      Menampilkan total <span class="font-semibold text-[#002080]">{{ count($pemilikList) }}</span> data pemilik.
    </div>
  </div>
</section>
@endsection
