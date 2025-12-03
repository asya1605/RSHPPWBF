@extends('layouts.admin.main')
@section('title', 'Edit Pet - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center py-10 px-4">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-3xl border border-gray-200 px-8 py-7">
    
    {{-- Header --}}
    <div class="flex items-start justify-between gap-3 mb-5 border-b border-gray-100 pb-4">
      <div>
        <h2 class="text-xl font-bold text-[#002080]">✏️ Edit Data Pet</h2>
        <p class="text-xs text-gray-500 mt-1">
          Perbarui informasi hewan pasien yang terdaftar di RSHP UNAIR.
        </p>
      </div>
      <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-[#002080] border border-blue-100">
        ID Pet: #{{ $pet->idpet }}
      </span>
    </div>

    {{-- Alert --}}
    @if(session('danger'))
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-lg mb-3 text-sm text-center">
        {{ session('danger') }}
      </div>
    @endif

    @if($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
        <p class="font-semibold mb-1">Periksa kembali data berikut:</p>
        <ul class="list-disc ml-5 space-y-0.5">
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.pet.update', $pet->idpet) }}" method="POST" class="grid md:grid-cols-2 gap-5">
      @csrf
      @method('PUT')

      {{-- Nama Pet --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">Nama Pet <span class="text-red-500">*</span></label>
        <input
          type="text"
          name="nama"
          value="{{ old('nama', $pet->nama) }}"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          required
        >
      </div>

      {{-- Tanggal Lahir --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">Tanggal Lahir</label>
        <input
          type="date"
          name="tanggal_lahir"
          value="{{ old('tanggal_lahir', $pet->tanggal_lahir) }}"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
      </div>

      {{-- Warna / Tanda --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">Warna / Tanda</label>
        <input
          type="text"
          name="warna_tanda"
          value="{{ old('warna_tanda', $pet->warna_tanda) }}"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                 placeholder:text-gray-400"
          placeholder="Contoh: Putih dengan belang cokelat"
        >
      </div>

      {{-- Jenis Kelamin --}}
      <div class="space-y-1">
        <label class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
        <select
          name="jenis_kelamin"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
          <option value="M" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'M' ? 'selected' : '' }}>Jantan</option>
          <option value="F" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'F' ? 'selected' : '' }}>Betina</option>
        </select>
      </div>

      {{-- Pemilik --}}
      <div class="space-y-1 md:col-span-1">
        <label class="block text-sm font-semibold text-gray-700">Pemilik</label>
        <select
          name="idpemilik"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
          @foreach($pemilikList as $p)
            <option value="{{ $p->idpemilik }}" {{ old('idpemilik', $pet->idpemilik) == $p->idpemilik ? 'selected' : '' }}>
              {{ $p->nama }} ({{ $p->email }})
            </option>
          @endforeach
        </select>
      </div>

      {{-- Ras Hewan --}}
      <div class="space-y-1 md:col-span-1">
        <label class="block text-sm font-semibold text-gray-700">Ras Hewan</label>
        <select
          name="idras_hewan"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
          @foreach($rasList as $r)
            <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan', $pet->idras_hewan) == $r->idras_hewan ? 'selected' : '' }}>
              {{ $r->nama_ras }} — {{ $r->nama_jenis_hewan }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Tombol Aksi --}}
      <div class="md:col-span-2 flex items-center justify-between pt-4">
        <a
          href="{{ route('admin.pet.index') }}"
          class="inline-flex items-center text-xs md:text-sm text-gray-600 hover:text-gray-800"
        >
          ← Batal &amp; kembali ke daftar
        </a>

        <div class="flex gap-2">
          <a
            href="{{ route('admin.pet.index') }}"
            class="inline-flex items-center px-4 py-2.5 rounded-lg border border-gray-300 text-xs md:text-sm
                   font-medium text-gray-700 hover:bg-gray-100"
          >
            Batal
          </a>
          <button
            type="submit"
            class="inline-flex items-center px-5 py-2.5 rounded-lg bg-[#002080] hover:bg-[#00185e]
                   text-white text-xs md:text-sm font-semibold shadow-sm"
          >
            Simpan Perubahan
          </button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
