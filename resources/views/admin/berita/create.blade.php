@extends('layouts.admin')
@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')
@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Berita <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Judul berita">
                @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select name="kategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="berita" {{ old('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                    <option value="pengumuman" {{ old('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Berita <span class="text-red-500">*</span></label>
                <textarea name="isi" rows="10" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tulis isi berita di sini...">{{ old('isi') }}</textarea>
                @error('isi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-gray-400 text-xs mt-1">Format: JPG, PNG. Maks: 2MB</p>
            </div>
            <div>
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600">
                    <span class="text-sm font-semibold text-gray-700">Publikasikan sekarang</span>
                </label>
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition"><i class="fas fa-save mr-2"></i>Simpan</button>
                <a href="{{ route('admin.berita.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
