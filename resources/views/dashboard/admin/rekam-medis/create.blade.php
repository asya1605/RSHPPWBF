@extends('layouts.admin.main')
@section('title', 'Tambah Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center py-10 px-4">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-4xl border border-gray-200 px-8 py-7">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-3 mb-5 border-b border-gray-100 pb-4">
      <div>
        <h2 class="text-xl font-bold text-[#002080]">➕ Tambah Rekam Medis</h2>
        <p class="text-xs text-gray-500 mt-1">
          Lengkapi data rekam medis sesuai hasil pemeriksaan hewan di RSHP UNAIR.
        </p>
      </div>
    </div>

    {{-- Flash & Error --}}
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
    <form
      method="POST"
      action="{{ route('admin.rekam-medis.store') }}"
      class="grid grid-cols-1 md:grid-cols-2 gap-5"
    >
      @csrf

      {{-- Reservasi Dokter (opsional) --}}
      <div class="md:col-span-2 space-y-1">
        <label for="select-reservasi" class="block text-sm font-semibold text-gray-700">
          Reservasi Dokter <span class="text-[11px] text-gray-400">(opsional)</span>
        </label>
        <select
          name="idreservasi_dokter"
          id="select-reservasi"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 text-gray-700 shadow-sm bg-white
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
          <option value="">-- Pilih Reservasi --</option>
          @foreach($reservasiList as $r)
            <option
              value="{{ $r->idreservasi_dokter }}"
              data-pet="{{ $r->idpet }}"
              data-dokter="{{ $r->iddokter }}"
              {{ old('idreservasi_dokter') == $r->idreservasi_dokter ? 'selected' : '' }}
            >
              #{{ $r->idreservasi_dokter }} — {{ $r->nama_hewan }} — {{ $r->waktu_daftar }}
            </option>
          @endforeach
        </select>
        <p class="text-[11px] text-gray-400">
          Jika dipilih, nama hewan dan dokter akan terisi otomatis sesuai data reservasi.
        </p>
      </div>

      {{-- Nama Hewan --}}
      <div class="space-y-1">
        <label for="select-pet" class="block text-sm font-semibold text-gray-700">
          Nama Hewan <span class="text-red-500">*</span>
        </label>
        <select
          name="idpet"
          id="select-pet"
          required
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 text-gray-700 shadow-sm bg-white
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
          <option value="">-- Pilih Hewan --</option>
          @foreach($pet as $p)
            <option value="{{ $p->idpet }}" {{ old('idpet') == $p->idpet ? 'selected' : '' }}>
              {{ $p->nama }} (ID: {{ $p->idpet }})
            </option>
          @endforeach
        </select>
      </div>

      {{-- Dokter Pemeriksa --}}
      <div class="space-y-1">
        <label for="select-dokter" class="block text-sm font-semibold text-gray-700">
          Dokter Pemeriksa <span class="text-red-500">*</span>
        </label>
        <select
          name="dokter_pemeriksa"
          id="select-dokter"
          required
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 text-gray-700 shadow-sm bg-white
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
        >
          <option value="">-- Pilih Dokter --</option>
          @foreach($dokter as $d)
            <option value="{{ $d->iduser }}" {{ old('dokter_pemeriksa') == $d->iduser ? 'selected' : '' }}>
              {{ $d->nama }} ({{ $d->email }})
            </option>
          @endforeach
        </select>
      </div>

      {{-- Anamnesa --}}
      <div class="space-y-1">
        <label for="anamnesa" class="block text-sm font-semibold text-gray-700">
          Anamnesa
        </label>
        <textarea
          name="anamnesa"
          id="anamnesa"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 text-gray-700 shadow-sm h-24 resize-y
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          placeholder="Keluhan utama, riwayat penyakit, pola makan, dll."
        >{{ old('anamnesa') }}</textarea>
      </div>

      {{-- Temuan Klinis --}}
      <div class="space-y-1">
        <label for="temuan_klinis" class="block text-sm font-semibold text-gray-700">
          Temuan Klinis
        </label>
        <textarea
          name="temuan_klinis"
          id="temuan_klinis"
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 text-gray-700 shadow-sm h-24 resize-y
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          placeholder="Hasil pemeriksaan fisik, vital sign, dan temuan lainnya."
        >{{ old('temuan_klinis') }}</textarea>
      </div>

      {{-- Diagnosa --}}
      <div class="md:col-span-2 space-y-1">
        <label for="diagnosa" class="block text-sm font-semibold text-gray-700">
          Diagnosa <span class="text-red-500">*</span>
        </label>
        <textarea
          name="diagnosa"
          id="diagnosa"
          required
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm
                 text-gray-700 shadow-sm h-24 resize-y
                 focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
          placeholder="Tuliskan diagnosa utama dan diagnosa banding bila diperlukan."
        >{{ old('diagnosa') }}</textarea>
      </div>

      {{-- Tombol Aksi --}}
      <div class="md:col-span-2 flex items-center justify-between pt-3">
        <a
          href="{{ route('admin.rekam-medis.index') }}"
          class="inline-flex items-center text-xs md:text-sm text-gray-600 hover:text-gray-800"
        >
          ← Batal &amp; kembali ke daftar
        </a>

        <div class="flex gap-2">
          <a
            href="{{ route('admin.rekam-medis.index') }}"
            class="inline-flex items-center px-4 py-2.5 rounded-lg border border-gray-300 text-xs md:text-sm
                   font-medium text-gray-700 hover:bg-gray-100"
          >
            Batal
          </a>
          <button
            type="submit"
            class="inline-flex items-center px-5 py-2.5 rounded-lg bg-[#002080] hover:bg-[#00185e]
                   text-white text-xs md:text-sm font-semibold shadow-sm transition"
          >
            Simpan Rekam Medis
          </button>
        </div>
      </div>
    </form>

  </div>
</section>

<script>
  const selectReservasi = document.getElementById('select-reservasi');
  const selectPet       = document.getElementById('select-pet');
  const selectDokter    = document.getElementById('select-dokter');

  if (selectReservasi) {
    selectReservasi.addEventListener('change', function () {
      const opt = this.selectedOptions[0];
      if (!opt) return;

      const petId    = opt.dataset.pet;
      const dokterId = opt.dataset.dokter;

      if (petId)    selectPet.value    = petId;
      if (dokterId) selectDokter.value = dokterId;
    });
  }
</script>
@endsection
