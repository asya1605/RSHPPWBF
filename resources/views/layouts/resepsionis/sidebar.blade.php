<aside class="fixed left-0 top-0 h-full w-64 bg-[#002080] text-white flex flex-col justify-between shadow-lg z-20">
  <div>
    {{-- LOGO --}}
    <div class="flex flex-col items-center justify-center py-6 border-b border-[#1a2a70] text-center">
      <div class="leading-tight">
        <h1 class="text-[13px] font-semibold tracking-wide">RSHP Universitas Airlangga</h1>
        <p class="text-[11px] text-gray-300">Dashboard Resepsionis</p>
      </div>
    </div>

    {{-- MENU --}}
    <nav class="flex flex-col mt-4 space-y-1">
      <a href="{{ route('dashboard.resepsionis') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->routeIs('dashboard.resepsionis') ? 'bg-[#1a2a70]' : '' }}">
         🏠 <span>Beranda</span>
      </a>

      <a href="{{ route('resepsionis.temu-dokter.index') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->is('resepsionis/temu-dokter*') ? 'bg-[#1a2a70]' : '' }}">
         📅 <span>Temu Dokter</span>
      </a>

      <a href="{{ route('resepsionis.registrasi-pemilik.create') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->is('resepsionis/registrasi-pemilik*') ? 'bg-[#1a2a70]' : '' }}">
         🧍‍♀️ <span>Registrasi Pemilik</span>
      </a>

      <a href="{{ route('resepsionis.registrasi-pet.create') }}"
         class="px-6 py-3 flex items-center gap-3 hover:bg-[#1a2a70] rounded-r-full transition {{ request()->is('resepsionis/registrasi-pet*') ? 'bg-[#1a2a70]' : '' }}">
         🐾 <span>Registrasi Pet</span>
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
