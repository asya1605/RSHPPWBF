@extends('layouts.admin')

@section('title', 'Data User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">
  {{-- NAVBAR ADMIN --}}
  <nav class="bg-[#002080] shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center gap-8 py-4 text-white font-medium">
      <a href="{{ route('dashboard.admin') }}" class="flex items-center gap-2 hover:text-[#ffd700] transition">🏠 Home</a>
      <a href="{{ route('dashboard.admin.data') }}" class="flex items-center gap-2 hover:text-[#ffd700] transition">📋 Data Master</a>
      <a href="{{ route('logout') }}" class="flex items-center gap-2 text-red-300 hover:text-red-400 transition">🚪 Logout</a>
    </div>
  </nav>

  <div class="max-w-6xl mx-auto px-6 mt-10">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">📋 Data User</h1>

    {{-- Alerts --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-4 text-center shadow-sm">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- Action bar --}}
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
      <a href="{{ route('admin.data-user.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-semibold transition">
         ➕ Tambah User
      </a>

      <input type="text" id="search" placeholder="🔍 Cari nama atau email..."
             class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-[#002080]/30 transition">
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-2xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4 text-center w-56">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100">
          @forelse($users as $u)
            <tr class="hover:bg-gray-50 transition data-row">
              <td class="py-3 px-4">{{ $u->iduser }}</td>
              <td class="py-3 px-4">{{ $u->nama }}</td>
              <td class="py-3 px-4">{{ $u->email }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.data-user.edit', $u->iduser) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">✏️ Edit</a>
                <form action="{{ route('admin.data-user.reset', $u->iduser) }}" method="POST" class="inline" onsubmit="return confirm('Reset password user ini ke 123456?')">
                  @csrf
                  <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs">🔁 Reset</button>
                </form>
                <form action="{{ route('admin.data-user.destroy', $u->iduser) }}" method="POST" class="inline ml-1" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">🗑️ Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center py-5 text-gray-500 italic">Belum ada data user.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- 🔍 Live search --}}
<script>
  document.getElementById('search').addEventListener('keyup', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr.data-row').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
</script>
@endsection
