@extends('layouts.perawat')
@section('title', 'Data Pasien - RSHP UNAIR')

@section('content')

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
                  d="M5 8a3 3 0 116 0 3 3 0 01-6 0zm8-2h6m-6 4h4M4 16a4 4 0 118 0v2H4v-2z" />
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Data Pasien</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl text-sm md:text-base">
            Daftar pemilik dan hewan pasien yang terdaftar di RSHP UNAIR untuk kebutuhan perawat.
          </p>
        </div>

        {{-- (Opsional) Info Singkat --}}
        <div class="grid grid-cols-1 gap-3 md:gap-4">
          <div class="glass rounded-2xl px-4 py-3 shadow-xl border border-white">
            <p class="text-xs text-gray-500 font-semibold mb-1">Total Pemilik</p>
            <p class="text-lg font-black text-[#002080]">
              {{ $pasien->unique('idpemilik')->count() }}
            </p>
          </div>
          <div class="glass rounded-2xl px-4 py-3 shadow-xl border border-white">
            <p class="text-xs text-gray-500 font-semibold mb-1">Total Hewan</p>
            <p class="text-lg font-black text-[#00BFA6]">
              {{ $pasien->count() }}
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- SEARCH / FILTER --}}
    <div class="glass rounded-2xl p-6 shadow-2xl border border-white mb-6 animate-fadeIn delay-100">
      <div class="flex flex-col md:flex-row gap-4 md:items-center">
        <div class="flex-1">
          <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">
            Cari Pasien
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-4.35-4.35M10 17a7 7 0 100-14 7 7 0 000 14z" />
              </svg>
            </div>
            <input
              type="text"
              id="search"
              placeholder="Cari nama pemilik, hewan, email, atau jenis..."
              class="w-full pl-11 pr-4 py-2.5 border-2 border-gray-200 rounded-xl text-sm
                     focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                     transition-all shadow-sm bg-white"
            >
          </div>
        </div>
      </div>
    </div>

    {{-- DATA TABLE --}}
    <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white animate-fadeIn delay-200">
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">
          <thead>
            <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0] text-xs uppercase tracking-wider">
              <th class="py-3.5 px-6 font-bold text-white">ID Pemilik</th>
              <th class="py-3.5 px-6 font-bold text-white">Nama Pemilik</th>
              <th class="py-3.5 px-6 font-bold text-white">Email</th>
              <th class="py-3.5 px-6 font-bold text-white">No. WA</th>
              <th class="py-3.5 px-6 font-bold text-white">Alamat</th>
              <th class="py-3.5 px-6 font-bold text-white">Nama Hewan</th>
              <th class="py-3.5 px-6 font-bold text-white">Jenis Hewan</th>
              <th class="py-3.5 px-6 font-bold text-white">Ras Hewan</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100" id="tableBody">
            @forelse($pasien as $p)
              <tr class="data-row bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                
                {{-- ID Pemilik --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                    <span class="text-xs font-bold text-blue-800">#{{ $p->idpemilik }}</span>
                  </div>
                </td>

                {{-- Nama Pemilik --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-gray-100 to-gray-200 w-9 h-9 rounded-full flex items-center justify-center flex-shrink-0">
                      <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    </div>
                    <div>
                      <p class="font-semibold text-gray-900 text-sm">{{ $p->nama_pemilik }}</p>
                    </div>
                  </div>
                </td>

                {{-- Email --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  <div class="flex items-center gap-2 text-sm text-gray-700">
                    <svg class="w-4 h-4 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $p->email ?? '-' }}</span>
                  </div>
                </td>

                {{-- No WA --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  <div class="flex items-center gap-2 text-sm">
                    @if($p->no_wa)
                      <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884" />
                      </svg>
                      <span class="text-gray-800">{{ $p->no_wa }}</span>
                    @else
                      <span class="text-gray-400 italic text-xs">-</span>
                    @endif
                  </div>
                </td>

                {{-- Alamat --}}
                <td class="py-3 px-6 align-top">
                  <p class="text-xs md:text-sm text-gray-700 line-clamp-2 max-w-xs">
                    {{ $p->alamat ?? '-' }}
                  </p>
                </td>

                {{-- Nama Hewan --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  <div class="flex items-center gap-2">
                    <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                      <span class="text-lg">🐾</span>
                    </div>
                    <span class="font-semibold text-gray-900 text-sm">
                      {{ $p->nama_hewan ?? '-' }}
                    </span>
                  </div>
                </td>

                {{-- Jenis Hewan --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  @if($p->nama_jenis_hewan)
                    <span class="inline-block bg-gradient-to-br from-blue-50 to-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                      {{ $p->nama_jenis_hewan }}
                    </span>
                  @else
                    <span class="text-gray-400 text-xs italic">-</span>
                  @endif
                </td>

                {{-- Ras Hewan --}}
                <td class="py-3 px-6 whitespace-nowrap">
                  @if($p->nama_ras)
                    <span class="inline-block bg-gradient-to-br from-purple-50 to-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold">
                      {{ $p->nama_ras }}
                    </span>
                  @else
                    <span class="text-gray-400 text-xs italic">-</span>
                  @endif
                </td>

              </tr>
            @empty
              <tr>
                <td colspan="8" class="px-6 py-10 text-center text-gray-500 italic">
                  Belum ada data pasien.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- TABLE FOOTER --}}
      <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
        <p class="text-sm text-gray-600">
          Menampilkan
          <span class="font-bold text-[#002080]">{{ $pasien->count() }}</span>
          data hewan dari
          <span class="font-bold text-[#002080]">{{ $pasien->unique('idpemilik')->count() }}</span>
          pemilik.
        </p>
      </div>
    </div>

  </div>
</section>

{{-- SEARCH SCRIPT --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    if (!searchInput) return;

    searchInput.addEventListener('keyup', function () {
      const query = this.value.toLowerCase();
      document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? '' : 'none';
      });
    });
  });
</script>

{{-- STYLES --}}
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

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }

  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

@endsection
