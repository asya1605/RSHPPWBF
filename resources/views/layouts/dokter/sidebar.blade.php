<aside class="fixed left-0 top-0 h-full w-64 bg-[#002080] text-white flex flex-col justify-between shadow-lg z-20">
  <div>
    {{-- 🔹 HEADER LOGO --}}
    <div class="flex flex-col items-center justify-center py-6 border-b border-[#1a2a70] text-center">
      <div class="leading-tight">
        <h1 class="text-[13px] font-semibold tracking-wide">RSHP Universitas Airlangga</h1>
        <p class="text-[11px] text-gray-300">Dashboard Dokter</p>
      </div>
    </div>

    {{-- 🔹 MENU UTAMA --}}
    <nav class="flex flex-col mt-4 space-y-1 px-1">
      <a href="{{ route('dashboard.dokter') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] transition rounded-r-full {{ request()->routeIs('dashboard.dokter') ? 'bg-[#1a2a70]' : '' }}">
        🏠 <span>Beranda</span>
      </a>

      <a href="{{ route('dokter.pasien.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] transition rounded-r-full {{ request()->is('dokter/pasien*') ? 'bg-[#1a2a70]' : '' }}">
        🐾 <span>Data Pasien</span>
      </a>

      <a href="{{ route('dokter.rekam-medis.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] transition rounded-r-full {{ request()->is('dokter/rekam-medis*') ? 'bg-[#1a2a70]' : '' }}">
        📋 <span>Rekam Medis</span>
      </a>

      <a href="{{ route('dokter.profil.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] transition rounded-r-full {{ request()->is('dokter/profil*') ? 'bg-[#1a2a70]' : '' }}">
        👨‍⚕️ <span>Profil Dokter</span>
      </a>

      <a href="{{ route('logout') }}"
         class="px-6 py-3 flex items-center gap-3 text-red-300 hover:bg-red-600/30 transition rounded-r-full">
        🚪 <span>Logout</span>
      </a>
    </nav>
  </div>

  {{-- 🔹 FOOTER --}}
  <div class="text-center text-xs py-4 border-t border-[#1a2a70] text-gray-400">
    © {{ date('Y') }} RSHP UNAIR
  </div>
</aside>
