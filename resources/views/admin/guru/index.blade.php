@extends('layouts.admin')
@section('title', 'Data Guru')
@section('page-title', 'Data Guru')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total: {{ $gurus->total() }} guru</p>
    <a href="{{ route('admin.guru.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition flex items-center space-x-2">
        <i class="fas fa-plus"></i><span>Tambah Guru</span>
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="text-left px-4 py-3">Foto</th>
                <th class="text-left px-4 py-3">Nama</th>
                <th class="text-left px-4 py-3">Jabatan</th>
                <th class="text-left px-4 py-3">NIP</th>
                <th class="text-left px-4 py-3">Status</th>
                <th class="text-left px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($gurus as $guru)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    @if($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" class="w-10 h-10 rounded-full object-cover">
                    @else
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center"><i class="fas fa-user text-blue-400"></i></div>
                    @endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $guru->nama }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $guru->jabatan }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $guru->nip ?: '-' }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded-full text-xs {{ $guru->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $guru->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.guru.edit', $guru) }}" class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg text-xs hover:bg-yellow-200 transition"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST" onsubmit="return confirm('Hapus data guru ini?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-lg text-xs hover:bg-red-200 transition"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-10 text-gray-400">Belum ada data guru</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $gurus->links() }}</div>
</div>
@endsection
