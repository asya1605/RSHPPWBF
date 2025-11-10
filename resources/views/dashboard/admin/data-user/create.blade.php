@extends('layouts.admin.main')

@section('title', 'Tambah User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-xl font-bold text-[#002080] mb-6 text-center">➕ Tambah User Baru</h2>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.data-user.store') }}" method="POST" class="space-y-5">
      @csrf
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('admin.data-user.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded text-sm font-medium transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
