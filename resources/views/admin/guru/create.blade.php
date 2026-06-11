@extends('layouts.admin')
@section('title', 'Tambah Guru')
@section('page-title', 'Tambah Data Guru')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama lengkap guru">
                    @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Wali Kelas 1A, Bendahara, dll">
                    @error('jabatan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="kepala_sekolah" {{ old('kategori')=='kepala_sekolah'?'selected':'' }}>Kepala Sekolah</option>
                        <option value="staf" {{ old('kategori')=='staf'?'selected':'' }}>Staf Manajemen</option>
                        <option value="wali_kelas" {{ old('kategori','wali_kelas')=='wali_kelas'?'selected':'' }}>Wali Kelas</option>
                        <option value="guru_mapel" {{ old('kategori')=='guru_mapel'?'selected':'' }}>Guru Mata Pelajaran</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', 0) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>
                    <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-400 text-xs mt-1">Format: JPG, PNG. Maks: 2MB</p>
                </div>
                <div class="md:col-span-2">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600">
                        <span class="text-sm font-semibold text-gray-700">Tampilkan di website</span>
                    </label>
                </div>
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition"><i class="fas fa-save mr-2"></i>Simpan</button>
                <a href="{{ route('admin.guru.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
