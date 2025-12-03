@extends('layouts.admin.main')
@section('title', 'Data Pemilik - RSHP UNAIR')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6">
  {{-- Header --}}
  <div class="flex flex-wrap gap-3 justify-between items-center mb-6">
    <div>
      <h1 class="text-2xl font-bold text-[#002080]">👤 Data Pemilik</h1>
      <p class="text-xs text-gray-500 mt-1">
        Kelola data pemilik hewan yang terdaftar di RSHP UNAIR.
      </p>
    </div>

    <div class="flex flex-wrap gap-2">
      @if($showDeleted)
        <a href="{{ route('admin.pemilik.index') }}"
           class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-1.5 rounded-lg text-xs font-medium border border-gray-200">
          ⬅️ <span>Kembali ke Data Aktif</span>
        </a>
      @else
        <a href="{{ route('admin.pemilik.index', ['show_deleted' => 1]) }}"
           class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-4 py-1.5 rounded-lg text-xs font-medium border border-red-200">
          🗑️ <span>Lihat Data Terhapus</span>
        </a>
        <a href="{{ route('admin.pemilik.create') }}"
           class="inline-flex items-center gap-1 bg-[#002080] hover:bg-[#00185e] text-white px-4 py-1.5 rounded-lg text-xs font-medium shadow-sm">
          ➕ <span>Tambah Pemilik</span>
        </a>
      @endif
    </div>
  </div>

  {{-- Flash Message --}}
  @foreach(['success' => 'green', 'danger' => 'red'] as $type => $color)
    @if(session($type))
      <div class="bg-{{ $color }}-50 border border-{{ $color }}-200 text-{{ $color }}-700 px-4 py-2 rounded-lg mb-5 text-sm flex items-center justify-center gap-2">
        <span class="font-semibold">
          {{ $type === 'success' ? 'Berhasil' : 'Perhatian' }}:
        </span>
        <span>{{ session($type) }}</span>
      </div>
    @endif
  @endforeach

  {{-- Tabel --}}
  <div class="overflow-x-auto bg-white shadow-sm rounded-2xl border border-gray-200">
    <table class="min-w-full text-sm text-left">
      <thead class="bg-[#002080] text-white text-xs uppercase tracking-wide">
        <tr>
          <th class="py-3 px-4 font-semibold text-center">ID</th>
          <th class="py-3 px-4 font-semibold">Nama</th>
          <th class="py-3 px-4 font-semibold">Email</th>
          <th class="py-3 px-4 font-semibold">No. WA</th>
          <th class="py-3 px-4 font-semibold">Alamat</th>
          <th class="py-3 px-4 font-semibold text-center">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100 text-sm">
        @forelse($pemilikList as $p)
          <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
            {{-- ID Pemilik --}}
            <td class="py-3 px-4 text-gray-500 text-center whitespace-nowrap">
              #{{ $p->idpemilik }}
            </td>

            {{-- Nama --}}
            <td class="py-3 px-4 font-semibold text-gray-800">
              {{ $p->nama }}
            </td>

            {{-- Email --}}
            <td class="py-3 px-4 text-gray-700">
              {{ $p->email }}
            </td>

            {{-- No WA --}}
            <td class="py-3 px-4">
              <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                {{ $p->no_wa ?? '-' }}
              </span>
            </td>

            {{-- Alamat --}}
            <td class="py-3 px-4 text-gray-700 max-w-xs">
              <p class="line-clamp-2 text-xs md:text-sm">
                {{ $p->alamat }}
              </p>
            </td>

            {{-- Aksi --}}
            <td class="py-3 px-4">
              <div class="flex items-center justify-center gap-2">
                @if(!$showDeleted)
                  <a href="{{ route('admin.pemilik.edit', $p->idpemilik) }}"
                     class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                            bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100">
                    ✏️ Ubah
                  </a>

                  <form action="{{ route('admin.pemilik.destroy', $p->idpemilik) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data pemilik ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                                   bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100">
                      🗑️ Hapus
                    </button>
                  </form>
                @else
                  <form action="{{ route('admin.pemilik.restore', $p->idpemilik) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                                   bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100">
                      ♻️ Pulihkan
                    </button>
                  </form>
                @endif
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-8 text-gray-500 italic text-sm">
              Belum ada data {{ $showDeleted ? 'pemilik terhapus' : 'pemilik aktif' }} yang dapat ditampilkan.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Footer info --}}
  <div class="mt-4 flex justify-between items-center text-xs text-gray-500">
    <p>
      Menampilkan total
      <span class="font-semibold text-[#002080]">{{ count($pemilikList) }}</span>
      data {{ $showDeleted ? 'terhapus' : 'aktif' }}.
    </p>
  </div>
</div>
@endsection
