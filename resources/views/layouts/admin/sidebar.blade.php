<aside class="bg-[#002080] text-white w-64 h-screen fixed top-0 left-0 flex flex-col z-40 shadow-lg">
  {{-- HEADER --}}
  <div class="p-4 font-bold text-lg border-b border-blue-700 flex items-center gap-2 flex-shrink-0">
    ⚙️ <span>Admin Panel</span>
  </div>

  {{-- MENU UTAMA --}}
  <ul class="p-4 space-y-2 text-sm overflow-y-auto flex-1 scrollbar-thin scrollbar-thumb-blue-700 scrollbar-track-blue-900/20">

    {{-- DASHBOARD --}}
    <li>
      <a href="{{ route('dashboard.admin') }}"
         class="block hover:bg-blue-800 rounded-lg px-3 py-2 transition-all duration-200">
         🏠 Dashboard
      </a>
    </li>

    {{-- SECTION TITLE --}}
    <li class="mt-4 text-xs uppercase tracking-widest text-gray-300">
      Data Master
    </li>

    {{-- DATA MASTER MENU --}}
    <li><a href="{{ route('admin.data-user.index') }}" class="sidebar-link">👤 Data User</a></li>
    <li><a href="{{ route('admin.role-user.index') }}" class="sidebar-link">🧩 Role User</a></li>
    <li><a href="{{ route('admin.jenis-hewan.index') }}" class="sidebar-link">🐶 Jenis Hewan</a></li>
    <li><a href="{{ route('admin.ras-hewan.index') }}" class="sidebar-link">🐾 Ras Hewan</a></li>
    <li><a href="{{ route('admin.pemilik.index') }}" class="sidebar-link">🏠 Data Pemilik</a></li>
    <li><a href="{{ route('admin.pet.index') }}" class="sidebar-link">🐕 Data Pet</a></li>
    <li><a href="{{ route('admin.kategori.index') }}" class="sidebar-link">📂 Data Kategori</a></li>
    <li><a href="{{ route('admin.kategori-klinis.index') }}" class="sidebar-link">🧫 Kategori Klinis</a></li>
    <li><a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="sidebar-link">💊 Kode Tindakan Terapi</a></li>
    <li><a href="{{ route('admin.rekam-medis.index') }}" class="sidebar-link">🩺 Rekam Medis</a></li>

    {{-- LOGOUT --}}
    <li class="mt-6 border-t border-blue-700 pt-3">
      <a href="{{ route('logout') }}"
         class="block text-red-300 hover:text-red-400 hover:bg-red-900/20 px-3 py-2 rounded-lg transition">
         🚪 Logout
      </a>
    </li>
  </ul>
</aside>

{{-- STYLING TAMBAHAN --}}
<style>
  /* ✨ Scrollbar tipis elegan */
  .scrollbar-thin::-webkit-scrollbar {
    width: 6px;
  }
  .scrollbar-thin::-webkit-scrollbar-thumb {
    background-color: rgba(255,255,255,0.3);
    border-radius: 3px;
  }
  .scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background-color: rgba(255,255,255,0.5);
  }

  /* 🎨 Styling hover & link aktif */
  .sidebar-link {
    display: block;
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    transition: all 0.2s ease-in-out;
  }
  .sidebar-link:hover {
    background-color: rgba(255, 255, 255, 0.15);
    transform: translateX(4px);
  }
</style>
