<aside class="bg-gradient-to-b from-[#002080] via-[#00185e] to-[#001040] text-white w-64 h-screen fixed top-0 left-0 flex flex-col z-40 shadow-2xl">
  
  {{-- HEADER / BRAND --}}
  <div class="p-6 border-b border-white/10 flex-shrink-0">
    <div class="flex items-center gap-3">
      <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
      </div>
      <div>
        <h1 class="font-black text-lg">Perawat Panel</h1>
        <p class="text-xs text-blue-300">RSHP UNAIR</p>
      </div>
    </div>
  </div>

  {{-- USER INFO --}}
  <div class="px-4 py-3 bg-white/5 border-b border-white/10 flex-shrink-0">
    <div class="flex items-center gap-3">
      <div class="bg-gradient-to-br from-teal-400 to-teal-600 w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm shadow-lg">
        {{ substr(auth()->user()->nama ?? 'P', 0, 1) }}
      </div>
      <div class="flex-1 min-w-0">
        <p class="font-semibold text-sm truncate">{{ auth()->user()->nama ?? 'Perawat' }}</p>
        <p class="text-xs text-blue-300 truncate">Perawat</p>
      </div>
    </div>
  </div>

  {{-- MENU NAVIGATION --}}
  <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">

    {{-- BERANDA --}}
    <a href="{{ route('dashboard.perawat') }}" 
       class="sidebar-link {{ request()->routeIs('dashboard.perawat') ? 'active' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
      </svg>
      <span>Beranda</span>
    </a>

    {{-- SECTION DIVIDER --}}
    <div class="pt-4 pb-2">
      <div class="flex items-center gap-2 px-3">
        <div class="h-px flex-1 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
        <span class="text-[10px] uppercase tracking-widest text-blue-300 font-bold">Menu Perawat</span>
        <div class="h-px flex-1 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
      </div>
    </div>

    {{-- DATA PASIEN --}}
    <a href="{{ route('perawat.pasien.index') }}" 
       class="sidebar-link {{ request()->is('perawat/pasien*') ? 'active' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
      </svg>
      <span>Data Pasien</span>
    </a>

    {{-- REKAM MEDIS --}}
    <a href="{{ route('perawat.rekam-medis.index') }}" 
       class="sidebar-link {{ request()->is('perawat/rekam-medis*') ? 'active' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
      </svg>
      <span>Rekam Medis</span>
    </a>

    {{-- PROFIL PERAWAT --}}
    <a href="{{ route('perawat.profil.index') }}" 
       class="sidebar-link {{ request()->is('perawat/profil*') ? 'active' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 017 11h10a4 4 0 011.879 6.804M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
      </svg>
      <span>Profil Perawat</span>
    </a>

  </nav>

  {{-- LOGOUT BUTTON --}}
  <div class="p-4 border-t border-white/10 flex-shrink-0">
    <a href="{{ route('logout') }}" class="sidebar-link-danger">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
      </svg>
      <span>Logout</span>
    </a>
  </div>
</aside>
{{-- STYLES --}}
<style>
  /* Float Animation */
  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }
  
  .animate-float {
    animation: float 3s ease-in-out infinite;
  }

  /* Custom Scrollbar */
  .custom-scrollbar::-webkit-scrollbar {
    width: 6px;
  }
  
  .custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 3px;
  }
  
  .custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
  }
  
  .custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.3);
  }

  /* Sidebar Link Styles */
  .sidebar-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.625rem 0.875rem;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.8);
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .sidebar-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: linear-gradient(to bottom, #00BFA6, #00D4B8);
    transform: scaleY(0);
    transition: transform 0.2s ease;
  }

  .sidebar-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(4px);
  }

  .sidebar-link:hover::before {
    transform: scaleY(1);
  }

  .sidebar-link.active {
    background: linear-gradient(135deg, rgba(0, 191, 166, 0.2), rgba(0, 212, 184, 0.1));
    color: white;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(0, 191, 166, 0.2);
  }

  .sidebar-link.active::before {
    transform: scaleY(1);
  }

  .sidebar-link svg {
    flex-shrink: 0;
    transition: transform 0.2s ease;
  }

  .sidebar-link:hover svg {
    transform: scale(1.1);
  }

  .sidebar-link.active svg {
    filter: drop-shadow(0 0 8px rgba(0, 191, 166, 0.5));
  }

  /* Logout Button Style */
  .sidebar-link-danger {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.625rem 0.875rem;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: #FCA5A5;
    background: rgba(220, 38, 38, 0.1);
    border: 1px solid rgba(220, 38, 38, 0.2);
    transition: all 0.2s ease;
  }

  .sidebar-link-danger:hover {
    background: rgba(220, 38, 38, 0.2);
    color: #FEE2E2;
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
  }

  .sidebar-link-danger svg {
    flex-shrink: 0;
  }
</style>