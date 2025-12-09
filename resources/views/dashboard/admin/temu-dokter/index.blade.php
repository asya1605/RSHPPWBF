@extends('layouts.admin.main')

@section('title', 'Temu Dokter - RSHP UNAIR')

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
                  d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Daftar Temu Dokter</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl">
            Kelola antrian temu dokter berdasarkan tanggal. Tambah antrian baru, ubah status, atau hapus antrian.
          </p>
        </div>

        {{-- Info Tanggal Terpilih --}}
        <div class="glass rounded-2xl px-5 py-4 shadow-xl border border-white">
          <p class="text-xs font-semibold text-gray-500 mb-1">Tanggal Terpilih</p>
          <p class="text-lg font-black text-[#002080]">
            {{ $selectedDate }}
          </p>
        </div>
      </div>
    </div>

    {{-- ALERTS --}}
    @if(session('success'))
      <div class="alert-success animate-slideDown">
        <div class="flex items-center gap-3">
          <div class="bg-green-600 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"/>
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
    @php
      $totalAntrian   = $antrian->count();
      $totalMenunggu  = $antrian->where('status', 0)->count();
      $totalSelesai   = $antrian->where('status', 1)->count();
      $showDeleted    = $showDeleted ?? request()->has('show_deleted');
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 animate-fadeIn delay-100">
      {{-- Total Antrian --}}
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">
              Total Antrian {{ $showDeleted ? 'Terhapus' : 'Aktif' }}
            </p>
            <p class="text-3xl font-black text-[#002080]">{{ $totalAntrian }}</p>
          </div>
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
            </svg>
          </div>
        </div>
      </div>

      {{-- Menunggu --}}
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Status</p>
            <p class="text-xl font-bold text-gray-800">{{ $totalMenunggu }} Menunggu</p>
          </div>
          <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
        </div>
      </div>

      {{-- Selesai --}}
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Selesai</p>
            <p class="text-xl font-bold text-gray-800">{{ $totalSelesai }} Antrian</p>
          </div>
          <div class="bg-gradient-to-br from-green-500 to-green-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- FILTER & ADD SECTION --}}
    <div class="glass rounded-2xl p-6 shadow-xl border border-white mb-8 animate-fadeIn delay-200">
      <div class="flex flex-col lg:flex-row gap-6 lg:items-end">

        {{-- Filter Tanggal + Toggle Aktif/Terhapus --}}
        <div class="flex-1 space-y-3">
          <form method="GET" class="w-full">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Tanggal
            </label>
            <div class="relative max-w-xs">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3M5 11h14M5 19h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>
              </div>
              <input
                type="date"
                name="date"
                value="{{ $selectedDate }}"
                class="w-full pl-10 pr-3 py-2 border-2 border-gray-200 rounded-xl text-sm
                       focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                       transition-all shadow-sm bg-white"
              >
              @if($showDeleted)
                <input type="hidden" name="show_deleted" value="1">
              @endif
            </div>
            <button type="submit" class="btn-primary mt-3">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7"/>
              </svg>
              <span>Lihat</span>
            </button>
          </form>

          {{-- Toggle Aktif / Terhapus --}}
          <div class="mt-2">
            @if($showDeleted)
              <a href="{{ route('admin.temu-dokter.index', ['date' => $selectedDate]) }}"
                 class="btn-secondary">
                <span>Kembali ke Antrian Aktif</span>
              </a>
            @else
              <a href="{{ route('admin.temu-dokter.index', ['date' => $selectedDate, 'show_deleted' => 1]) }}"
                 class="btn-action-delete">
                <span>Lihat Antrian Terhapus</span>
              </a>
            @endif
          </div>
        </div>

        {{-- Tambah Antrian (hanya saat melihat data aktif) --}}
        @unless($showDeleted)
          <form method="POST"
                action="{{ route('admin.temu-dokter.store') }}"
                class="flex-1">
            @csrf
            <label for="idpet" class="block text-sm font-semibold text-gray-700 mb-2">
              Tambah Antrian Baru (Pilih Pet)
            </label>
            <div class="flex flex-col md:flex-row gap-3 md:items-center">
              <select
                name="idpet"
                id="idpet"
                required
                class="flex-1 border-2 border-gray-200 rounded-xl px-3 py-2 text-sm
                       focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                       transition-all shadow-sm bg-white"
              >
                <option value="">— Pilih Pet —</option>
                @foreach ($allPets as $p)
                  <option value="{{ $p->idpet }}">{{ $p->nama }} (ID: {{ $p->idpet }})</option>
                @endforeach
              </select>

              <button type="submit" class="btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4"/>
                </svg>
                <span>Tambah Antrian</span>
              </button>
            </div>
          </form>
        @endunless

      </div>
    </div>

    {{-- DATA TABLE --}}
    <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white animate-fadeIn delay-300">
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
              <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">
                No Urut
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Waktu Daftar
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Nama Pet
              </th>
              <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">
                Status
              </th>
              <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider w-72">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody id="tableBody" class="divide-y divide-gray-100">
            @forelse ($antrian as $a)
              <tr class="data-row bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                
                {{-- No Urut --}}
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                    <span class="text-sm font-bold text-blue-800">{{ $a->no_urut }}</span>
                  </div>
                </td>

                {{-- Waktu Daftar --}}
                <td class="px-6 py-3 whitespace-nowrap text-gray-700">
                  {{ \Carbon\Carbon::parse($a->waktu_daftar)->format('d M Y, H:i') }}
                </td>

                {{-- Nama Pet --}}
                <td class="px-6 py-3 whitespace-nowrap">
                  <div class="flex items-center gap-2">
                    <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center">
                      <span class="text-lg">🐾</span>
                    </div>
                    <span class="font-semibold text-gray-900">{{ $a->nama_pet }}</span>
                  </div>
                </td>

                {{-- Status --}}
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  @php
                    if ($a->status == 0) {
                      $statusText = 'Menunggu';
                      $badgeClass = 'from-yellow-100 to-yellow-200 text-yellow-800';
                    } elseif ($a->status == 1) {
                      $statusText = 'Selesai';
                      $badgeClass = 'from-green-100 to-green-200 text-green-800';
                    } else {
                      $statusText = 'Batal';
                      $badgeClass = 'from-red-100 to-red-200 text-red-800';
                    }
                  @endphp
                  <span class="inline-block bg-gradient-to-br {{ $badgeClass }} px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $statusText }}
                  </span>
                </td>

                {{-- Aksi --}}
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  <div class="flex items-center justify-center gap-2">

                    @if(!$showDeleted)
                      {{-- Set Menunggu --}}
                      <form method="POST"
                            action="{{ route('admin.temu-dokter.update', $a->idreservasi_dokter) }}"
                            class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="0">
                        <button type="submit" class="btn-action-reset text-[11px]">
                          <span>Menunggu</span>
                        </button>
                      </form>

                      {{-- Selesai --}}
                      <form method="POST"
                            action="{{ route('admin.temu-dokter.update', $a->idreservasi_dokter) }}"
                            class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="1">
                        <button type="submit" class="btn-action-edit text-[11px]">
                          <span>Selesai</span>
                        </button>
                      </form>

                      {{-- Batal --}}
                      <form method="POST"
                            action="{{ route('admin.temu-dokter.update', $a->idreservasi_dokter) }}"
                            class="inline"
                            onsubmit="return confirm('Batalkan antrian ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="2">
                        <button type="submit" class="btn-action-delete text-[11px]">
                          <span>Batal</span>
                        </button>
                      </form>

                      {{-- Hapus (soft delete) --}}
                      <form method="POST"
                            action="{{ route('admin.temu-dokter.destroy', $a->idreservasi_dokter) }}"
                            class="inline"
                            onsubmit="return confirm('Hapus antrian ini (soft delete)?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action-delete text-[11px]">
                          <span>Hapus</span>
                        </button>
                      </form>
                    @else
                      {{-- Restore --}}
                      <form method="POST"
                            action="{{ route('admin.temu-dokter.restore', $a->idreservasi_dokter) }}"
                            class="inline"
                            onsubmit="return confirm('Pulihkan antrian ini?')">
                        @csrf
                        <button type="submit" class="btn-action-restore text-[11px]">
                          <span>Pulihkan</span>
                        </button>
                      </form>
                    @endif

                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-6 py-6 text-center text-gray-600 text-sm">
                  Tidak ada antrian untuk tanggal ini.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Footer --}}
      <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
        <p class="text-sm text-gray-600">
          Menampilkan 
          <span class="font-bold text-[#002080]">{{ $totalAntrian }}</span>
          antrian {{ $showDeleted ? 'terhapus' : 'aktif' }} pada tanggal {{ $selectedDate }}.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- STYLES: sama konsep dengan Data User --}}
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

  .btn-action-edit {
    @apply inline-flex items-center justify-center bg-gradient-to-br from-emerald-50 to-emerald-100 
           text-emerald-700 px-3 py-1.5 rounded-lg font-semibold border border-emerald-200
           hover:from-emerald-100 hover:to-emerald-200 hover:shadow-md transition-all;
  }

  .btn-action-reset {
    @apply inline-flex items-center justify-center bg-gradient-to-br from-sky-50 to-sky-100 
           text-sky-700 px-3 py-1.5 rounded-lg font-semibold border border-sky-200
           hover:from-sky-100 hover:to-sky-200 hover:shadow-md transition-all;
  }

  .btn-action-delete {
    @apply inline-flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100 
           text-red-700 px-3 py-1.5 rounded-lg font-semibold border border-red-200
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
