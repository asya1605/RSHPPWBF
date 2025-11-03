@extends('layouts.admin')
@section('title', 'Tambah Pemilik - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">Tambah Pemilik</h2>

    {{-- Handling & Validation --}}
    @if(session('danger'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center">{{ session('danger') }}</div>
    @endif
    @if ($errors->any())
      <div class="bg-red-50 border border-red-300 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc ml-5">
          @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.pemilik.store') }}" class="space-y-4">
      @csrf
      <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Pemilik" class="w-full border rounded-lg px-3 py-2" required>
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded-lg px-3 py-2" required>
      <input type="password" name="password" placeholder="Password" class="w-full border rounded-lg px-3 py-2" required>
      <input type="text" name="no_wa" value="{{ old('no_wa') }}" placeholder="Nomor WhatsApp" class="w-full border rounded-lg px-3 py-2" required>
      <textarea name="alamat" placeholder="Alamat" class="w-full border rounded-lg px-3 py-2" required>{{ old('alamat') }}</textarea>

      <div class="flex justify-between">
        <a href="{{ route('admin.pemilik.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Kembali</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">Simpan</button>
      </div>
    </form>
  </div>
</section>
@endsection
