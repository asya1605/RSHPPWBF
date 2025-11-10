<!DOCTYPE html>
<html lang="id">
  @include('layouts.admin.head')
  <body class="font-sans flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.admin.navbar')

    <div class="flex flex-1">
      {{-- SIDEBAR --}}
      @include('layouts.admin.sidebar')

      {{-- MAIN CONTENT --}}
      @include('layouts.admin.main')
    </div>

    {{-- FOOTER --}}
    @include('layouts.admin.footer')

  </body>
</html>
