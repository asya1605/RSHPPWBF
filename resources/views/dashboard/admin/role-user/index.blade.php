@extends('layouts.admin.main')

@section('title', 'Manajemen Role User - RSHP UNAIR')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pb-16">
  <div class="max-w-7xl mx-auto px-6 py-8">

    {{-- HEADER SECTION --}}
    <div class="glass rounded-3xl p-6 md:p-8 shadow-2xl border border-white mb-8 animate-fadeIn">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        
        {{-- Title & Description --}}
        <div>
          <div class="flex items-center gap-3 mb-3">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.89 3.31.876 2.42 2.42a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.89 1.543-.876 3.31-2.42 2.42a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.89-3.31-.876-2.42-2.42a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.89-1.543.876-3.31 2.42-2.42.996.575 2.248.05 2.573-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <h1 class="text-3xl font-black gradient-text">Manajemen Role User</h1>
          </div>
          <p class="text-gray-600 leading-relaxed max-w-2xl">
            Atur role dan hak akses user di sistem RSHP UNAIR. Tambah role baru, assign role ke user,
            serta aktif/nonaktifkan role sesuai kebutuhan.
          </p>
        </div>

        {{-- Action Toggle --}}
        <div class="flex flex-wrap gap-3">
          @if($showDeleted ?? false)
            <a href="{{ route('admin.role-user.index') }}"
               class="btn-secondary">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
              </svg>
              <span>Kembali ke Role Aktif</span>
            </a>
          @else
            <a href="{{ route('admin.role-user.index', ['show_deleted' => 1]) }}"
               class="btn-danger">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
              <span>Lihat Role Terhapus</span>
            </a>
          @endif
        </div>
      </div>
    </div>

    {{-- ALERT MESSAGE --}}
    @if(session('success'))
      <div class="alert-success animate-slideDown">
        <div class="flex items-center gap-3">
          <div class="bg-green-600 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div>
            <p class="font-bold">Berhasil!</p>
            <p class="text-sm">{{ session('success') }}</p>
          </div>
        </div>
      </div>
    @endif

    @if(session('danger'))
      <div class="alert-danger animate-slideDown">
        <div class="flex items-center gap-3">
          <div class="bg-red-600 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
          </div>
          <div>
            <p class="font-bold">Perhatian!</p>
            <p class="text-sm">{{ session('danger') }}</p>
          </div>
        </div>
      </div>
    @endif

    @if(session('info'))
      <div class="bg-blue-50 border-l-4 border-blue-500 px-4 py-3 rounded-xl shadow-md mb-6 animate-slideDown">
        <div class="flex items-center gap-3">
          <div class="bg-blue-600 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <div>
            <p class="font-bold">Info:</p>
            <p class="text-sm">{{ session('info') }}</p>
          </div>
        </div>
      </div>
    @endif

    {{-- STATISTICS CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 animate-fadeIn delay-100">
      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Total User</p>
            <p class="text-3xl font-black text-[#002080]">{{ $users->count() }}</p>
          </div>
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Total Role</p>
            <p class="text-3xl font-black text-[#002080]">{{ $roles->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">
              Status: <span class="font-semibold text-gray-800">{{ ($showDeleted ?? false) ? 'Terhapus' : 'Aktif' }}</span>
            </p>
          </div>
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7h18M6 11h12M9 15h6M9 19h6"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="glass rounded-2xl p-6 shadow-xl border border-white">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm mb-1">Management</p>
            <p class="text-lg font-bold text-gray-800">Role & Hak Akses</p>
          </div>
          <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.5 6a7.5 7.5 0 017.5 7.5V21h-3v-7.5a4.5 4.5 0 00-9 0V21h-3v-7.5A7.5 7.5 0 0110.5 6z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- 🔹 Bagian Atas: 2 Kolom (Assign Role, Tambah & Daftar Role) --}}
    <div class="grid lg:grid-cols-2 gap-6 mb-8 animate-fadeIn delay-200">
      {{-- Kolom kiri: Assign Role ke User --}}
      <div class="space-y-4">
        <div class="glass px-5 py-5 rounded-2xl shadow-xl border border-white">
          <h2 class="text-sm font-semibold text-[#002080] mb-3 flex items-center gap-2">
            🧩 Assign Role ke User
          </h2>

          <form action="{{ route('admin.role-user.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="space-y-3">
              <div class="form-group">
                <label class="block text-xs font-semibold text-gray-700 mb-1">
                  Pilih User <span class="text-red-500">*</span>
                </label>
                <select
                  name="iduser"
                  required
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white
                         focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
                >
                  <option value="">-- pilih user --</option>
                  @foreach($users as $u)
                    <option value="{{ $u->iduser }}">
                      {{ $u->nama }} ({{ $u->email }})
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label class="block text-xs font-semibold text-gray-700 mb-1">
                  Pilih Role <span class="text-red-500">*</span>
                </label>
                <select
                  name="idrole"
                  required
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white
                         focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]"
                >
                  <option value="">-- pilih role --</option>
                  @foreach($roles as $r)
                    <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
                  @endforeach
                </select>
              </div>

              <label class="inline-flex items-center gap-2 mt-1 text-xs text-gray-700">
                <input
                  type="checkbox"
                  name="status"
                  class="w-4 h-4 border-gray-300 rounded-sm text-[#002080] focus:ring-[#00208033]"
                >
                Jadikan aktif
              </label>
            </div>

            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
              <p class="text-[11px] text-gray-500">
                Role yang di-assign dapat diaktifkan/dinonaktifkan kembali dari daftar di bawah.
              </p>
              <button class="btn-primary text-xs px-5 py-2">
                💾 <span>Simpan</span>
              </button>
            </div>
          </form>
        </div>
      </div>

      {{-- Kolom kanan: Tambah Role + Daftar Role --}}
      <div class="space-y-4">
        {{-- Tambah Role Baru --}}
        <div class="glass px-5 py-5 rounded-2xl shadow-xl border border-white">
          <h2 class="text-sm font-semibold text-[#002080] mb-3 flex items-center gap-2">
            🏷️ Tambah Role Baru
          </h2>

          <form action="{{ route('admin.role-user.createRole') }}" method="POST" class="space-y-3">
            @csrf
            <div class="form-group">
              <label class="block text-xs font-semibold text-gray-700 mb-1">
                Nama Role <span class="text-red-500">*</span>
              </label>
              <input
                type="text"
                name="nama_role"
                placeholder="Contoh: Dokter, Kasir, Admin"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                       focus:outline-none focus:border-[#002080] focus:ring-2 focus:ring-[#00208033]
                       placeholder:text-gray-400"
                required
              >
            </div>

            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
              <p class="text-[11px] text-gray-500">
                Role baru akan tersedia pada pilihan saat assign role ke user.
              </p>
              <button class="btn-primary text-xs px-5 py-2">
                ➕ <span>Tambah Role</span>
              </button>
            </div>
          </form>
        </div>

        {{-- Daftar Role --}}
        <div class="glass px-5 py-5 rounded-2xl shadow-xl border border-white">
          <h2 class="text-sm font-semibold text-[#002080] mb-3">
            📋 Daftar Role {{ ($showDeleted ?? false) ? '(Terhapus)' : '(Aktif)' }}
          </h2>

          <div class="overflow-x-auto">
            <table class="min-w-full text-xs text-left border border-gray-200 rounded-xl overflow-hidden">
              <thead class="bg-[#002080] text-white uppercase tracking-wide">
                <tr>
                  <th class="py-2.5 px-3 text-center">ID</th>
                  <th class="py-2.5 px-3">Nama Role</th>
                  <th class="py-2.5 px-3 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                @forelse($roles as $r)
                  <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
                    <td class="py-2.5 px-3 text-gray-500 text-center whitespace-nowrap">
                      <span class="inline-block bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg font-bold text-blue-800">
                        #{{ $r->idrole }}
                      </span>
                    </td>
                    <td class="py-2.5 px-3 font-semibold text-gray-800">
                      {{ $r->nama_role }}
                      @if($showDeleted ?? false)
                        <span class="ml-2 bg-red-100 text-red-700 text-[10px] px-2 py-0.5 rounded-full border border-red-200 font-semibold">
                          TERHAPUS
                        </span>
                      @endif
                    </td>
                    <td class="py-2.5 px-3 text-center">
                      @if(!($showDeleted ?? false))
                        <form
                          action="{{ route('admin.role-user.destroyRole', $r->idrole) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus role ini?')"
                          class="inline"
                        >
                          @csrf
                          <button
                            type="submit"
                            class="btn-action-delete text-[11px]"
                          >
                            🗑️ <span>Hapus</span>
                          </button>
                        </form>
                      @else
                        <form
                          action="{{ route('admin.role-user.restoreRole', $r->idrole) }}"
                          method="POST"
                          class="inline"
                        >
                          @csrf
                          <button
                            type="submit"
                            class="btn-action-restore text-[11px]"
                          >
                            ♻️ <span>Pulihkan</span>
                          </button>
                        </form>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center py-4 text-gray-500 italic text-xs">
                      Belum ada role {{ ($showDeleted ?? false) ? 'terhapus' : 'aktif' }}.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- 👥 DAFTAR USER & ROLE (bagian bawah) --}}
    <div class="glass overflow-x-auto shadow-2xl rounded-3xl border border-white animate-fadeIn delay-300">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-gradient-to-r from-[#002080] to-[#0040A0] text-white text-xs uppercase tracking-wide">
          <tr>
            <th class="py-3 px-4 text-center">ID User</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4">Roles</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($users as $u)
            <tr class="bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-200">
              <td class="py-3 px-4 text-gray-500 text-center whitespace-nowrap">
                <span class="inline-block bg-gradient-to-br from-blue-100 to-blue-200 px-3 py-1 rounded-lg font-bold text-blue-800">
                  #{{ $u->iduser }}
                </span>
              </td>
              <td class="py-3 px-4 font-medium text-gray-800">
                {{ $u->nama }}
              </td>
              <td class="py-3 px-4 text-gray-700">
                {{ $u->email }}
              </td>
              <td class="py-3 px-4">
                @forelse($u->roles as $role)
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-slate-50 rounded-lg px-4 py-2 mb-2 border border-slate-200">
                    <div class="mb-2 sm:mb-0">
                      <span class="font-semibold text-gray-800">{{ $role->nama_role }}</span>
                      @if($role->pivot->status == 1)
                        <span class="ml-2 bg-emerald-50 text-emerald-700 text-[11px] px-2 py-0.5 rounded-full border border-emerald-100">
                          Aktif
                        </span>
                      @else
                        <span class="ml-2 bg-gray-100 text-gray-700 text-[11px] px-2 py-0.5 rounded-full border border-gray-200">
                          Nonaktif
                        </span>
                      @endif
                    </div>

                    <div class="flex flex-wrap gap-2 justify-end">
                      @if($role->pivot->status == 0)
                        <a
                          href="{{ route('admin.role-user.setActive', [$u->iduser, $role->idrole]) }}"
                          class="btn-action-restore text-xs"
                        >
                          Aktifkan
                        </a>
                      @else
                        <a
                          href="{{ route('admin.role-user.deactivate', [$u->iduser, $role->idrole]) }}"
                          class="btn-action-reset text-xs"
                        >
                          Nonaktifkan
                        </a>
                      @endif

                      <form
                        action="{{ route('admin.role-user.destroyConfirm') }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus role ini dari user?')"
                      >
                        @csrf
                        <input type="hidden" name="iduser" value="{{ $u->iduser }}">
                        <input type="hidden" name="idrole" value="{{ $role->idrole }}">
                        <button
                          type="submit"
                          class="btn-action-delete text-xs"
                        >
                          Hapus
                        </button>
                      </form>
                    </div>
                  </div>
                @empty
                  <span class="text-gray-400 text-sm italic">Belum punya role</span>
                @endforelse
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center py-6 text-gray-500 text-sm">
                Belum ada data user.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</section>
@endsection
