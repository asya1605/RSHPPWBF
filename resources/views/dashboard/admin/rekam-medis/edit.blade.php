@extends('layouts.admin.main')
@section('title', 'Edit Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-4xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Rekam Medis</h2>

    {{-- Alert Error --}}
    @if(session('danger'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3 text-center text-sm">
        {{ session('danger') }}
      </div>
    @endif

    @if($errors->any())
      <div class="bg-red-50 border border-red-300 text-red-700 p-3 rounded mb-3 text-sm">
        <ul class="list-disc ml-4">
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST"
          action="{{ route('admin.rekam-medis.update', $item->idrekam_medis) }}"
          class="grid md:grid-cols-2 gap-4">
      @csrf
      @method('PUT')

      {{-- Reservasi Dokter --}}
      <div>
        <label class="block text-sm font-semibold mb-1">Reservasi Dokter (ID)</label>
        <select name="idreservasi_dokter" id="select-reservasi"
                class="w-full border rounded-lg px-3 py-2">
          <option value="">-- Pilih Reservasi --</option>
          @foreach($reservasiList as $r)
            <option
              value="{{ $r->idreservasi_dokter }}"
              data-pet="{{ $r->idpet }}"
              data-dokter="{{ $r->iddokter }}"
              {{ old('idreservasi_dokter', $item->idreservasi_dokter) == $r->idreservasi_dokter ? 'selected' : '' }}
            >
              #{{ $r->idreservasi_dokter }} — {{ $r->nama_hewan }} — {{ $r->waktu_daftar }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Nama Hewan --}}
      <div>
        <label class="block text-sm font-semibold mb-1">Nama Hewan</label>
        <select name="idpet" id="select-pet"
                class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Hewan --</option>
          @foreach($pet as $p)
            <option value="{{ $p->idpet }}"
              {{ old('idpet', $item->idpet) == $p->idpet ? 'selected' : '' }}>
              {{ $p->nama }} (ID: {{ $p->idpet }})
            </option>
          @endforeach
        </select>
      </div>

      {{-- Dokter Pemeriksa --}}
      <div>
        <label class="block text-sm font-semibold mb-1">Dokter Pemeriksa</label>
        <select name="dokter_pemeriksa" id="select-dokter"
                class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Dokter --</option>
          @foreach($dokter as $d)
            <option value="{{ $d->iduser }}"
              {{ old('dokter_pemeriksa', $item->dokter_pemeriksa) == $d->iduser ? 'selected' : '' }}>
              {{ $d->nama }} ({{ $d->email }})
            </option>
          @endforeach
        </select>
      </div>

      {{-- Anamnesa --}}
      <div>
        <label class="block text-sm font-semibold mb-1">Anamnesa</label>
        <textarea name="anamnesa"
                  class="w-full border rounded-lg px-3 py-2 h-20">{{ old('anamnesa', $item->anamnesa) }}</textarea>
      </div>

      {{-- Temuan Klinis --}}
      <div>
        <label class="block text-sm font-semibold mb-1">Temuan Klinis</label>
        <textarea name="temuan_klinis"
                  class="w-full border rounded-lg px-3 py-2 h-20">{{ old('temuan_klinis', $item->temuan_klinis) }}</textarea>
      </div>

      {{-- Diagnosa --}}
      <div>
        <label class="block text-sm font-semibold mb-1">Diagnosa</label>
        <textarea name="diagnosa"
                  class="w-full border rounded-lg px-3 py-2 h-20" required>{{ old('diagnosa', $item->diagnosa) }}</textarea>
      </div>

      {{-- BUTTONS --}}
      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.rekam-medis.index') }}"
           class="text-gray-600 hover:text-gray-800 text-sm">
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

<script>
  const selectReservasi = document.getElementById('select-reservasi');
  const selectPet       = document.getElementById('select-pet');
  const selectDokter    = document.getElementById('select-dokter');

  function syncFromReservasi() {
    const opt = selectReservasi.selectedOptions[0];
    if (!opt) return;

    const petId    = opt.dataset.pet;
    const dokterId = opt.dataset.dokter;

    if (petId)    selectPet.value    = petId;
    if (dokterId) selectDokter.value = dokterId;
  }

  // 🔁 Saat user mengubah reservasi
  selectReservasi.addEventListener('change', syncFromReservasi);

  // 🔁 Saat halaman edit pertama kali dibuka
  document.addEventListener('DOMContentLoaded', function () {
    syncFromReservasi();
  });
</script>
@endsection