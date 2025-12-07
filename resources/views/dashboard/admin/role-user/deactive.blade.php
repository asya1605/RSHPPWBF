@extends('layouts.admin.main')

@section('title', 'Nonaktifkan Role - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex justify-center items-center px-4 py-10">
  <div class="w-full max-w-md">
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">

      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-rose-500 to-rose-600 p-6">
        <div class="flex items-center gap-4">
          <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl animate-float">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18 12H6m4-4H8m8 8H8m4 4a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
          </div>
          <div>
            <h2 class="text-xl font-black text-white mb-1">Nonaktifkan Role</h2>
            <p class="text-rose-100 text-xs">
              Role tetap terhubung dengan user, namun status aksesnya menjadi nonaktif.
            </p>
          </div>
        </div>
      </div>

      {{-- BODY --}}
      <div class="px-7 py-6 space-y-5">
        {{-- Info User & Role --}}
        <div class="flex flex-wrap items-center justify-center gap-3">
          <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-[#002080] border border-blue-100">
            ID User: #{{ $iduser }}
          </span>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-slate-50 text-slate-700 border border-slate-200">
            ID Role: #{{ $idrole }}
          </span>
        </div>

        {{-- Info Box --}}
        <div class="bg-gradient-to-r from-rose-50 to-red-50 border-l-4 border-rose-500 rounded-xl p-4">
          <div class="flex gap-3">
            <div class="flex-shrink-0">
              <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v3m0 4h.01M4.93 4.93l14.14 14.14M12 3a9 9 0 100 18 9 9 0 000-18z" />
              </svg>
            </div>
            <div class="text-xs text-rose-900">
              <p class="font-semibold mb-1">Konfirmasi Nonaktifkan Role</p>
              <p>
                Role akan tetap tercatat pada user, namun hak aksesnya dinonaktifkan.
                Kamu bisa mengaktifkannya kembali kapan saja.
              </p>
            </div>
          </div>
        </div>

        {{-- Text Konfirmasi --}}
        <p class="text-gray-700 text-center leading-relaxed text-sm">
          Apakah kamu yakin ingin
          <span class="font-semibold text-red-600">menonaktifkan</span>
          role ini untuk user tersebut?
        </p>

        {{-- FORM --}}
        <form method="POST" action="{{ route('admin.role-user.deactivateConfirm') }}" class="mt-2">
          @csrf
          <input type="hidden" name="iduser" value="{{ $iduser }}">
          <input type="hidden" name="idrole" value="{{ $idrole }}">

          <div class="flex justify-between items-center gap-3 pt-4 border-t border-gray-100">
            <a
              href="{{ route('admin.role-user.index') }}"
              class="btn-cancel w-1/2 justify-center"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
              </svg>
              <span>Batal</span>
            </a>

            <button
              type="submit"
              class="btn-submit-danger w-1/2 justify-center"
            >
              📴 <span>Nonaktifkan</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

{{-- Kalau sudah punya util global, style ini boleh dihapus --}}
<style>
  .glass {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(10px);
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  .btn-cancel {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-4 py-2.5 
           rounded-xl font-bold border-2 border-gray-300 shadow-md text-xs md:text-sm
           hover:border-gray-400 hover:shadow-lg hover:scale-105 transition-all;
  }

  .btn-submit-danger {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-rose-600 
           text-white px-4 py-2.5 rounded-xl font-bold shadow-lg text-xs md:text-sm
           hover:shadow-xl hover:scale-105 transition-all;
  }
</style>

@endsection
