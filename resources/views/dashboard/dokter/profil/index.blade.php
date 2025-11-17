@extends('layouts.dokter')
@section('title', 'Profil Dokter')

@section('content')
<section class="min-h-screen bg-[#f5f7ff] flex justify-center items-center p-8">
  <div class="bg-white rounded-2xl shadow-lg w-full max-w-lg border border-gray-200 p-8">
    <h1 class="text-2xl font-bold text-[#002080] text-center mb-6">🩺 Profil Dokter</h1>

    @if ($profil)
      <div class="space-y-3 text-gray-700">
        <div>
          <p class="text-sm font-semibold text-gray-500">Nama</p>
          <p class="text-lg font-medium">{{ $profil->nama_user }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500">Email</p>
          <p class="text-lg font-medium">{{ $profil->email }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500">Bidang Dokter</p>
          <p class="text-lg font-medium">{{ $profil->bidang_dokter }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500">Nomor HP</p>
          <p class="text-lg font-medium">{{ $profil->no_hp ?? '-' }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500">Jenis Kelamin</p>
          <p class="text-lg font-medium">
            @if ($profil->jenis_kelamin === 'L') Laki-laki
            @elseif ($profil->jenis_kelamin === 'P') Perempuan
            @else -
            @endif
          </p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500">Alamat</p>
          <p class="text-lg font-medium">{{ $profil->alamat ?? '-' }}</p>
        </div>
      </div>
    @else
      <p class="text-gray-500 italic text-center">Data profil belum terdaftar untuk akun ini.</p>
    @endif
  </div>
</section>
@endsection
