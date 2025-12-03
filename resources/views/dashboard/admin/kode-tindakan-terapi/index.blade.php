@extends('layouts.admin.main')

@section('title', 'Data Kode Tindakan Terapi - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  <div class="max-w-6xl mx-auto py-12 px-6">

    {{-- Header --}}
    <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
      <div>
        <h1 class="text-2xl font-bold text-[#002080]">
          🩺 Data Kode Tindakan Terapi
        </h1>
        <p class="text-xs text-gray-500 mt-1">
          Daftar kode tindakan terapi beserta kategori dan kategori klinis terkait.
        </p>
      </div>

      {{-- 🔹 ACTION BAR --}}
      <div class="flex flex-wrap gap-2">
        @php $isDeletedView = request()->has('show_deleted'); @endphp

        @if($isDeletedView)
          <a
            href="{{ route('admin.kode-tindakan-terapi.index') }}"
            class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-1.5
                   rounded-lg text-xs font-medium border border-gray-200"
          >
            ⬅️ <span>Kembali ke Data Aktif</span>
          </a>
        @else
          <a
            href="{{ route('admin.kode-tindakan-terapi.index', ['show_deleted' => 1]) }}"
            class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-4 py-1.5
                   rounded-lg text-xs font-medium border border-red-200"
          >
            🗑️ <span>Lihat Data Terhapus</span>
          </a>
          <a
            href="{{ route('admin.kode-tindakan-terapi.create') }}"
            class="inline-flex items-center gap-1 bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2
                   rounded-lg text-xs font-semibold shadow-sm transition"
          >
            ➕ <span>Tambah Kode Tindakan</span>
          </a>
        @endif
      </div>
    </div>

    {{-- ✅ Flash Message --}}
    @foreach (['success' => 'green', 'danger' => 'red', 'error' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-50 border border-{{ $color }}-200 text-{{ $color }}-700 px-4 py-2 rounded-lg mb-4 text-sm flex items-center justify-center gap-2">
          <span class="font-semibold">
            {{ $type === 'success' ? 'Berhasil' : 'Perhatian' }}:
          </span>
          <span>{{ session($type) }}</span>
        </div>
      @endif
    @endforeach

    {{-- 🔍 Live search --}}
    <div class="mb-6 flex justify-end">
      <input
        type="text"
        id="search"
        placeholder="🔍 Cari kode atau deskripsi tindakan..."
        class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm
               focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033] transition"
      >
    </div>

    {{-- 🔹 Tabel Data --}}
    <div class="overflow-x-auto bg-white shadow-sm rounded-2xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs tracking-wide">
          <tr>
            <th class="py-3 px-4 w-24">Kode</th>
            <th class="py-3 px-4">Deskripsi Tindakan</th>
            <th class="py-3 px-4 w-40">Kategori</th>
            <th class="py-3 px-4 w-48">Kategori Klinis</th>
            <th class="py-3 px-4 text-center w-[220px]">Aksi</th>
          </tr>
        </thead>

        <tbody id="tableBody" class="divide-y divide-gray-100">
          @forelse($data as $item)
            <tr class="data-row odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
              <td class="py-3 px-4 font-semibold text-gray-800 whitespace-nowrap">
                {{ $item->kode }}
              </td>
              <td class="py-3 px-4 text-gray-700">
                {{ $item->deskripsi_tindakan_terapi }}
              </td>
              <td class="py-3 px-4 text-gray-700">
                {{ $item->kategori->nama_kategori ?? '-' }}
              </td>
              <td class="py-3 px-4 text-gray-700">
                {{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}
              </td>

              <td class="py-3 px-4">
                <div class="flex justify-center items-center gap-2">
                  @if(method_exists($item, 'trashed') && $item->trashed())
                    {{-- ♻️ Tombol Restore --}}
                    <form
                      action="{{ route('admin.kode-tindakan-terapi.restore', $item->idkode_tindakan_terapi) }}"
                      method="POST"
                      class="inline-block"
                    >
                      @csrf
                      <button
                        type="submit"
                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                               bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 shadow-sm"
                      >
                        ♻️ Pulihkan
                      </button>
                    </form>
                  @else
                    {{-- ✏️ Ubah --}}
                    <a
                      href="{{ route('admin.kode-tindakan-terapi.edit', $item->idkode_tindakan_terapi) }}"
                      class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                             bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 shadow-sm"
                    >
                      ✏️ Ubah
                    </a>

                    {{-- 🗑️ Hapus --}}
                    <form
                      action="{{ route('admin.kode-tindakan-terapi.destroy', $item->idkode_tindakan_terapi) }}"
                      method="POST"
                      class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                    >
                      @csrf
                      @method('DELETE')
                      <button
                        type="submit"
                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                               bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100 shadow-sm"
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
              <td colspan="5" class="text-center py-6 text-gray-500 italic text-sm">
                Belum ada data
                {{ $isDeletedView ? 'kode tindakan terapi terhapus' : 'kode tindakan terapi yang terdaftar' }}.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- 🔹 Info Data --}}
    <div class="mt-5 text-center text-gray-500 text-sm">
      Menampilkan total
      <span class="font-semibold text-[#002080]">{{ count($data) }}</span>
      data kode tindakan terapi.
    </div>
  </div>
</section>

{{-- 🔍 Live Search --}}
<script>
  document.getElementById('search').addEventListener('keyup', function() {
    const query = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
    });
  });
</script>
@endsection
