@extends('layouts.dokter')

@section('title', 'Detail Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10 px-6">

  <div class="max-w-5xl mx-auto">
    {{-- HEADER --}}
    <h1 class="text-2xl font-bold text-[#002080] mb-3">
      🩺 Detail Rekam Medis #{{ $rekam->idrekam_medis }}
    </h1>
    <p class="text-gray-600 mb-6">
      <b>Pet:</b> {{ $rekam->nama_pet }} —
      <b>Pemilik:</b> {{ $rekam->nama_pemilik }} <br>
      <b>Dibuat:</b> {{ $rekam->created_at->format('d M Y, H:i') }}
    </p>

    {{-- RINGKASAN KLINIS --}}
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

    {{-- TINDAKAN TERAPI --}}
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
                <th class="px-3 py-2">Kategori</th>
                <th class="px-3 py-2">Klinis</th>
                <th class="px-3 py-2">Catatan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detailTindakan as $t)
                <tr class="border-b hover:bg-gray-50 transition">
                  <td class="px-3 py-2">{{ $t->kode }}</td>
                  <td class="px-3 py-2">{{ $t->deskripsi_tindakan_terapi }}</td>
                  <td class="px-3 py-2">{{ $t->nama_kategori }}</td>
                  <td class="px-3 py-2">{{ $t->nama_kategori_klinis }}</td>
                  <td class="px-3 py-2">{{ $t->detail }}</td>
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
