<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RSHP Universitas Airlangga')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f7ff] font-sans text-gray-800">
  
  {{-- HEADER (khusus untuk halaman selain login/register bisa di-include nanti) --}}
  @if (!request()->is('login') && !request()->is('register') && !request()->is('password/*'))
    <header class="bg-white shadow-md">
      <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
          <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
               alt="UNAIR" class="h-10">
          <h1 class="font-bold text-[#002080] text-lg">RSHP Universitas Airlangga</h1>
        </div>
      </div>
    </header>
  @endif

  {{-- KONTEN UTAMA --}}
  <main class="min-h-screen flex items-center justify-center">
    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="bg-[#002080] text-white text-center py-3 text-sm">
    © {{ date('Y') }} Rumah Sakit Hewan Pendidikan - Universitas Airlangga  
    <br><span class="text-gray-300">All rights reserved.</span>
  </footer>

</body>
</html>
