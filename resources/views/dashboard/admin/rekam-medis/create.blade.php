@extends('layouts.admin.main')
@section('title', 'Tambah Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-4xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">Tambah Rekam Medis</h2>

    {{-- Error Handling --}}
    @if(session('danger'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3 text-center text-sm">{{ session('danger') }}</div>
    @endif
    @if($errors->any())
      <div class="bg-red-50 border border-red-300 text-red-700 p-3 rounded mb-3 text-sm">
        <ul class="list-disc ml-4">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.rekam-medis.store') }}" class="grid md:grid-cols-2 gap-4">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-1">Reservasi Dokter (ID)</label>
        <input type="number" name="idreservasi_dokter" value="{{ old('idreservasi_dokter') }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Nama Hewan</label>
        <select name="idpet" class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Hewan --</option>
          @foreach($pet as $p)
            <option value="{{ $p->idpet }}" {{ old('idpet')==$p->idpet?'selected':'' }}>{{ $p->nama }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Dokter Pemeriksa</label>
        <select name="dokter_pemeriksa" class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Dokter --</option>
          @foreach($dokter as $d)
            <option value="{{ $d->iduser }}" {{ old('dokter_pemeriksa')==$d->iduser?'selected':'' }}>{{ $d->username }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Anamnesa</label>
        <textarea name="anamnesa" class="w-full border rounded-lg px-3 py-2 h-20">{{ old('anamnesa') }}</textarea>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Temuan Klinis</label>
        <textarea name="temuan_klinis" class="w-full border rounded-lg px-3 py-2 h-20">{{ old('temuan_klinis') }}</textarea>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Diagnosa</label>
        <textarea name="diagnosa" class="w-full border rounded-lg px-3 py-2 h-20" required>{{ old('diagnosa') }}</textarea>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Terapi</label>
        <textarea name="terapi" class="w-full border rounded-lg px-3 py-2 h-20">{{ old('terapi') }}</textarea>
      </div>

      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.rekam-medis.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">Simpan</button>
      </div>
    </form>
  </div>
</section>
@endsection
