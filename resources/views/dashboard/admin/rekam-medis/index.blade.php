@extends('layouts.admin.main')

@section('title', 'Data Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 px-4 py-10 flex justify-center items-start">
  <div class="w-full max-w-6xl">

{{-- BREADCRUMB --}}
<div class="mb-6 animate-slideDown">
  <div class="flex items-center gap-2 text-sm text-gray-600">
    <a href="{{ url('/admin') }}" class="hover:text-[#002080] transition-colors">
      <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0L12 3l7 7m-9 2v6m4-6v6m-9 8h14a2 2 0 002-2V9.414a2 2 0 00-.586-1.414l-7-7A2 2 0 0010.586 1h-.172a2 2 0 00-1.414.586l-7 7A2 2 0 001 9.414V20a2 2 0 002 2z"/>
      </svg>
      Dashboard
    </a>
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-[#002080] font-semibold">Data Rekam Medis</span>
  </div>
</div>


    {{-- MAIN CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">

      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-amber-500 to-amber-600 p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div class="flex items-center gap-4">
            <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2z"/>
              </svg>
            </div>
            <div>
              <h1 class="text-2xl font-black text-white">Data Rekam Medis</h1>
              <p class="mt-1 text-sm text-amber-100">
                Daftar rekam medis hewan yang tercatat di RSHP UNAIR.
              </p>
            </div>
          </div>

          {{-- ACTION BAR (kanan atas) --}}
          <div class="flex flex-wrap gap-2 justify-end">
            {{-- Badge status tampilan --}}
            <span class="inline-flex items-center rounded-full bg-white/15 px-3 py-1 text-[11px] font-medium text-amber-50 border border-white/30">
              <span class="mr-1.5 h-2 w-2 rounded-full {{ ($showDeleted ?? false) ? 'bg-red-400' : 'bg-emerald-300' }}"></span>
              {{ ($showDeleted ?? false) ? 'Menampilkan data terhapus' : 'Menampilkan data aktif' }}
            </span>

            @if($showDeleted ?? false)
              <a href="{{ route('admin.rekam-medis.index') }}"
                 class="inline-flex items-center gap-1 rounded-lg bg-white/10 px-3 py-1.5 text-[11px] sm:text-xs font-semibold text-white border border-white/40 hover:bg-white/20 transition">
                ⬅️ <span>Kembali ke Data Aktif</span>
              </a>
            @else
              <a href="{{ route('admin.rekam-medis.index', ['show_deleted' => 1]) }}"
                 class="inline-flex items-center gap-1 rounded-lg bg-red-50/90 px-3 py-1.5 text-[11px] sm:text-xs font-semibold text-red-800 border border-red-200 hover:bg-red-100 transition">
                🗑️ <span>Lihat Data Terhapus</span>
              </a>
              <a href="{{ route('admin.rekam-medis.create') }}"
                 class="inline-flex items-center gap-1 rounded-lg bg-white px-3 py-1.5 text-[11px] sm:text-xs font-semibold text-amber-700 shadow-md hover:bg-amber-50 transition">
                ➕ <span>Tambah Rekam Medis</span>
              </a>
            @endif
          </div>
        </div>

        {{-- Search --}}
        <div class="mt-4 flex justify-end">
          <div class="w-full sm:w-80">
            <div class="relative">
              <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-amber-100 text-sm">
                🔍
              </span>
              <input
                type="text"
                id="search"
                placeholder="Cari hewan, dokter, atau diagnosa..."
                class="w-full rounded-xl border border-white/30 bg-white/15 py-2.5 pl-9 pr-3 text-xs sm:text-sm text-white placeholder:text-amber-100/70 shadow-sm focus:border-white focus:outline-none focus:ring-2 focus:ring-white/40 transition"
              >
            </div>
          </div>
        </div>
      </div>

      {{-- BODY: FLASH + TABLE --}}
      <div class="p-4 sm:p-6">

        {{-- FLASH MESSAGES --}}
        @foreach(['success' => 'green', 'danger' => 'red'] as $type => $color)
          @if(session($type))
            <div class="mb-4 alert-{{ $type === 'success' ? 'success' : 'danger' }} animate-slideDown">
              <div class="flex items-center gap-3">
                <div class="{{ $type === 'success' ? 'bg-emerald-600' : 'bg-red-600' }} p-2 rounded-lg">
                  <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div>
                  <p class="font-bold">
                    {{ $type === 'success' ? 'Berhasil!' : 'Perhatian!' }}
                  </p>
                  <p class="text-sm">{{ session($type) }}</p>
                </div>
              </div>
            </div>
          @endif
        @endforeach

        {{-- TABLE --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
          <div class="overflow-x-auto">
            <table class="min-w-full table-fixed text-left text-xs sm:text-sm">
              <thead class="bg-[#002080] text-[11px] sm:text-xs font-semibold uppercase tracking-wide text-white">
                <tr>
                  <th class="px-4 py-3 w-20">ID RM</th>
                  <th class="px-4 py-3 w-28">Tanggal</th>
                  <th class="px-4 py-3 w-32">Nama Hewan</th>
                  <th class="px-4 py-3 w-40">Dokter</th>
                  <th class="px-4 py-3 w-40">Anamnesa</th>
                  <th class="px-4 py-3 w-40">Temuan Klinis</th>
                  <th class="px-4 py-3">Diagnosa</th>
                  <th class="px-4 py-3 w-[220px] text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="tableBody" class="divide-y divide-gray-100">
                @forelse($data as $item)
                  <tr class="data-row align-middle odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition">
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">
                      {{ $item->idrekam_medis }}
                    </td>
                    <td class="px-4 py-3 text-gray-700 whitespace-nowrap">
                      {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}
                    </td>
                    <td class="px-4 py-3 font-semibold text-gray-800 whitespace-nowrap">
                      {{ optional($item->pet)->nama ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-gray-700 whitespace-nowrap">
                      {{ optional($item->dokter)->nama ?? '-' }}
                    </td>
                    {{-- Anamnesa (singkat + tooltip) --}}
                    <td class="px-4 py-3 text-gray-700 max-w-[180px] truncate" title="{{ $item->anamnesa }}">
                      {{ $item->anamnesa ?? '-' }}
                    </td>
                    {{-- Temuan Klinis --}}
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
                          {{-- Pulihkan --}}
                          <form
                            action="{{ route('admin.rekam-medis.restore', $item->idrekam_medis) }}"
                            method="POST"
                            class="inline-block"
                          >
                            @csrf
                            <button
                              type="submit"
                              class="inline-flex items-center gap-1 rounded-full bg-emerald-500 px-3 py-1 text-[11px] font-medium text-white hover:bg-emerald-600 transition"
                            >
                              ♻️ Pulihkan
                            </button>
                          </form>
                        @else
                          {{-- Edit --}}
                          <a
                            href="{{ route('admin.rekam-medis.edit', $item->idrekam_medis) }}"
                            class="inline-flex items-center gap-1 rounded-full bg-amber-400 px-3 py-1 text-[11px] font-medium text-white hover:bg-amber-500 transition"
                          >
                            ✏️ Ubah
                          </a>

                          {{-- Hapus --}}
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
                              class="inline-flex items-center gap-1 rounded-full bg-red-500 px-3 py-1 text-[11px] font-medium text-white hover:bg-red-600 transition"
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

{{-- STYLES (ikut pola Data User) --}}
<style>
  .glass {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(10px);
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-slideDown { animation: slideDown 0.5s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .alert-success {
    @apply bg-gradient-to-r from-emerald-50 to-emerald-100 border-l-4 border-emerald-500 p-4 rounded-xl shadow-md;
  }

  .alert-danger {
    @apply bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 p-4 rounded-xl shadow-md;
  }
</style>
@endsection
