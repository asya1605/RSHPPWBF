@extends('layouts.dokter')

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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Data Pasien</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl">
            Daftar lengkap pemilik hewan dan data pasien yang terdaftar di RSHP UNAIR
          </p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3">
          <button onclick="window.print()" class="btn-secondary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            <span>Print</span>
          </button>
          <button class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            <span>Export</span>
          </button>
        </div>
      </div>
    </div>

    {{-- STATISTICS CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 animate-fadeIn delay-100">
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Total Pemilik</p>
            <p class="text-3xl font-black text-[#002080]">{{ $pasien->unique('idpemilik')->count() }}</p>
          </div>
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Total Hewan</p>
            <p class="text-3xl font-black text-[#00BFA6]">{{ $pasien->count() }}</p>
          </div>
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Data Entries</p>
            <p class="text-3xl font-black text-[#6366F1]">{{ $pasien->count() }}</p>
          </div>
          <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- SEARCH & FILTER SECTION --}}
    <div class="glass rounded-2xl p-6 shadow-xl border border-white mb-8 animate-fadeIn delay-200">
      <div class="flex flex-col md:flex-row gap-4">
        {{-- Search Input --}}
        <div class="flex-1">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </div>
            <input
              type="text"
              id="search"
              placeholder="Cari nama pemilik, hewan, atau jenis..."
              class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm
                     focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                     transition-all shadow-sm"
            >
          </div>
        </div>

        {{-- Filter Buttons --}}
        <div class="flex gap-2">
          <button class="btn-secondary whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            <span>Filter</span>
          </button>
        </div>
      </div>
    </div>

    {{-- DATA TABLE --}}
    <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white animate-fadeIn delay-300">
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="bg-gradient-to-r from-[#002080] to-[#0040A0]">
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                ID Pemilik
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Nama Pemilik
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Email
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                No. WhatsApp
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Nama Hewan
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Jenis
              </th>
              <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                Ras
              </th>
            </tr>
          </thead>
          <tbody id="tableBody" class="divide-y divide-gray-100">
            @forelse($pasien as $p)
              <tr class="data-row bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg inline-block">
                    <span class="text-sm font-bold text-blue-800">#{{ $p->idpemilik }}</span>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-gray-100 to-gray-200 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                      <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                      </svg>
                    </div>
                    <div>
                      <p class="font-bold text-gray-900">{{ $p->nama_pemilik }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-gray-700 text-sm">{{ $p->email }}</span>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    @if($p->no_wa)
                      <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                      </svg>
                      <span class="text-gray-700 text-sm">{{ $p->no_wa }}</span>
                    @else
                      <span class="text-gray-400 text-sm italic">-</span>
                    @endif
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="max-w-xs">
                    <p class="text-gray-700 text-sm line-clamp-2">{{ $p->alamat ?? '-' }}</p>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                      <span class="text-lg">🐾</span>
                    </div>
                    <span class="font-semibold text-gray-900">{{ $p->nama_hewan ?? '-' }}</span>
                  </div>
                </td>
                <td class="px-6 py-4">
                  @if($p->nama_jenis_hewan)
                    <span class="inline-block bg-gradient-to-br from-blue-100 to-blue-200 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                      {{ $p->nama_jenis_hewan }}
                    </span>
                  @else
                    <span class="text-gray-400 text-sm italic">-</span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  @if($p->nama_ras)
                    <span class="inline-block bg-gradient-to-br from-purple-100 to-purple-200 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold">
                      {{ $p->nama_ras }}
                    </span>
                  @else
                    <span class="text-gray-400 text-sm italic">-</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="px-6 py-12 text-center">
                  <div class="flex flex-col items-center gap-4">
                    <div class="bg-gray-100 p-6 rounded-full">
                      <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
                      </svg>
                    </div>
                    <div>
                      <p class="text-gray-600 font-semibold text-lg">Belum ada data pasien</p>
                      <p class="text-gray-500 text-sm mt-1">Data pasien akan muncul di sini</p>
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
            <span class="font-bold text-[#002080]">{{ $pasien->count() }}</span>
            data pasien
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
    50% { transform: translateY(-10px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
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

  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

@endsection