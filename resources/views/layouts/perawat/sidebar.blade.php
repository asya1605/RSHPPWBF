<aside class="fixed left-0 top-0 h-full w-64 bg-[#002080] text-white flex flex-col justify-between shadow-lg z-30">
  <div>
    {{-- LOGO --}}
    <div class="flex items-center gap-3 px-6 py-5 border-b border-[#1a2a70]">
      <div>
        <h1 class="text-sm font-semibold leading-tight">RSHP Universitas Airlangga</h1>
        <p class="text-xs text-gray-300">Dashboard Perawat</p>
      </div>
    </div>

    {{-- MENU UTAMA --}}
    <nav class="flex flex-col mt-4 space-y-1">
      <a href="{{ route('dashboard.perawat') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->routeIs('dashboard.perawat') ? 'bg-[#1a2a70]' : '' }}">
        🏠 <span>Beranda</span>
      </a>

      <a href="{{ route('perawat.pasien.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->is('perawat/pasien*') ? 'bg-[#1a2a70]' : '' }}">
        🐾 <span>Data Pasien</span>
      </a>

      <a href="{{ route('perawat.rekam-medis.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->is('perawat/rekam-medis*') ? 'bg-[#1a2a70]' : '' }}">
        📋 <span>Rekam Medis</span>
      </a>

      <a href="{{ route('perawat.profil.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->is('perawat/profil*') ? 'bg-[#1a2a70]' : '' }}">
        👩‍⚕️ <span>Profil Perawat</span>
      </a>

      <a href="{{ route('logout') }}"
         class="px-6 py-3 flex items-center gap-3 text-red-300 hover:bg-red-600/30 rounded-r-full transition">
        🚪 <span>Logout</span>
      </a>
    </nav>
  </div>

  {{-- FOOTER --}}
  <div class="text-center text-xs py-4 border-t border-[#1a2a70] text-gray-400">
    © {{ date('Y') }} RSHP UNAIR
  </div>
</aside>
