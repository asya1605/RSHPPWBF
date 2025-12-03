@extends('layouts.admin.main')

@section('title', 'Jadikan Role Aktif - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center px-4 py-10">
  <div class="bg-white px-7 py-6 rounded-2xl shadow-lg w-full max-w-md border border-gray-200">

    {{-- Header --}}
    <div class="text-center mb-4">
      <h2 class="text-xl font-bold text-[#002080]">Jadikan Role Aktif</h2>
      <p class="text-xs text-gray-500 mt-1">
        Role akan diaktifkan kembali untuk user ini dan dapat digunakan untuk akses sistem.
      </p>
    </div>

    {{-- Info User & Role --}}
    <div class="flex items-center justify-center gap-3 mb-5">
      <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-[#002080] border border-blue-100">
        ID User: #{{ $iduser }}
      </span>
      <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-slate-50 text-slate-700 border border-slate-200">
        ID Role: #{{ $idrole }}
      </span>
    </div>

    <p class="text-gray-700 text-center mb-6 leading-relaxed text-sm">
      Apakah kamu yakin ingin menjadikan role ini
      <span class="font-semibold text-emerald-600">aktif kembali</span>
      untuk user tersebut?
    </p>

    <form method="POST" action="{{ route('admin.role-user.setActiveConfirm') }}" class="mt-2">
      @csrf
      <input type="hidden" name="iduser" value="{{ $iduser }}">
      <input type="hidden" name="idrole" value="{{ $idrole }}">

      <div class="flex justify-between items-center gap-3">
        <a
          href="{{ route('admin.role-user.index') }}"
          class="inline-flex justify-center w-1/2 px-4 py-2.5 rounded-lg border border-gray-300 text-xs md:text-sm
                 font-medium text-gray-700 hover:bg-gray-100 transition"
        >
          Batal
        </a>

        <button
          type="submit"
          class="inline-flex justify-center w-1/2 px-4 py-2.5 rounded-lg bg-emerald-600 hover:bg-emerald-700
                 text-white text-xs md:text-sm font-semibold shadow-sm transition"
        >
          ✅ Ya, Jadikan Aktif
        </button>
      </div>
    </form>

  </div>
</section>
@endsection
