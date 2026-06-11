@extends('layouts.admin')
@section('title', 'Berita')
@section('page-title', 'Manajemen Berita')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-base">Total: {{ $beritas->total() }} berita</p>
    <a href="{{ route('admin.berita.create') }}" class="bg-blue-700 text-white px-5 py-2.5 rounded-lg text-base font-semibold hover:bg-blue-800 transition flex items-center space-x-2">
        <i class="fas fa-plus"></i><span>Tambah Berita</span>
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-base">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="text-left px-5 py-4">Gambar</th>
                <th class="text-left px-5 py-4">Judul</th>
                <th class="text-left px-5 py-4">Kategori</th>
                <th class="text-left px-5 py-4">Status</th>
                <th class="text-left px-5 py-4">Tanggal</th>
                <th class="text-left px-5 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($beritas as $berita)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-4">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-20 h-14 rounded-lg object-cover">
                    @else
                        <div class="w-20 h-14 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-newspaper text-blue-400 text-xl"></i>
                        </div>
                    @endif
                </td>
                <td class="px-5 py-4 font-semibold text-gray-800 max-w-xs text-base">{{ Str::limit($berita->judul, 60) }}</td>
                <td class="px-5 py-4">
                    <span class="bg-blue-100 text-blue-700 px-3 py-1.5 rounded-full text-sm font-medium">{{ ucfirst($berita->kategori) }}</span>
                </td>
                <td class="px-5 py-4">
                    <span class="px-3 py-1.5 rounded-full text-sm font-medium {{ $berita->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $berita->is_published ? 'Dipublikasi' : 'Draft' }}
                    </span>
                </td>
                <td class="px-5 py-4 text-gray-500 text-sm">{{ $berita->created_at->format('d M Y') }}</td>
                <td class="px-5 py-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-yellow-200 transition">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-200 transition">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-16 text-gray-400 text-base">Belum ada berita</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-5">{{ $beritas->links() }}</div>
</div>
@endsection
