@extends('layouts.resepsionis')
@section('title', 'Registrasi Pet')

@section('content')
<section class="p-8 bg-[#f6f8ff] min-h-[85vh] flex justify-center">
  <div class="bg-white p-8 rounded-2xl shadow border border-gray-200 w-full max-w-2xl">
    <h2 class="text-xl font-bold text-blue-900 mb-6">🐾 Registrasi Pet Baru</h2>

    @if(session('success'))
      <div class="p-3 mb-4 rounded bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('resepsionis.registrasi-pet.store') }}" class="space-y-4">
      @csrf
      <div>
        <label class="font-semibold">Nama Pet</label>
        <input type="text" name="nama" required class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">Warna / Tanda</label>
        <input type="text" name="warna_tanda" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="font-semibold">Jenis Kelamin</label>
        <select name="jenis_kelamin" required class="w-full border rounded-lg px-3 py-2">
          <option value="M">Jantan</option>
          <option value="F">Betina</option>
        </select>
      </div>

      <div>
        <label class="font-semibold">Pemilik</label>
        <select name="idpemilik" required class="w-full border rounded-lg px-3 py-2">
          @foreach ($pemilikList as $p)
            <option value="{{ $p->idpemilik }}">{{ $p->nama }} ({{ $p->email }})</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="font-semibold">Ras Hewan</label>
        <select name="idras_hewan" required class="w-full border rounded-lg px-3 py-2">
          @foreach ($rasList as $r)
            <option value="{{ $r->idras_hewan }}">{{ $r->nama_ras }}</option>
          @endforeach
        </select>
      </div>

      <div class="pt-3 flex justify-between">
        <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">Daftarkan</button>
        <a href="{{ route('resepsionis.home') }}" class="text-gray-600 hover:underline">Kembali</a>
      </div>
    </form>
  </div>
</section>
@endsection
