@extends('layouts.dokter')

@section('title', 'Detail Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10 px-6">
  <div class="max-w-5xl mx-auto">

    {{-- FLASH MESSAGE --}}
    @if (session('ok'))
      <div class="mb-4 px-4 py-2 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-sm">
        {{ session('ok') }}
      </div>
    @endif

    {{-- HEADER --}}
    <h1 class="text-2xl font-bold text-[#002080] mb-3">
      🩺 Detail Rekam Medis #{{ $rekam->idrekam_medis }}
    </h1>
    <p class="text-gray-600 mb-6">
      <b>Pet:</b> {{ $rekam->nama_pet }} —
      <b>Pemilik:</b> {{ $rekam->nama_pemilik }} <br>
      <b>Dibuat:</b> {{ \Carbon\Carbon::parse($rekam->created_at)->format('d M Y, H:i') }}
    </p>

    {{-- RINGKASAN KLINIS (VIEW ONLY) --}}
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-8">
      <h3 class="font-semibold text-[#002080] mb-4 text-lg">🧾 Ringkasan Klinis</h3>
      <div class="grid md:grid-cols-3 gap-4">
        <div class="md:col-span-3">
          <label class="font-semibold">Anamnesa</label>
          <textarea readonly class="w-full border rounded-lg p-2 bg-gray-50 mt-1">{{ $rekam->anamnesa }}</textarea>
        </div>
        <div class="md:col-span-3">
          <label class="font-semibold">Temuan Klinis</label>
          <textarea readonly class="w-full border rounded-lg p-2 bg-gray-50 mt-1">{{ $rekam->temuan_klinis }}</textarea>
        </div>
        <div class="md:col-span-3">
          <label class="font-semibold">Diagnosa</label>
          <textarea readonly class="w-full border rounded-lg p-2 bg-gray-50 mt-1">{{ $rekam->diagnosa }}</textarea>
        </div>
      </div>
    </div>

    {{-- FORM TAMBAH TINDAKAN TERAPI --}}
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-8">
      <h3 class="font-semibold text-[#002080] mb-4 text-lg">➕ Tambah Tindakan Terapi</h3>
      <form method="POST" action="{{ route('dokter.rekam-medis.tindakan.store', $rekam->idrekam_medis) }}" class="space-y-4">
        @csrf

        <div>
          <label class="font-medium text-gray-700">Kode Tindakan</label>
          <select name="idkode_tindakan_terapi"
                  class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-[#002080]/40 text-sm">
            <option value="">-- Pilih tindakan --</option>
            @foreach ($masterTindakan as $mt)
              <option value="{{ $mt->idkode_tindakan_terapi }}" {{ old('idkode_tindakan_terapi') == $mt->idkode_tindakan_terapi ? 'selected' : '' }}>
                {{ $mt->kode }} — {{ $mt->deskripsi_tindakan_terapi }} ({{ $mt->nama_kategori_klinis }})
              </option>
            @endforeach
          </select>
          @error('idkode_tindakan_terapi')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="font-medium text-gray-700">Catatan (opsional)</label>
          <textarea name="detail"
                    class="w-full border rounded-lg p-2 mt-1 focus:ring-2 focus:ring-[#002080]/40 text-sm"
                    rows="2">{{ old('detail') }}</textarea>
          @error('detail')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex justify-end">
          <button type="submit"
                  class="bg-[#002080] hover:bg-[#00175a] text-white px-5 py-2 rounded-lg text-sm font-medium">
            Simpan Tindakan
          </button>
        </div>
      </form>
    </div>

    {{-- TINDAKAN TERAPI (LIST + EDIT CATATAN) --}}
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
      <h3 class="font-semibold text-[#002080] mb-4 text-lg">💊 Tindakan Terapi</h3>
      @if ($detailTindakan->isEmpty())
        <p class="text-gray-500">Belum ada tindakan untuk rekam medis ini.</p>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm border border-gray-200">
            <thead class="bg-[#002080] text-white">
              <tr>
                <th class="px-3 py-2">Kode</th>
                <th class="px-3 py-2">Deskripsi</th>
                <th class="px-3 py-2">Kategori Klinis</th>
                <th class="px-3 py-2">Catatan</th>
                <th class="px-3 py-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detailTindakan as $t)
                <tr class="border-b hover:bg-gray-50 transition align-top">
                  <td class="px-3 py-2">{{ $t->kode }}</td>
                  <td class="px-3 py-2">{{ $t->deskripsi_tindakan_terapi }}</td>
                  <td class="px-3 py-2">{{ $t->nama_kategori_klinis }}</td>

                  {{-- FORM EDIT CATATAN PER BARIS --}}
                  <td class="px-3 py-2">
                    <form method="POST"
                          action="{{ route('dokter.rekam-medis.tindakan.update', [$rekam->idrekam_medis, $t->iddetail_rekam_medis]) }}"
                          class="flex flex-col gap-2">
                      @csrf
                      @method('PUT')
                      <textarea name="detail"
                                class="w-full border rounded-lg p-1 text-xs focus:ring-2 focus:ring-[#002080]/40"
                                rows="2">{{ old('detail', $t->detail) }}</textarea>
                  </td>
                  <td class="px-3 py-2 align-top">
                      <button type="submit"
                              class="bg-[#002080] hover:bg-[#00175a] text-white px-3 py-1 rounded text-xs font-medium">
                        Simpan
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    {{-- BACK LINK --}}
    <div class="mt-8 text-center">
      <a href="{{ route('dokter.rekam-medis.index') }}"
         class="inline-block text-[#002080] hover:underline font-semibold">
         ← Kembali ke Daftar Rekam Medis
      </a>
    </div>
  </div>
</section>
@endsection
