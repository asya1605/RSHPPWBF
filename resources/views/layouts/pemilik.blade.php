<!DOCTYPE html>
<html lang="id">
  @include('layouts.dokter.head')
  <body class="font-sans flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.pemilik.navbar')

    <div class="flex flex-1">
      {{-- SIDEBAR --}}
      @include('layouts.pemilik.sidebar')

      {{-- MAIN CONTENT --}}
      @include('layouts.pemilik.main')
    </div>

    {{-- FOOTER --}}
    @include('layouts.pemilik.footer')

  </body>
</html>
