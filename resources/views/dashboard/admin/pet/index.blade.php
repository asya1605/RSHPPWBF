@extends('layouts.admin.main')

@section('title', 'Data Pet - RSHP UNAIR')

@section('content')

{{-- PAGE CONTAINER --}}
<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-7xl mx-auto px-6 py-8">
    
    {{-- HEADER SECTION --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        
        {{-- Title & Description --}}
        <div>
          <div class="flex items-center gap-3 mb-3">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0zM9 7a3 3 0 116 0" />
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Data Pet</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl">
            Kelola data hewan pasien yang terdaftar di RSHP UNAIR. Data pet terhubung dengan pemilik,
            ras, dan jenis hewan untuk memudahkan pengelolaan pelayanan klinik.
          </p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3">
          @if($showDeleted)
            <a href="{{ route('admin.pet.index') }}"
               class="btn-secondary">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
              </svg>
              <span>Kembali ke Data Aktif</span>
            </a>
          @else
            <a href="{{ route('admin.pet.index', ['show_deleted' => 1]) }}"
               class="btn-danger">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
              <span>Lihat Data Terhapus</span>
            </a>
            <a href="{{ route('admin.pet.create') }}"
               class="btn-primary">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
              </svg>
              <span>Tambah Pet</span>
            </a>
          @endif
        </div>
      </div>
    </div>

    {{-- FLASH MESSAGE --}}
    @foreach(['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="{{ $type === 'success' ? 'alert-success' : 'alert-danger' }} animate-slideDown mb-6">
          <div class="flex items-center gap-3">
            <div class="{{ $type === 'success' ? 'bg-green-600' : 'bg-red-600' }} p-2 rounded-lg">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @if($type === 'success')
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 13l4 4L19 7"/>
                @else
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                @endif
              </svg>
            </div>
            <div>
              <p class="font-bold">{{ $type === 'success' ? 'Berhasil!' : 'Perhatian!' }}</p>
              <p class="text-sm">{{ session($type) }}</p>
            </div>
          </div>
        </div>
      @endif
    @endforeach

    {{-- STATISTICS CARDS --}}
    @php
      $totalPet = count($pets);
      $totalJantan = collect($pets)->where('jenis_kelamin', 'M')->count();
      $totalBetina = collect($pets)->where('jenis_kelamin', 'F')->count();
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 animate-fadeIn delay-100">
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Total Pet</p>
            <p class="text-3xl font-black text-[#002080]">{{ $totalPet }}</p>
          </div>
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Status Data</p>
            <p class="text-xl font-bold text-gray-800">{{ $showDeleted ? 'Terhapus' : 'Aktif' }}</p>
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
            <p class="text-gray-600 text-sm mb-1">Jenis Kelamin</p>
            <p class="text-sm font-semibold text-gray-800">
              Jantan: <span class="text-sky-700">{{ $totalJantan }}</span> • 
              Betina: <span class="text-pink-700">{{ $totalBetina }}</span>
            </p>
          </div>
          <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
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
              placeholder="Cari nama pet, pemilik, ras, jenis hewan..."
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
        <table class="min-w-full text-sm text-left">
          <thead>
            <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0] text-white text-xs uppercase tracking-wide">
              <th class="py-3 px-4 font-semibold">ID Pet</th>
              <th class="py-3 px-4 font-semibold">Nama Pet</th>
              <th class="py-3 px-4 font-semibold">Pemilik</th>
              <th class="py-3 px-4 font-semibold">Ras</th>
              <th class="py-3 px-4 font-semibold">Jenis</th>
              <th class="py-3 px-4 font-semibold">Jenis Kelamin</th>
              <th class="py-3 px-4 font-semibold">Tanggal Lahir</th>
              <th class="py-3 px-4 font-semibold text-center">Aksi</th>
            </tr>
          </thead>

          <tbody id="tableBody" class="divide-y divide-gray-100 text-sm">
            @forelse($pets as $p)
              @php
                $isJantan = $p->jenis_kelamin === 'M';
              @endphp
              <tr class="data-row bg-white odd:bg-white even:bg-slate-50 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all">
                {{-- ID Pet --}}
                <td class="py-3 px-4 text-gray-500 whitespace-nowrap">
                  <span class="inline-block bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg font-bold text-blue-800">
                    #{{ $p->idpet }}
                  </span>
                </td>

                {{-- Nama Pet --}}
                <td class="py-3 px-4 font-semibold text-gray-800">
                  <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-gray-100 to-gray-200 w-10 h-10 rounded-full flex items-center justify-center">
                      <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                      </svg>
                    </div>
                    <div>
                      <p class="font-bold text-gray-900">{{ $p->nama }}</p>
                      @if($showDeleted)
                        <span class="inline-block mt-1 bg-red-100 text-red-700 text-[11px] px-2 py-0.5 rounded-full font-semibold">
                          TERHAPUS
                        </span>
                      @endif
                    </div>
                  </div>
                </td>

                {{-- Pemilik --}}
                <td class="py-3 px-4 text-gray-700">
                  {{ $p->nama_pemilik }}
                </td>

                {{-- Ras --}}
                <td class="py-3 px-4 text-gray-700">
                  {{ $p->nama_ras }}
                </td>

                {{-- Jenis --}}
                <td class="py-3 px-4">
                  <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                    {{ $p->nama_jenis_hewan }}
                  </span>
                </td>

                {{-- Jenis Kelamin --}}
                <td class="py-3 px-4">
                  <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                    {{ $isJantan ? 'bg-sky-50 text-sky-700 border border-sky-100' : 'bg-pink-50 text-pink-700 border border-pink-100' }}">
                    {{ $isJantan ? 'Jantan' : 'Betina' }}
                  </span>
                </td>

                {{-- Tanggal Lahir --}}
                <td class="py-3 px-4 text-gray-700 whitespace-nowrap">
                  {{ $p->tanggal_lahir ? \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') : '-' }}
                </td>

                {{-- Aksi --}}
                <td class="py-3 px-4">
                  <div class="flex items-center justify-center gap-2">
                    @if(!$showDeleted)
                      <a href="{{ route('admin.pet.edit', $p->idpet) }}"
                         class="btn-action-edit text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Ubah</span>
                      </a>

                      <form action="{{ route('admin.pet.destroy', $p->idpet) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data pet ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn-action-delete text-xs">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                          </svg>
                          <span>Hapus</span>
                        </button>
                      </form>
                    @else
                      <form action="{{ route('admin.pet.restore', $p->idpet) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="btn-action-restore text-xs">
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
                <td colspan="8" class="text-center py-8 text-gray-500 italic text-sm">
                  Belum ada data {{ $showDeleted ? 'terhapus' : 'pet aktif' }} yang dapat ditampilkan.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Footer info --}}
      <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
        <div class="flex justify-between items-center text-xs text-gray-500">
          <p>
            Menampilkan total
            <span class="font-semibold text-[#002080]">{{ count($pets) }}</span>
            data {{ $showDeleted ? 'terhapus' : 'aktif' }}.
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

{{-- STYLES (boleh dihapus jika sudah didefinisikan global) --}}
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
           p-6 rounded-xl shadow-lg;
  }

  .alert-danger {
    @apply bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 
           p-6 rounded-xl shadow-lg;
  }
</style>

@endsection
