@extends('layouts.admin')
@section('title', 'Tambah Sarana')
@section('page-title', 'Tambah Sarana & Prasarana')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.sarana.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sarana <span class="text-red-500">*</span></label>
                <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ruang Kelas, Perpustakaan, dll">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Deskripsi singkat...">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah <span class="text-red-500">*</span></label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', 1) }}" min="1" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kondisi <span class="text-red-500">*</span></label>
                    <select name="kondisi" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Baik">Baik</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition"><i class="fas fa-save mr-2"></i>Simpan</button>
                <a href="{{ route('admin.sarana.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
