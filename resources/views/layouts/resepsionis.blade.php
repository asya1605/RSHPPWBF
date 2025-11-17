<!DOCTYPE html>
<html lang="id">
  @include('layouts.admin.head')
  <body class="font-sans flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.resepsionis.navbar')

    <div class="flex flex-1">
      {{-- SIDEBAR --}}
      @include('layouts.resepsionis.sidebar')

      {{-- MAIN CONTENT --}}
      @include('layouts.resepsionis.main')
    </div>

    {{-- FOOTER --}}
    @include('layouts.resepsionis.footer')

  </body>
</html>
