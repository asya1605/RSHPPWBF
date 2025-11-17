<!DOCTYPE html>
<html lang="id">
  @include('layouts.dokter.head')
  <body class="font-sans flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.dokter.navbar')

    <div class="flex flex-1">
      {{-- SIDEBAR --}}
      @include('layouts.dokter.sidebar')

      {{-- MAIN CONTENT --}}
      @include('layouts.dokter.main')
    </div>

    {{-- FOOTER --}}
    @include('layouts.dokter.footer')

  </body>
</html>
