@extends('layouts.admin')
@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Galeri')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select name="kategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(['umum','kegiatan','prestasi','fasilitas'] as $kat)
                    <option value="{{ $kat }}" {{ old('kategori', $galeri->kategori) == $kat ? 'selected' : '' }}>{{ ucfirst($kat) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>
                @if($galeri->gambar)
                <div class="mb-3"><img src="{{ asset('storage/' . $galeri->gambar) }}" class="h-32 rounded-lg object-cover"></div>
                @endif
                <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-gray-400 text-xs mt-1">Kosongkan jika tidak ingin mengubah foto</p>
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition"><i class="fas fa-save mr-2"></i>Update</button>
                <a href="{{ route('admin.galeri.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
