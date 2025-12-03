@extends('layouts.admin.main')

@section('title', 'Data User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">
  <div class="max-w-6xl mx-auto px-6 mt-10">
    {{-- Header --}}
    <div class="flex flex-wrap gap-3 justify-between items-center mb-6">
      <div>
        <h1 class="text-2xl font-bold text-[#002080]">📋 Data User</h1>
        <p class="text-xs text-gray-500 mt-1">
          Kelola akun user yang memiliki akses ke sistem RSHP UNAIR.
        </p>
      </div>

      <div class="flex flex-wrap gap-2">
        @if($showDeleted)
          <a href="{{ route('admin.data-user.index') }}"
             class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-1.5 rounded-lg text-xs font-medium border border-gray-200">
            ⬅️ <span>Kembali ke Data Aktif</span>
          </a>
        @else
          <a href="{{ route('admin.data-user.index', ['show_deleted' => 1]) }}"
             class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-4 py-1.5 rounded-lg text-xs font-medium border border-red-200">
            🗑️ <span>Lihat Data Terhapus</span>
          </a>
          <a href="{{ route('admin.data-user.create') }}"
             class="inline-flex items-center gap-1 bg-[#002080] hover:bg-[#00185e] text-white px-4 py-1.5 rounded-lg text-xs font-medium shadow-sm">
            ➕ <span>Tambah User</span>
          </a>
        @endif
      </div>
    </div>

    {{-- Alerts --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-50 border border-{{ $color }}-200 text-{{ $color }}-700 px-4 py-2 rounded-lg mb-5 text-sm flex items-center justify-center gap-2">
          <span class="font-semibold">
            {{ $type === 'success' ? 'Berhasil' : 'Perhatian' }}:
          </span>
          <span>{{ session($type) }}</span>
        </div>
      @endif
    @endforeach

    {{-- Search bar --}}
    <div class="mb-6 flex justify-end">
      <input
        type="text"
        id="search"
        placeholder="🔍 Cari nama atau email..."
        class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm
               focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033] transition"
      >
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white shadow-sm rounded-2xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white text-xs uppercase tracking-wide">
          <tr>
            <th class="py-3 px-4 font-semibold text-center">ID</th>
            <th class="py-3 px-4 font-semibold">Nama</th>
            <th class="py-3 px-4 font-semibold">Email</th>
            <th class="py-3 px-4 font-semibold text-center w-56">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100 text-sm">
          @forelse($users as $u)
            <tr class="data-row odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
              <td class="py-3 px-4 text-gray-500 text-center whitespace-nowrap">
                #{{ $u->iduser }}
              </td>
              <td class="py-3 px-4 font-semibold text-gray-800">
                {{ $u->nama }}
              </td>
              <td class="py-3 px-4 text-gray-700">
                {{ $u->email }}
              </td>
              <td class="py-3 px-4">
                <div class="flex items-center justify-center gap-2">
                  @if(!$showDeleted)
                    {{-- Edit --}}
                    <a href="{{ route('admin.data-user.edit', $u->iduser) }}"
                       class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                              bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100">
                      ✏️ Edit
                    </a>

                    {{-- Reset Password --}}
                    <form
                      action="{{ route('admin.data-user.reset', $u->iduser) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Reset password user ini ke 123456?')"
                    >
                      @csrf
                      <button
                        type="submit"
                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                               bg-sky-50 text-sky-700 border border-sky-200 hover:bg-sky-100"
                      >
                        🔁 Reset
                      </button>
                    </form>

                    {{-- Hapus --}}
                    <form
                      action="{{ route('admin.data-user.destroy', $u->iduser) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Yakin ingin menghapus user ini?')"
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
                    {{-- Restore --}}
                    <form
                      action="{{ route('admin.data-user.restore', $u->iduser) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Pulihkan user ini?')"
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
              <td colspan="4" class="text-center py-8 text-gray-500 italic text-sm">
                Belum ada data {{ $showDeleted ? 'user terhapus' : 'user aktif' }} yang dapat ditampilkan.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4 flex justify-between items-center text-xs text-gray-500">
      <p>
        Menampilkan total
        <span class="font-semibold text-[#002080]">{{ count($users) }}</span>
        data {{ $showDeleted ? 'terhapus' : 'aktif' }}.
      </p>
    </div>
  </div>
</section>

{{-- 🔍 Live search --}}
<script>
  document.getElementById('search').addEventListener('keyup', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
</script>
@endsection
