@extends('layouts.admin')
@section('title', 'Galeri')
@section('page-title', 'Manajemen Galeri')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total: {{ $galeris->total() }} foto</p>
    <a href="{{ route('admin.galeri.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition flex items-center space-x-2">
        <i class="fas fa-plus"></i><span>Tambah Foto</span>
    </a>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @forelse($galeris as $foto)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="h-40 overflow-hidden">
            <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
            <p class="font-semibold text-gray-800 text-sm truncate">{{ $foto->judul }}</p>
            <span class="text-xs text-gray-400">{{ ucfirst($foto->kategori) }}</span>
            <div class="flex space-x-2 mt-2">
                <a href="{{ route('admin.galeri.edit', $foto) }}" class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs hover:bg-yellow-200 transition"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                    @csrf @method('DELETE')
                    <button class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs hover:bg-red-200 transition"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center py-20 text-gray-400">
        <i class="fas fa-images text-5xl mb-3"></i>
        <p>Belum ada foto galeri</p>
    </div>
    @endforelse
</div>
<div class="mt-4">{{ $galeris->links() }}</div>
@endsection
