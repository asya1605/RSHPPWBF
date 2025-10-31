<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RSHP Universitas Airlangga')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f7ff] font-sans text-gray-800">

  {{-- HEADER PUBLIK --}}
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between px-6 py-4">
      {{-- Logo & Judul --}}
      <div class="flex items-center gap-4">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
             alt="UNAIR" class="h-10">
        <div class="flex flex-col">
          <h1 class="font-bold text-[#002080] text-lg">RSHP Universitas Airlangga</h1>
        </div>
      </div>

      {{-- Menu Navigasi --}}
      <nav class="mt-3 sm:mt-0 flex flex-wrap gap-4 text-sm font-medium text-gray-700">
        <a href="{{ route('site.home') }}" class="hover:text-[#002080] transition">Home</a>
        <a href="{{ route('site.layanan') }}" class="hover:text-[#002080] transition">Layanan</a>
        <a href="{{ route('site.struktur') }}" class="hover:text-[#002080] transition">Struktur</a>
        <a href="{{ route('site.lokasi') }}" class="hover:text-[#002080] transition">Lokasi</a>
        <a href="{{ route('site.visi') }}" class="hover:text-[#002080] transition">Visi & Misi</a>
        <a href="{{ route('login') }}" class="text-[#002080] hover:underline">Login</a>
      </nav>
    </div>
  </header>

  {{-- KONTEN UTAMA --}}
  <main class="min-h-[85vh] flex items-center justify-center py-10 px-4">
    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="bg-[#002080] text-white text-center py-3 text-sm">
    © {{ date('Y') }} Rumah Sakit Hewan Pendidikan - Universitas Airlangga  
    <br><span class="text-gray-300">All rights reserved.</span>
  </footer>

</body>
</html>
