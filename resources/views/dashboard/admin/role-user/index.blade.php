@extends('layouts.admin.main')

@section('title', 'Manajemen Role User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-8">
  <div class="max-w-6xl mx-auto px-4">

    {{-- Header + Toggle --}}
    <div class="flex flex-wrap gap-3 justify-between items-center mb-4">
      <div>
        <h1 class="text-2xl font-bold text-[#002080]">⚙️ Manajemen Role User</h1>
        <p class="text-xs text-gray-500 mt-1">
          Atur role dan hak akses user di sistem RSHP UNAIR.
        </p>
      </div>

      <div class="flex flex-wrap gap-2">
        @if($showDeleted ?? false)
          <a href="{{ route('admin.role-user.index') }}"
             class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-1.5 rounded-lg text-xs font-medium border border-gray-200">
            ⬅️ <span>Kembali ke Role Aktif</span>
          </a>
        @else
          <a href="{{ route('admin.role-user.index', ['show_deleted' => 1]) }}"
             class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-4 py-1.5 rounded-lg text-xs font-medium border border-red-200">
            🗑️ <span>Lihat Role Terhapus</span>
          </a>
        @endif
      </div>
    </div>

    {{-- ALERT MESSAGE --}}
    @foreach (['success' => 'green', 'danger' => 'red', 'info' => 'blue'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-50 border border-{{ $color }}-200 text-{{ $color }}-700 px-4 py-2 rounded-lg mb-4 text-sm flex items-center justify-center gap-2">
          <span class="font-semibold">
            {{ $type === 'success' ? 'Berhasil' : ($type === 'danger' ? 'Perhatian' : 'Info') }}:
          </span>
          <span>{{ session($type) }}</span>
        </div>
      @endif
    @endforeach

    {{-- 🔹 Bagian Atas: 2 Kolom (Assign Role, Tambah & Daftar Role) --}}
    <div class="grid lg:grid-cols-2 gap-6 mb-8">
      {{-- Kolom kiri: Assign Role ke User --}}
      <div class="space-y-4">
        <div class="bg-white px-5 py-4 rounded-2xl shadow-sm border border-gray-200">
          <h2 class="text-sm font-semibold text-[#002080] mb-3 flex items-center gap-2">
            🧩 Assign Role ke User
          </h2>

          <form action="{{ route('admin.role-user.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="space-y-3">
              <div class="space-y-1">
                <label class="block text-xs font-semibold text-gray-700">
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

              <div class="space-y-1">
                <label class="block text-xs font-semibold text-gray-700">
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

            <div class="text-right">
              <button
                class="inline-flex items-center gap-2 bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-xs font-semibold shadow-sm"
              >
                💾 Simpan
              </button>
            </div>
          </form>
        </div>
      </div>

      {{-- Kolom kanan: Tambah Role + Daftar Role --}}
      <div class="space-y-4">
        {{-- 🏷️ Tambah Role Baru --}}
        <div class="bg-white px-5 py-4 rounded-2xl shadow-sm border border-gray-200">
          <h2 class="text-sm font-semibold text-[#002080] mb-3 flex items-center gap-2">
            🏷️ Tambah Role Baru
          </h2>

          <form action="{{ route('admin.role-user.createRole') }}" method="POST" class="space-y-3">
            @csrf
            <div class="space-y-1">
              <label class="block text-xs font-semibold text-gray-700">
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

            <div class="text-right">
              <button
                class="inline-flex items-center gap-2 bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-xs font-semibold shadow-sm"
              >
                ➕ Tambah Role
              </button>
            </div>
          </form>
        </div>

        {{-- 📋 Daftar Role --}}
        <div class="bg-white px-5 py-4 rounded-2xl shadow-sm border border-gray-200">
          <h2 class="text-sm font-semibold text-[#002080] mb-3">
            Daftar Role {{ ($showDeleted ?? false) ? '(Terhapus)' : '(Aktif)' }}
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
                  <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
                    <td class="py-2.5 px-3 text-gray-500 text-center whitespace-nowrap">
                      #{{ $r->idrole }}
                    </td>
                    <td class="py-2.5 px-3 font-semibold text-gray-800">
                      {{ $r->nama_role }}
                      @if($showDeleted ?? false)
                        <span class="ml-2 bg-gray-100 text-gray-700 text-[10px] px-2 py-0.5 rounded-full border border-gray-200">
                          TERHAPUS
                        </span>
                      @endif
                    </td>
                    <td class="py-2.5 px-3 text-center">
                      @if(!$showDeleted)
                        <form
                          action="{{ route('admin.role-user.destroyRole', $r->idrole) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus role ini?')"
                          class="inline"
                        >
                          @csrf
                          <button
                            type="submit"
                            class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-[11px] font-medium
                                   bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100"
                          >
                            🗑️ Hapus
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
                            class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-[11px] font-medium
                                   bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100"
                          >
                            ♻️ Pulihkan
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
    <div class="overflow-x-auto bg-white shadow-sm rounded-2xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white text-xs uppercase tracking-wide">
          <tr>
            <th class="py-3 px-4 text-center">ID User</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4">Roles</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($users as $u)
            <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-100/70 transition-colors">
              <td class="py-3 px-4 text-gray-500 text-center whitespace-nowrap">
                #{{ $u->iduser }}
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
                          class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                                 bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100"
                        >
                          Aktifkan
                        </a>
                      @else
                        <a
                          href="{{ route('admin.role-user.deactivate', [$u->iduser, $role->idrole]) }}"
                          class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                                 bg-gray-100 text-gray-700 border border-gray-200 hover:bg-gray-200"
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
                          class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-medium
                                 bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100"
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
