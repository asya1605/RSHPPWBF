@extends('layouts.admin.main')

@section('title', 'Data Pet - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  {{-- 🔹 Konten Utama --}}
  <div class="max-w-6xl mx-auto py-12 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">🐾 Data Pet</h1>

    {{-- ✅ Handling Flash Messages --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center font-medium">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- 🔹 Tombol Tambah --}}
    <div class="flex justify-end mb-5">
      <a href="{{ route('admin.pet.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-medium shadow-sm transition">
        ➕ Tambah Pet
      </a>
    </div>

    {{-- 🔹 Tabel Data --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">Nama Pet</th>
            <th class="py-3 px-4">Pemilik</th>
            <th class="py-3 px-4">Ras</th>
            <th class="py-3 px-4">Jenis</th>
            <th class="py-3 px-4">Jenis Kelamin</th>
            <th class="py-3 px-4">Tanggal Lahir</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @forelse($pets as $p)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4 font-semibold">{{ $p->nama }}</td>
              <td class="py-3 px-4">{{ $p->nama_pemilik ?? '-' }}</td>
              <td class="py-3 px-4">{{ $p->nama_ras ?? '-' }}</td>
              <td class="py-3 px-4">{{ $p->nama_jenis_hewan ?? '-' }}</td>
              <td class="py-3 px-4">
                {{ $p->jenis_kelamin === 'M' ? 'Jantan' : 'Betina' }}
              </td>
              <td class="py-3 px-4">
                {{ $p->tanggal_lahir ? \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') : '-' }}
              </td>

              <td class="py-3 px-4 text-center flex justify-center gap-2">
                {{-- Tombol Edit --}}
                <a href="{{ route('admin.pet.edit', $p->idpet) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium transition">
                  ✏️ Ubah
                </a>

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.pet.destroy', $p->idpet) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data pet ini?')" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-medium transition">
                    🗑️ Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center py-6 text-gray-500 italic">
                Belum ada data pet yang terdaftar.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- 🔹 Footer Info --}}
    <div class="mt-5 text-center text-gray-500 text-sm">
      Menampilkan total <span class="font-semibold text-[#002080]">{{ count($pets) }}</span> data pet.
    </div>
  </div>
</section>
@endsection
