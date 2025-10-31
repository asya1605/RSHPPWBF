@extends('layouts.app')

@section('title', 'Verifikasi Email - RSHP UNAIR')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-[#f5f7ff]">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8 border border-gray-100 text-center">
    <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
         alt="UNAIR Logo" class="h-16 mx-auto mb-5">

    <h1 class="text-2xl font-bold text-[#002080] mb-3">Verifikasi Email Anda</h1>
    <p class="text-gray-600 mb-6">
      Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.
      Jika belum menerima, klik tombol di bawah untuk kirim ulang.
    </p>

    @if (session('resent'))
      <div class="bg-green-100 text-green-700 border border-green-300 px-4 py-2 rounded mb-5">
        Link verifikasi baru telah dikirim ke alamat email Anda.
      </div>
    @endif

    <form method="POST" action="{{ route('verification.resend') }}">
      @csrf
      <button type="submit"
              class="w-full bg-[#002080] hover:bg-[#00185e] text-white py-2 rounded-lg font-semibold transition">
        Kirim Ulang Link Verifikasi
      </button>
    </form>
  </div>
</section>
@endsection
