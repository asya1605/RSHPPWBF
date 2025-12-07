@extends('layouts.admin.main')

@section('title', 'Data Kategori - RSHP UNAIR')

@section('content')

{{-- PAGE CONTAINER --}}
<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-6xl mx-auto px-6 py-8">
    
    {{-- HEADER SECTION --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        
        {{-- Title & Description --}}
        <div>
          <div class="flex items-center gap-3 mb-3">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Data Kategori</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl">
            Kelola kategori yang digunakan untuk pengelompokan produk, obat, dan layanan di RSHP UNAIR.
          </p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3">
          @if($showDeleted ?? false)
            <a href="{{ route('admin.kategori.index') }}"
               class="btn-secondary">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
              </svg>
              <span>Kembali ke Data Aktif</span>
            </a>
          @else
            <a href="{{ route('admin.kategori.index', ['show_deleted' => 1]) }}"
               class="btn-danger">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
              <span>Lihat Data Terhapus</span>
            </a>
            <a href="{{ route('admin.kategori.create') }}"
               class="btn-primary">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
              </svg>
              <span>Tambah Kategori</span>
            </a>
          @endif
        </div>
      </div>
    </div>

    {{-- ALERTS --}}
    @if(session('success'))
      <div class="alert-success animate-slideDown">
        <div class="flex items-center gap-3">
          <div class="bg-green-600 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div>
            <p class="font-bold">Berhasil!</p>
            <p class="text-sm">{{ session('success') }}</p>
          </div>
        </div>
      </div>
    @endif

    @if(session('danger'))
      <div class="alert-danger animate-slideDown">
        <div class="flex items-center gap-3">
          <div class="bg-red-600 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
          </div>
          <div>
            <p class="font-bold">Perhatian!</p>
            <p class="text-sm">{{ session('danger') }}</p>
          </div>
        </div>
      </div>
    @endif

    {{-- STATISTICS CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 animate-fadeIn delay-100">
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Total Kategori</p>
            <p class="text-3xl font-black text-[#002080]">{{ count($kategoriList) }}</p>
          </div>
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Status Data</p>
            <p class="text-xl font-bold text-gray-800">
              {{ ($showDeleted ?? false) ? 'Terhapus' : 'Aktif' }}
            </p>
          </div>
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Management</p>
            <p class="text-lg font-bold text-gray-800">Kategori Layanan</p>
          </div>
          <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7h18M3 12h18M3 17h18"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- SEARCH SECTION --}}
    <div class="glass rounded-2xl p-6 shadow-xl border border-white mb-8 animate-fadeIn delay-200">
      <div class="flex flex-col md:flex-row gap-4">
        {{-- Search Input --}}
        <div class="flex-1">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </div>
            <input
              type="text"
              id="search"
              placeholder="Cari nama kategori..."
              class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm
                     focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                     transition-all shadow-sm"
            >
          </div>
        </div>
      </div>
    </div>

    {{-- DATA TABLE --}}
    <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white animate-fadeIn delay-300">
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider text-center w-24">
                ID
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Nama Kategori
              </th>
              <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider w-64">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody id="tableBody" class="divide-y divide-gray-100">
            @forelse($kategoriList as $k)
              <tr class="data-row bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  <div class="inline-flex items-center justify-center">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg">
                      <span class="text-sm font-bold text-blue-800">#{{ $k->idkategori }}</span>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-gray-100 to-gray-200 w-10 h-10 rounded-full flex items-center justify-center">
                      <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
                      </svg>
                    </div>
                    <div>
                      <p class="font-bold text-gray-900">{{ $k->nama_kategori }}</p>
                      @if($showDeleted ?? false)
                        <span class="inline-block mt-1 bg-red-100 text-red-700 text-xs px-2 py-0.5 rounded-full font-semibold">
                          TERHAPUS
                        </span>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    @if(!($showDeleted ?? false))
                      {{-- Edit Button --}}
                      <a href="{{ route('admin.kategori.edit', $k->idkategori) }}"
                         class="btn-action-edit"
                         title="Edit Kategori">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit</span>
                      </a>

                      {{-- Delete Button --}}
                      <form action="{{ route('admin.kategori.destroy', $k->idkategori) }}"
                            method="POST"
                            class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn-action-delete"
                                title="Hapus Kategori">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                          </svg>
                          <span>Hapus</span>
                        </button>
                      </form>
                    @else
                      {{-- Restore Button --}}
                      <form action="{{ route('admin.kategori.restore', $k->idkategori) }}"
                            method="POST"
                            class="inline"
                            onsubmit="return confirm('Pulihkan kategori ini?')">
                        @csrf
                        <button type="submit"
                                class="btn-action-restore"
                                title="Pulihkan Kategori">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                          </svg>
                          <span>Pulihkan</span>
                        </button>
                      </form>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="px-6 py-12 text-center">
                  <div class="flex flex-col items-center gap-4">
                    <div class="bg-gray-100 p-6 rounded-full">
                      <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
                      </svg>
                    </div>
                    <div>
                      <p class="text-gray-600 font-semibold text-lg">Belum ada data kategori</p>
                      <p class="text-gray-500 text-sm mt-1">
                        {{ ($showDeleted ?? false) ? 'Tidak ada kategori yang terhapus' : 'Mulai tambahkan kategori baru' }}
                      </p>
                    </div>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Table Footer --}}
      <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
          <p class="text-sm text-gray-600">
            Menampilkan 
            <span class="font-bold text-[#002080]">{{ count($kategoriList) }}</span>
            kategori {{ ($showDeleted ?? false) ? 'terhapus' : 'aktif' }}
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SEARCH FUNCTIONALITY --}}
<script>
  document.getElementById('search').addEventListener('keyup', function () {
    const query = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  });
</script>

{{-- STYLES (kalau sudah global, bagian ini boleh dihapus) --}}
<style>
  .glass {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
  }

  .gradient-text {
    background: linear-gradient(135deg, #002080 0%, #00BFA6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
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

  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
  .delay-300 { animation-delay: 0.3s; }

  .btn-primary {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-[#002080] to-[#0040A0] 
           text-white px-6 py-3 rounded-xl font-bold shadow-lg 
           hover:shadow-xl hover:scale-105 transition-all;
  }

  .btn-secondary {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-3 
           rounded-xl font-bold border-2 border-gray-200 shadow-md
           hover:border-gray-300 hover:shadow-lg hover:scale-105 transition-all;
  }

  .btn-danger {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 
           text-white px-6 py-3 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all;
  }

  .btn-action-edit {
    @apply inline-flex items-center gap-2 bg-gradient-to-br from-amber-50 to-amber-100 
           text-amber-700 px-4 py-2 rounded-lg font-semibold border border-amber-200
           hover:from-amber-100 hover:to-amber-200 hover:shadow-md transition-all;
  }

  .btn-action-delete {
    @apply inline-flex items-center gap-2 bg-gradient-to-br from-red-50 to-red-100 
           text-red-700 px-4 py-2 rounded-lg font-semibold border border-red-200
           hover:from-red-100 hover:to-red-200 hover:shadow-md transition-all;
  }

  .btn-action-restore {
    @apply inline-flex items-center gap-2 bg-gradient-to-br from-emerald-50 to-emerald-100 
           text-emerald-700 px-4 py-2 rounded-lg font-semibold border border-emerald-200
           hover:from-emerald-100 hover:to-emerald-200 hover:shadow-md transition-all;
  }

  .alert-success {
    @apply bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 
           p-6 rounded-xl shadow-lg mb-8;
  }

  .alert-danger {
    @apply bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 
           p-6 rounded-xl shadow-lg mb-8;
  }
</style>

@endsection
