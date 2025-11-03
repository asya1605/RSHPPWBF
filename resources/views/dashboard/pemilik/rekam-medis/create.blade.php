@extends('layouts.pemilik')
@section('title', 'Kirim Keluhan Awal')

@section('content')
<section class="min-h-[80vh] py-10 px-6 bg-[#f5f7ff]">
  <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl border border-gray-200 p-8">
    <h2 class="text-2xl font-bold text-[#002080] mb-4">💬 Kirim Keluhan Awal</h2>

    <form method="POST" action="{{ route('pemilik.rekam.store') }}" class="space-y-5">
      @csrf

      {{-- Pilih Pet --}}
      <div>
        <label class="font-semibold text-gray-700">Pilih Hewan</label>
        <select name="idpet" class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40">
          <option value="">-- Pilih Hewan --</option>
          @foreach($pets as $p)
            <option value="{{ $p->idpet }}">{{ $p->nama }}</option>
          @endforeach
        </select>
        @error('idpet') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Keluhan --}}
      <div>
        <label class="font-semibold text-gray-700">Keluhan</label>
        <textarea name="keluhan" class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40"
                  rows="4" placeholder="Tuliskan keluhan hewan Anda...">{{ old('keluhan') }}</textarea>
        @error('keluhan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('pemilik.rekam.index') }}" class="text-gray-500 hover:underline">← Kembali</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-6 py-2 rounded-lg font-medium">Kirim</button>
      </div>
    </form>
  </div>
</section>
@endsection
