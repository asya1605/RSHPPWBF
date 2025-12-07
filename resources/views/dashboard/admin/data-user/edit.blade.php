@extends('layouts.admin.main')

@section('title', 'Edit User - RSHP UNAIR')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex justify-center items-center px-4 py-10">
  <div class="w-full max-w-2xl">
    
    {{-- BREADCRUMB --}}
    <div class="mb-6 animate-slideDown">
      <div class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('admin.data-user.index') }}" class="hover:text-[#002080] transition-colors">
          <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          Data User
        </a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-[#002080] font-semibold">Edit User</span>
      </div>
    </div>

    {{-- MAIN FORM CARD --}}
    <div class="glass rounded-3xl shadow-2xl border border-white overflow-hidden animate-fadeIn">
      
      {{-- HEADER --}}
      <div class="bg-gradient-to-r from-amber-500 to-amber-600 p-8">
        <div class="flex items-center justify-between gap-4">
          <div class="flex items-center gap-4">
            <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
              </svg>
            </div>
            <div>
              <h2 class="text-2xl font-black text-white mb-1">Edit Data User</h2>
              <p class="text-amber-100 text-sm">
                Perbarui informasi akun user di sistem RSHP UNAIR
              </p>
            </div>
          </div>
          
          {{-- User ID Badge --}}
          <div class="hidden md:block">
            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl border border-white/30">
              <p class="text-amber-100 text-xs font-semibold mb-0.5">User ID</p>
              <p class="text-white text-lg font-black">#{{ $user->iduser }}</p>
            </div>
          </div>
        </div>

        {{-- Mobile User ID Badge --}}
        <div class="md:hidden mt-4">
          <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl border border-white/30 inline-block">
            <span class="text-white text-sm font-bold">User ID: #{{ $user->iduser }}</span>
          </div>
        </div>
      </div>

      {{-- ALERTS --}}
      <div class="p-8 pb-0">
        @if(session('danger'))
          <div class="alert-danger animate-slideDown mb-6">
            <div class="flex items-center gap-3">
              <div class="bg-red-600 p-2 rounded-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <div>
                <p class="font-bold">Perhatian!</p>
                <p class="text-sm">{{ session('danger') }}</p>
              </div>
            </div>
          </div>
        @endif

        @if ($errors->any())
          <div class="alert-danger animate-slideDown mb-6">
            <div class="flex items-start gap-3">
              <div class="bg-red-600 p-2 rounded-lg flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <div class="flex-1">
                <p class="font-bold mb-2">Periksa kembali data berikut:</p>
                <ul class="space-y-1 text-sm">
                  @foreach ($errors->all() as $error)
                    <li class="flex items-start gap-2">
                      <span class="text-red-600 mt-0.5">•</span>
                      <span>{{ $error }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        @endif
      </div>

      {{-- FORM --}}
      <form method="POST" action="{{ route('admin.data-user.update', $user->iduser) }}" class="p-8 pt-4">
        @csrf
        @method('PUT')

        <div class="space-y-6">
          
          {{-- Current Data Info --}}
          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-5 border border-blue-100">
            <div class="flex items-start gap-4">
              <div class="bg-blue-600 p-2 rounded-lg flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
              </div>
              <div class="flex-1">
                <p class="font-bold text-gray-800 mb-2">Data User Saat Ini:</p>
                <div class="grid md:grid-cols-2 gap-3 text-sm">
                  <div>
                    <p class="text-gray-600 mb-0.5">Nama:</p>
                    <p class="font-semibold text-gray-900">{{ $user->nama }}</p>
                  </div>
                  <div>
                    <p class="text-gray-600 mb-0.5">Email:</p>
                    <p class="font-semibold text-gray-900">{{ $user->email }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Nama --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
              <span>Nama Lengkap</span>
              <span class="text-red-500">*</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
              </div>
              <input
                type="text"
                name="nama"
                value="{{ old('nama', $user->nama) }}"
                class="form-input"
                placeholder="Masukkan nama lengkap user"
                required
              >
            </div>
            <p class="form-hint">Perbarui nama lengkap user jika diperlukan</p>
          </div>

          {{-- Email (Read-only info) --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              <span>Email (Tidak dapat diubah)</span>
            </label>
            <div class="input-wrapper">
              <div class="input-icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
              </div>
              <input
                type="email"
                value="{{ $user->email }}"
                class="form-input bg-gray-100 cursor-not-allowed"
                disabled
                readonly
              >
            </div>
            <p class="form-hint text-amber-600">
              <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
              </svg>
              Email tidak dapat diubah setelah user dibuat
            </p>
          </div>

          {{-- Info Box --}}
          <div class="bg-gradient-to-r from-amber-50 to-orange-50 border-l-4 border-amber-500 rounded-xl p-4">
            <div class="flex gap-3">
              <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div class="text-sm text-amber-900">
                <p class="font-semibold mb-1">Catatan Penting:</p>
                <ul class="space-y-1 text-amber-800">
                  <li>• Hanya nama yang dapat diubah melalui form ini</li>
                  <li>• Untuk mereset password, gunakan tombol "Reset" di halaman daftar user</li>
                  <li>• Perubahan akan tersimpan setelah menekan tombol "Simpan Perubahan"</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
          <a
            href="{{ route('admin.data-user.index') }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 font-medium transition-colors"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali</span>
          </a>

          <div class="flex gap-3">
            <a
              href="{{ route('admin.data-user.index') }}"
              class="btn-cancel"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
              <span>Batal</span>
            </a>
            <button
              type="submit"
              class="btn-submit"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Simpan Perubahan</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

{{-- STYLES --}}
<style>
  /* Glass Effect */
  .glass {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(10px);
  }

  /* Animations */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  .animate-fadeIn { animation: fadeIn 0.6s ease-out; }
  .animate-slideDown { animation: slideDown 0.5s ease-out; }
  .animate-float { animation: float 3s ease-in-out infinite; }

  /* Form Styles */
  .form-group {
    @apply space-y-2;
  }

  .form-label {
    @apply flex items-center gap-2 text-sm font-bold text-gray-700;
  }

  .input-wrapper {
    @apply relative;
  }

  .input-icon {
    @apply absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none;
  }

  .form-input {
    @apply w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm
           focus:outline-none focus:border-amber-500 focus:ring-4 focus:ring-amber-100
           transition-all shadow-sm hover:border-gray-300;
  }

  .form-hint {
    @apply text-xs text-gray-500 mt-1;
  }

  /* Alert Styles */
  .alert-danger {
    @apply bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 
           p-4 rounded-xl shadow-md;
  }

  /* Button Styles */
  .btn-cancel {
    @apply inline-flex items-center gap-2 bg-white text-gray-700 px-6 py-3 
           rounded-xl font-bold border-2 border-gray-300 shadow-md
           hover:border-gray-400 hover:shadow-lg hover:scale-105 transition-all;
  }

  .btn-submit {
    @apply inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-amber-600 
           text-white px-6 py-3 rounded-xl font-bold shadow-lg
           hover:shadow-xl hover:scale-105 transition-all;
  }
</style>

@endsection