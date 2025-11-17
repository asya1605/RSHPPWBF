<!DOCTYPE html>
<html lang="id">
  @include('layouts.perawat.head')
  <body class="font-sans flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.perawat.navbar')

    <div class="flex flex-1">
      {{-- SIDEBAR --}}
      @include('layouts.perawat.sidebar')

      {{-- MAIN CONTENT --}}
      @include('layouts.perawat.main')
    </div>

    {{-- FOOTER --}}
    @include('layouts.perawat.footer')

  </body>
</html>
