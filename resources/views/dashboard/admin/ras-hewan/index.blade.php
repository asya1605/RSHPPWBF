@extends('layouts.admin')

@section('title', 'Data Ras Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  {{-- NAVBAR --}}
  <div class="bg-[#002080] text-white py-3 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center items-center gap-10 font-semibold text-[15px] tracking-wide">
      <a href="{{ route('dashboard.admin') }}" class="hover:text-[#ffd700] transition">🏠 Home</a>
      <a href="{{ route('dashboard.admin.data') }}" class="hover:text-[#ffd700] transition">📋 Data Master</a>
      <a href="{{ route('logout') }}" class="hover:text-red-300 transition">🚪 Logout</a>
    </div>
  </div>

  <div class="max-w-6xl mx-auto py-12 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">🐾 Data Ras Hewan</h1>

    {{-- ALERT --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- ACTION BAR --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
      <a href="{{ route('admin.ras-hewan.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-semibold transition">
        ➕ Tambah Ras Hewan
      </a>

      <input type="text" id="search" placeholder="🔍 Cari jenis atau ras hewan..."
             class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-[#002080]/30 transition">
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">Jenis Hewan</th>
            <th class="py-3 px-4">Nama Ras</th>
            <th class="py-3 px-4 text-center w-[200px]">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100">
          @php $grouped = $rasList->groupBy('nama_jenis_hewan'); @endphp

          @forelse($grouped as $jenis => $items)
            <tr class="bg-[#eef1ff] group-row">
              <td colspan="3" class="py-3 px-4 font-semibold text-[#002080]">{{ $jenis }}</td>
            </tr>
            @foreach($items as $r)
              <tr class="hover:bg-gray-50 transition data-row">
                <td class="py-3 px-4">{{ $r->nama_jenis_hewan }}</td>
                <td class="py-3 px-4">{{ $r->nama_ras }}</td>
                <td class="py-3 px-4 text-center">
                  <a href="{{ route('admin.ras-hewan.edit', $r->idras_hewan) }}"
                     class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">✏️ Edit</a>
                  <form action="{{ route('admin.ras-hewan.destroy', $r->idras_hewan) }}"
                        method="POST" class="inline"
                        onsubmit="return confirm('Yakin ingin menghapus ras ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                      🗑️ Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @empty
            <tr>
              <td colspan="3" class="text-center py-6 text-gray-500 italic">
                Belum ada data ras hewan.
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
  document.getElementById('search').addEventListener('keyup', function() {
    const q = this.value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr.data-row');
    const groups = document.querySelectorAll('#tableBody tr.group-row');

    rows.forEach(row => {
      const visible = row.textContent.toLowerCase().includes(q);
      row.style.display = visible ? '' : 'none';
    });

    // sembunyikan judul grup kalau semua anaknya disembunyikan
    groups.forEach(group => {
      const nextRows = [];
      let next = group.nextElementSibling;
      while (next && !next.classList.contains('group-row')) {
        nextRows.push(next);
        next = next.nextElementSibling;
      }
      const visibleChild = nextRows.some(r => r.style.display !== 'none');
      group.style.display = visibleChild ? '' : 'none';
    });
  });
</script>
@endsection
