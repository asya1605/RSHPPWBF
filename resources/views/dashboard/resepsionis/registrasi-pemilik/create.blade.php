@extends('layouts.resepsionis')
@section('title', 'Registrasi Pemilik')

@section('content')
<section class="p-8 bg-[#f6f8ff] min-h-[85vh] flex justify-center">
  <div class="bg-white p-8 rounded-2xl shadow border border-gray-200 w-full max-w-2xl">
    <h2 class="text-xl font-bold text-blue-900 mb-6">🧍‍♀️ Registrasi Pemilik Baru</h2>

    @if(session('success'))
      <div class="p-3 mb-4 rounded bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('resepsionis.registrasi-pemilik.store') }}" class="space-y-4">
      @csrf
      <div>
        <label class="font-semibold">Nama Lengkap</label>
        <input type="text" name="nama" required class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">Email</label>
        <input type="email" name="email" required class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">Password</label>
        <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">No. WhatsApp</label>
        <input type="text" name="no_wa" required placeholder="08xxxxxxxxxx" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">Alamat Lengkap</label>
        <textarea name="alamat" rows="3" required class="w-full border rounded-lg px-3 py-2"></textarea>
      </div>

      <div class="pt-3 flex justify-between">
        <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">Simpan</button>
        <a href="{{ route('resepsionis.home') }}" class="text-gray-600 hover:underline">Kembali</a>
      </div>
    </form>
  </div>
</section>
@endsection
