<!DOCTYPE html>
<html lang="id">
@include('layouts.admin.head')

<body class="font-sans bg-[#f5f7ff] flex">

  {{-- SIDEBAR --}}
  @include('layouts.admin.sidebar')

  {{-- AREA KONTEN UTAMA --}}
  <div class="flex-1 flex flex-col min-h-screen ml-64">
    
    {{-- NAVBAR ATAS --}}
    @include('layouts.admin.navbar')

    {{-- ISI HALAMAN --}}
    <main class="flex-1 px-8 py-10">
      @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.admin.footer')
  </div>

</body>
</html>
