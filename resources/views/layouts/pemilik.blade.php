<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Pemilik - RSHP UNAIR')</title>

  {{-- Tailwind CSS --}}
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f7ff] font-sans">

  {{-- HEADER --}}
  <header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
      <div class="flex items-center gap-4">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
             alt="Logo UNAIR" class="h-10">
        <h1 class="font-bold text-[#002080] text-lg">RSHP Universitas Airlangga</h1>
      </div>
    </div>
  </header>

  {{-- NAVBAR --}}
  <nav class="bg-[#002080] shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-center gap-10 py-3 text-white font-medium">
      <a href="{{ route('dashboard.pemilik') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         🏠 <span>Beranda</span>
      </a>
      <a href="{{ route('pemilik.pet.index') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         🐾 <span>Data Pet</span>
      </a>
      <a href="{{ route('pemilik.reservasi.index') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         📅 <span>Reservasi</span>
      </a>
      <a href="{{ route('logout') }}" 
         class="flex items-center gap-2 text-red-300 hover:text-red-400 transition">
         🚪 <span>Logout</span>
      </a>
    </div>
  </nav>

  {{-- KONTEN UTAMA --}}
  <main class="max-w-6xl mx-auto py-10 px-6">
    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="bg-[#002080] text-white text-center py-3 mt-16 text-sm">
    © {{ date('Y') }} Rumah Sakit Hewan Pendidikan - Universitas Airlangga  
    <br><span class="text-gray-300">All rights reserved.</span>
  </footer>

</body>
</html>
