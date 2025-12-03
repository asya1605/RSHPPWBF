@extends('layouts.admin.main')
@section('title', 'Tambah Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-4xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-1 text-center">Tambah Rekam Medis</h2>
    <p class="text-xs text-gray-500 mb-5 text-center">
      Lengkapi data rekam medis sesuai hasil pemeriksaan.
    </p>

    {{-- Error Handling --}}
    @if(session('danger'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3 text-center text-sm">
        {{ session('danger') }}
      </div>
    @endif

    @if($errors->any())
      <div class="bg-red-50 border border-red-300 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc ml-4 space-y-1">
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.rekam-medis.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-5">
      @csrf

      {{-- Reservasi Dokter --}}
      <div class="md:col-span-2">
        <label for="select-reservasi" class="block text-sm font-semibold mb-1">
          Reservasi Dokter (Opsional)
        </label>
        <select
          name="idreservasi_dokter"
          id="select-reservasi"
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 shadow-sm focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
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
        <p class="mt-1 text-[11px] text-gray-400">
          Jika dipilih, nama hewan dan dokter akan terisi otomatis sesuai reservasi.
        </p>
      </div>

      {{-- Nama Hewan --}}
      <div>
        <label for="select-pet" class="block text-sm font-semibold mb-1">
          Nama Hewan <span class="text-red-500">*</span>
        </label>
        <select
          name="idpet"
          id="select-pet"
          required
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 shadow-sm focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
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
      <div>
        <label for="select-dokter" class="block text-sm font-semibold mb-1">
          Dokter Pemeriksa <span class="text-red-500">*</span>
        </label>
        <select
          name="dokter_pemeriksa"
          id="select-dokter"
          required
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 shadow-sm focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
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
      <div>
        <label for="anamnesa" class="block text-sm font-semibold mb-1">Anamnesa</label>
        <textarea
          name="anamnesa"
          id="anamnesa"
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 shadow-sm h-24 resize-y focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
          placeholder="Keluhan utama, riwayat penyakit, pola makan, dll."
        >{{ old('anamnesa') }}</textarea>
      </div>

      {{-- Temuan Klinis --}}
      <div>
        <label for="temuan_klinis" class="block text-sm font-semibold mb-1">Temuan Klinis</label>
        <textarea
          name="temuan_klinis"
          id="temuan_klinis"
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 shadow-sm h-24 resize-y focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
          placeholder="Hasil pemeriksaan fisik, vital sign, dan temuan lainnya."
        >{{ old('temuan_klinis') }}</textarea>
      </div>

      {{-- Diagnosa --}}
      <div class="md:col-span-2">
        <label for="diagnosa" class="block text-sm font-semibold mb-1">
          Diagnosa <span class="text-red-500">*</span>
        </label>
        <textarea
          name="diagnosa"
          id="diagnosa"
          required
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 shadow-sm h-24 resize-y focus:border-[#002080] focus:outline-none focus:ring-2 focus:ring-[#002080]/20 transition"
          placeholder="Tuliskan diagnosa utama dan diagnosa banding bila diperlukan."
        >{{ old('diagnosa') }}</textarea>
      </div>

      {{-- BUTTONS --}}
      <div class="md:col-span-2 flex items-center justify-between pt-2">
        <a
          href="{{ route('admin.rekam-medis.index') }}"
          class="text-xs sm:text-sm text-gray-500 hover:text-gray-800"
        >
          ← Batal, kembali ke daftar
        </a>
        <button
          type="submit"
          class="inline-flex items-center rounded-lg bg-[#002080] px-4 py-2 text-xs sm:text-sm font-medium text-white shadow-sm hover:bg-[#00185e] transition"
        >
          Simpan Rekam Medis
        </button>
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
