@extends('layouts.admin.main')

@section('title', 'Data Ras Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  <div class="max-w-6xl mx-auto py-12 px-6">

    {{-- Header --}}
    <div class="flex flex-wrap gap-3 justify-between items-center mb-4">
      <div>
        <h1 class="text-2xl font-bold text-[#002080]">🐾 Data Ras Hewan</h1>
        <p class="text-xs text-gray-500 mt-1">
          Kelola daftar ras hewan berdasarkan jenisnya untuk digunakan pada data pet.
        </p>
      </div>

      {{-- ACTION BAR --}}
      <div class="flex flex-wrap gap-2">
        @if($showDeleted)
          <a href="{{ route('admin.ras-hewan.index') }}"
             class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-1.5 rounded-lg text-xs font-medium border border-gray-200">
            ⬅️ <span>Kembali ke Data Aktif</span>
          </a>
        @else
          <a href="{{ route('admin.ras-hewan.index', ['show_deleted' => 1]) }}"
             class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-4 py-1.5 rounded-lg text-xs font-medium border border-red-200">
            🗑️ <span>Lihat Data Terhapus</span>
          </a>
          <a href="{{ route('admin.ras-hewan.create') }}"
             class="inline-flex items-center gap-1 bg-[#002080] hover:bg-[#00185e] text-white px-4 py-1.5 rounded-lg text-xs font-semibold shadow-sm transition">
            ➕ <span>Tambah Ras Hewan</span>
          </a>
        @endif
      </div>
    </div>

    {{-- ALERT --}}
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

    {{-- SEARCH BAR --}}
    <div class="mb-6 flex justify-end">
      <input
        type="text"
        id="search"
        placeholder="🔍 Cari jenis atau ras hewan..."
        class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm
               focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033] transition"
      >
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs tracking-wide">
          <tr>
            <th class="py-3 px-4 text-center w-20">ID Ras</th>
            <th class="py-3 px-4">Jenis Hewan</th>
            <th class="py-3 px-4">Nama Ras</th>
            <th class="py-3 px-4 text-center w-[210px]">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100">
          @php
            $grouped = $rasList->groupBy(fn($r) => $r->jenis->nama_jenis_hewan ?? 'Tanpa Jenis');
          @endphp

          @forelse($grouped as $jenis => $items)
            {{-- Row Judul Group Jenis --}}
            <tr class="group-row bg-[#eef1ff]">
              <td colspan="4" class="py-3 px-4 font-semibold text-[#002080]">
                {{ $jenis }}
              </td>
            </tr>

            {{-- Data Ras per Jenis --}}
            @foreach($items as $r)
              <tr class="data-row odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
                <td class="py-3 px-4 text-gray-500 text-center whitespace-nowrap">
                  #{{ $r->idras_hewan }}
                </td>
                <td class="py-3 px-4 text-gray-700">
                  {{ $r->jenis->nama_jenis_hewan ?? '-' }}
                </td>
                <td class="py-3 px-4 text-gray-800">
                  {{ $r->nama_ras }}
                  @if($showDeleted)
                    <span class="ml-2 bg-gray-100 text-gray-700 text-[11px] px-2 py-0.5 rounded-full border border-gray-200">
                      TERHAPUS
                    </span>
                  @endif
                </td>
                <td class="py-3 px-4">
                  <div class="flex items-center justify-center gap-2">
                    @if(!$showDeleted)
                      {{-- Edit --}}
                      <a
                        href="{{ route('admin.ras-hewan.edit', $r->idras_hewan) }}"
                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                               bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100"
                      >
                        ✏️ Edit
                      </a>

                      {{-- Hapus --}}
                      <form
                        action="{{ route('admin.ras-hewan.destroy', $r->idras_hewan) }}"
                        method="POST"
                        class="inline"
                        onsubmit="return confirm('Yakin ingin menghapus ras ini?')"
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
                        action="{{ route('admin.ras-hewan.restore', $r->idras_hewan) }}"
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
            @endforeach
          @empty
            <tr>
              <td colspan="4" class="text-center py-6 text-gray-500 italic text-sm">
                Belum ada data {{ $showDeleted ? 'ras hewan terhapus' : 'ras hewan aktif' }}.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- LIVE SEARCH SCRIPT --}}
<script>
  document.getElementById('search').addEventListener('keyup', function () {
    const q = this.value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr.data-row');
    const groups = document.querySelectorAll('#tableBody tr.group-row');

    // Filter baris data
    rows.forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });

    // Tampilkan/hide header group berdasarkan ada tidaknya row anak yang muncul
    groups.forEach(group => {
      const relatedRows = [];
      let next = group.nextElementSibling;
      while (next && !next.classList.contains('group-row')) {
        relatedRows.push(next);
        next = next.nextElementSibling;
      }
      const hasVisible = relatedRows.some(r => r.style.display !== 'none');
      group.style.display = hasVisible ? '' : 'none';
    });
  });
</script>
@endsection
