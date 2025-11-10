@extends('layouts.admin.main')

@section('title', 'Tambah Pet - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-2xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">Tambah Pet</h2>

    {{-- Handling Error --}}
    @if(session('danger'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3 text-center text-sm">{{ session('danger') }}</div>
    @endif
    @if($errors->any())
      <div class="bg-red-50 border border-red-300 text-red-700 p-3 rounded mb-3 text-sm">
        <ul class="list-disc ml-4">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.pet.store') }}" class="grid md:grid-cols-2 gap-4">
      @csrf
      <div>
        <label class="block mb-1 text-sm font-semibold">Nama Pet</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold">Warna / Tanda</label>
        <input type="text" name="warna_tanda" value="{{ old('warna_tanda') }}" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border rounded-lg px-3 py-2">
          <option value="M" {{ old('jenis_kelamin')=='M'?'selected':'' }}>Jantan</option>
          <option value="F" {{ old('jenis_kelamin')=='F'?'selected':'' }}>Betina</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold">Pemilik</label>
        <select name="idpemilik" class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Pemilik --</option>
          @foreach($pemilikList as $p)
            <option value="{{ $p->idpemilik }}" {{ old('idpemilik')==$p->idpemilik?'selected':'' }}>
              {{ $p->nama }} ({{ $p->email }})
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold">Ras Hewan</label>
        <select name="idras_hewan" class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Ras --</option>
          @foreach($rasList as $r)
            <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan')==$r->idras_hewan?'selected':'' }}>
              {{ $r->nama_ras }} - {{ $r->nama_jenis_hewan }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.pet.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
