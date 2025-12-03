@extends('layouts.admin.main')

@section('title', 'Data Jenis Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">
  <div class="max-w-6xl mx-auto px-6 mt-10">

    {{-- Header --}}
    <div class="flex flex-wrap gap-3 justify-between items-center mb-4">
      <div>
        <h1 class="text-2xl font-bold text-[#002080]">🐾 Data Jenis Hewan</h1>
        <p class="text-xs text-gray-500 mt-1">
          Kelola daftar jenis hewan yang digunakan pada data ras dan pet di RSHP UNAIR.
        </p>
      </div>

      {{-- Action Buttons --}}
      <div class="flex flex-wrap gap-2">
        @if($showDeleted)
          <a href="{{ route('admin.jenis-hewan.index') }}"
             class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-1.5 rounded-lg text-xs font-medium border border-gray-200">
            ⬅️ <span>Kembali ke Data Aktif</span>
          </a>
        @else
          <a href="{{ route('admin.jenis-hewan.index', ['show_deleted' => 1]) }}"
             class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-4 py-1.5 rounded-lg text-xs font-medium border border-red-200">
            🗑️ <span>Lihat Data Terhapus</span>
          </a>
          <a href="{{ route('admin.jenis-hewan.create') }}"
             class="inline-flex items-center gap-1 bg-[#002080] hover:bg-[#00185e] text-white px-4 py-1.5 rounded-lg shadow-sm text-xs font-medium">
            ➕ <span>Tambah Jenis</span>
          </a>
        @endif
      </div>
    </div>

    {{-- Flash Message --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-50 border border-{{ $color }}-200 text-{{ $color }}-700 px-4 py-2 rounded-lg mb-4 text-sm flex items-center justify-center gap-2">
          <span class="font-semibold">
            {{ $type === 'success' ? 'Berhasil' : 'Perhatian' }}:
          </span>
          <span>{{ session($type) }}</span>
        </div>
      @endif
    @endforeach

    {{-- Search Bar --}}
    <div class="mb-6 flex justify-end">
      <input
        type="text"
        id="search"
        placeholder="🔍 Cari jenis hewan..."
        class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm
               focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033] transition"
      >
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs tracking-wide">
          <tr>
            <th class="py-3 px-4 text-center">ID</th>
            <th class="py-3 px-4">Nama Jenis Hewan</th>
            <th class="py-3 px-4 text-center w-52">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100">
          @forelse($list as $j)
            <tr class="data-row odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
              <td class="py-3 px-4 font-medium text-gray-600 text-center whitespace-nowrap">
                #{{ $j->idjenis_hewan }}
              </td>
              <td class="py-3 px-4 text-gray-800">
                {{ $j->nama_jenis_hewan }}
                @if($showDeleted)
                  <span class="ml-2 bg-gray-100 text-gray-700 text-[11px] px-2 py-0.5 rounded-full border border-gray-200">
                    TERHAPUS
                  </span>
                @endif
              </td>
              <td class="py-3 px-4">
                <div class="flex items-center justify-center gap-2">
                  @if(!$showDeleted)
                    {{-- Ubah --}}
                    <a
                      href="{{ route('admin.jenis-hewan.edit', $j->idjenis_hewan) }}"
                      class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                             bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100"
                    >
                      ✏️ Ubah
                    </a>

                    {{-- Hapus --}}
                    <form
                      action="{{ route('admin.jenis-hewan.destroy', $j->idjenis_hewan) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus jenis ini?')"
                      class="inline"
                    >
                      @csrf
                      @method('DELETE')
                      <button
                        type="submit"
                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                               bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100"
                      >
                        🗑️ Hapus
                      </button>
                    </form>
                  @else
                    {{-- Pulihkan --}}
                    <form
                      action="{{ route('admin.jenis-hewan.restore', $j->idjenis_hewan) }}"
                      method="POST"
                      class="inline"
                    >
                      @csrf
                      <button
                        type="submit"
                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                               bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100"
                      >
                        ♻️ Pulihkan
                      </button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center py-6 text-gray-500 italic text-sm">
                Belum ada data {{ $showDeleted ? 'jenis hewan terhapus' : 'jenis hewan aktif' }}.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  document.getElementById('search').addEventListener('keyup', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
</script>
@endsection
