@extends('layouts.admin.main')

@section('title', 'Edit Ras Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-5 text-center">✏️ Edit Ras Hewan</h2>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.ras-hewan.update', $ras->idras_hewan) }}" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label for="nama_ras" class="block text-sm font-semibold text-gray-700 mb-1">
          Nama Ras Hewan
        </label>
        <input id="nama_ras" type="text" name="nama_ras"
               value="{{ old('nama_ras', $ras->nama_ras) }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/30"
               required>
        @error('nama_ras')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="idjenis_hewan" class="block text-sm font-semibold text-gray-700 mb-1">
          Jenis Hewan
        </label>
        <select id="idjenis_hewan" name="idjenis_hewan" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/30">
          @foreach($jenisList as $j)
            <option value="{{ $j->idjenis_hewan }}" {{ $j->idjenis_hewan == $ras->idjenis_hewan ? 'selected' : '' }}>
              {{ $j->nama_jenis_hewan }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('admin.ras-hewan.index') }}"
           class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit"
                class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded text-sm font-medium transition">
          Update
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
