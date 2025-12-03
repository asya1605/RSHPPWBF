@extends('layouts.admin.main')

@section('title', 'Data Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6">
    {{-- TITLE --}}
    <div class="mb-6 text-center">
      <h1 class="text-2xl font-bold text-[#002080]">📄 Data Rekam Medis</h1>
      <p class="mt-1 text-sm text-gray-500">
        Daftar rekam medis hewan di RSHP UNAIR
      </p>
    </div>

    {{-- FLASH MESSAGES --}}
    @foreach(['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="mb-5 rounded-lg border border-{{ $color }}-300 bg-{{ $color }}-50 px-4 py-3 text-sm text-{{ $color }}-800 text-center font-medium">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- ACTION BAR --}}
    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
      <div class="flex flex-wrap items-center gap-2">
        {{-- Badge status tampilan --}}
        <span class="inline-flex items-center rounded-full border border-gray-200 bg-white px-3 py-1 text-xs font-medium text-gray-600">
          <span class="mr-1.5 h-2 w-2 rounded-full {{ ($showDeleted ?? false) ? 'bg-red-500' : 'bg-emerald-500' }}"></span>
          {{ ($showDeleted ?? false) ? 'Menampilkan data terhapus' : 'Menampilkan data aktif' }}
        </span>

        @if($showDeleted ?? false)
          <a href="{{ route('admin.rekam-medis.index') }}"
             class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 transition">
            ⬅️ Kembali ke Data Aktif
          </a>
        @else
          <a href="{{ route('admin.rekam-medis.index', ['show_deleted' => 1]) }}"
             class="inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-700 hover:bg-red-100 transition">
            🗑️ Lihat Data Terhapus
          </a>
          <a href="{{ route('admin.rekam-medis.create') }}"
             class="inline-flex items-center rounded-lg bg-[#002080] px-4 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-[#00185e] transition">
            ➕ Tambah Rekam Medis
          </a>
        @endif
      </div>

      {{-- Search --}}
      <div class="w-full sm:w-72">
        <div class="relative">
          <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-gray-400 text-sm">
            🔍
          </span>
          <input
            type="text"
            id="search"
            placeholder="Cari hewan, dokter, atau diagnosa..."
            class="w-full rounded-lg border border-gray-300 bg-white py-2 pl-9 pr-3 text-xs sm:text-sm text-gray-700 shadow-sm focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
          >
        </div>
      </div>
    </div>

    {{-- TABLE CARD --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
      <div class="overflow-x-auto">
        <table class="min-w-full table-fixed text-left text-xs sm:text-sm">
          <thead class="bg-[#002080] text-[11px] sm:text-xs font-semibold uppercase tracking-wide text-white">
            <tr>
              <th scope="col" class="px-4 py-3 w-20">ID RM</th>
              <th scope="col" class="px-4 py-3 w-28">Tanggal</th>
              <th scope="col" class="px-4 py-3 w-32">Nama Hewan</th>
              <th scope="col" class="px-4 py-3 w-40">Dokter</th>
              <th scope="col" class="px-4 py-3 w-40">Anamnesa</th>
              <th scope="col" class="px-4 py-3 w-40">Temuan Klinis</th>
              <th scope="col" class="px-4 py-3">Diagnosa</th>
              <th scope="col" class="px-4 py-3 w-[220px] text-center">Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody" class="divide-y divide-gray-100">
            @forelse($data as $item)
              <tr class="data-row align-middle hover:bg-gray-50 transition">
                <td class="px-4 py-3 text-gray-600 whitespace-nowrap">
                  {{ $item->idrekam_medis }}
                </td>
                <td class="px-4 py-3 text-gray-700 whitespace-nowrap">
                  {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}
                </td>
                <td class="px-4 py-3 font-semibold text-gray-800 whitespace-nowrap">
                  {{ $item->pet->nama ?? '-' }}
                </td>
                <td class="px-4 py-3 text-gray-700 whitespace-nowrap">
                  {{ $item->dokter->nama ?? '-' }}
                </td>
                {{-- Anamnesa (singkat + tooltip) --}}
                <td class="px-4 py-3 text-gray-700 max-w-[180px] truncate" title="{{ $item->anamnesa }}">
                  {{ $item->anamnesa ?? '-' }}
                </td>
                {{-- Temuan Klinis (singkat + tooltip) --}}
                <td class="px-4 py-3 text-gray-700 max-w-[180px] truncate" title="{{ $item->temuan_klinis }}">
                  {{ $item->temuan_klinis ?? '-' }}
                </td>
                {{-- Diagnosa --}}
                <td class="px-4 py-3 text-gray-700 max-w-[200px] truncate" title="{{ $item->diagnosa }}">
                  {{ $item->diagnosa ?? '-' }}
                </td>
                <td class="px-4 py-3">
                  <div class="flex flex-wrap items-center justify-center gap-2">
                    @if(method_exists($item, 'trashed') && $item->trashed())
                      {{-- Tombol Pulihkan --}}
                      <form
                        action="{{ route('admin.rekam-medis.restore', $item->idrekam_medis) }}"
                        method="POST"
                        class="inline-block"
                      >
                        @csrf
                        <button
                          type="submit"
                          class="inline-flex items-center rounded-full bg-emerald-500 px-3 py-1 text-[11px] font-medium text-white hover:bg-emerald-600 transition"
                        >
                          ♻️ Pulihkan
                        </button>
                      </form>
                    @else
                      {{-- Tombol Edit --}}
                      <a
                        href="{{ route('admin.rekam-medis.edit', $item->idrekam_medis) }}"
                        class="inline-flex items-center rounded-full bg-amber-400 px-3 py-1 text-[11px] font-medium text-white hover:bg-amber-500 transition"
                      >
                        ✏️ Ubah
                      </a>

                      {{-- Tombol Hapus --}}
                      <form
                        action="{{ route('admin.rekam-medis.destroy', $item->idrekam_medis) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus rekam medis ini?')"
                        class="inline-block"
                      >
                        @csrf
                        @method('DELETE')
                        <button
                          type="submit"
                          class="inline-flex items-center rounded-full bg-red-500 px-3 py-1 text-[11px] font-medium text-white hover:bg-red-600 transition"
                        >
                          🗑️ Hapus
                        </button>
                      </form>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="px-4 py-8 text-center text-sm text-gray-500">
                  <div class="flex flex-col items-center gap-1">
                    <span class="text-2xl">😿</span>
                    <span class="font-medium">
                      Belum ada data {{ $showDeleted ? 'rekam medis terhapus' : 'rekam medis aktif' }}.
                    </span>
                    @if(!($showDeleted ?? false))
                      <span class="text-xs text-gray-400">
                        Klik <span class="font-semibold">“Tambah Rekam Medis”</span> untuk menambahkan data baru.
                      </span>
                    @endif
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    {{-- FOOTER INFO --}}
    <div class="mt-4 text-center text-xs sm:text-sm text-gray-500">
      Menampilkan total
      <span class="font-semibold text-[#002080]">{{ count($data) }}</span>
      rekam medis.
    </div>
  </div>
</section>

{{-- Live Search --}}
<script>
document.getElementById('search').addEventListener('keyup', function () {
  const q = this.value.toLowerCase();
  document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
    row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
});
</script>
@endsection
