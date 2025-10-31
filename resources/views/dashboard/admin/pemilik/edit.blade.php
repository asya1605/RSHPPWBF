@extends('layouts.admin')

@section('title', 'Edit Pemilik - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Pemilik</h2>

    {{-- Error Validasi --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Pesan Sukses --}}
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-2 rounded mb-3 text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- FORM UPDATE --}}
<form action="{{ route('admin.pemilik.update', $pemilik->idpemilik) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT') {{-- wajib biar Laravel ubah POST jadi PUT --}}

    <div>
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $pemilik->nama) }}" 
               class="border rounded w-full px-3 py-2" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $pemilik->email) }}" 
               class="border rounded w-full px-3 py-2" required>
    </div>

    <div>
        <label>No. WhatsApp</label>
        <input type="text" name="no_wa" value="{{ old('no_wa', $pemilik->no_wa) }}" 
               class="border rounded w-full px-3 py-2">
    </div>

    <div>
        <label>Alamat</label>
        <textarea name="alamat" class="border rounded w-full px-3 py-2" required>
            {{ old('alamat', $pemilik->alamat) }}
        </textarea>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('admin.pemilik.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">
            ← Batal
        </a>
        <button type="submit" 
                class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
            Simpan Perubahan
        </button>
    </div>
</form>
  </div>
</section>
@endsection
