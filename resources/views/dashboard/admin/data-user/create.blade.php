@extends('layouts.admin.main')

@section('title', 'Tambah User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-lg border border-gray-200 px-8 py-7">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-3 mb-5 border-b border-gray-100 pb-4">
      <div>
        <h2 class="text-xl font-bold text-[#002080]">➕ Tambah User Baru</h2>
        <p class="text-xs text-gray-500 mt-1">
          Buat akun user baru yang dapat mengakses sistem RSHP UNAIR.
        </p>
      </div>
    </div>

    {{-- Flash / Error --}}
    @if (session('danger'))
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-lg mb-3 text-sm text-center">
        {{ session('danger') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
        <p class="font-semibold mb-1">Periksa kembali data berikut:</p>
        <ul class="list-disc ml-5 space-y-0.5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.data-user.store') }}" method="POST" class="space-y-4">
      @csrf

      {{-- Nama --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">
          Nama <span class="text-red-500">*</span>
        </label>
        <input
          type="text"
          name="nama"
          value="{{ old('nama') }}"
          class="border border-gray-300 rounded-lg w-full px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          placeholder="Nama lengkap user"
          required
        >
      </div>

      {{-- Email --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">
          Email <span class="text-red-500">*</span>
        </label>
        <input
          type="email"
          name="email"
          value="{{ old('email') }}"
          class="border border-gray-300 rounded-lg w-full px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          placeholder="contoh@mail.com"
          required
        >
      </div>

      {{-- Password --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">
          Password <span class="text-red-500">*</span>
        </label>
        <input
          type="password"
          name="password"
          class="border border-gray-300 rounded-lg w-full px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          placeholder="Minimal 6 karakter"
          required
        >
      </div>

      {{-- Konfirmasi Password --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">
          Konfirmasi Password <span class="text-red-500">*</span>
        </label>
        <input
          type="password"
          name="password_confirmation"
          class="border border-gray-300 rounded-lg w-full px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          placeholder="Ulangi password"
          required
        >
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex items-center justify-between pt-4">
        <a
          href="{{ route('admin.data-user.index') }}"
          class="inline-flex items-center text-xs md:text-sm text-gray-600 hover:text-gray-800"
        >
          ← Kembali ke daftar
        </a>

        <div class="flex gap-2">
          <a
            href="{{ route('admin.data-user.index') }}"
            class="inline-flex items-center px-4 py-2.5 rounded-lg border border-gray-300 text-xs md:text-sm
                   font-medium text-gray-700 hover:bg-gray-100"
          >
            Batal
          </a>
          <button
            type="submit"
            class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2.5 rounded-lg text-xs md:text-sm font-semibold shadow-sm transition"
          >
            Simpan
          </button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
