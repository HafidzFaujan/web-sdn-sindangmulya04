@extends('layouts.admin')
@section('title', 'Edit Sarana')
@section('page-title', 'Edit Sarana & Prasarana')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.sarana.update', $sarana) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sarana <span class="text-red-500">*</span></label>
                <input type="text" name="nama" value="{{ old('nama', $sarana->nama) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $sarana->deskripsi) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah <span class="text-red-500">*</span></label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $sarana->jumlah) }}" min="1" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kondisi <span class="text-red-500">*</span></label>
                    <select name="kondisi" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach(['Baik','Cukup','Rusak'] as $k)
                        <option value="{{ $k }}" {{ old('kondisi', $sarana->kondisi) == $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar</label>
                @if($sarana->gambar)
                <div class="mb-3"><img src="{{ asset('storage/' . $sarana->gambar) }}" class="h-32 rounded-lg object-cover"></div>
                @endif
                <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition"><i class="fas fa-save mr-2"></i>Update</button>
                <a href="{{ route('admin.sarana.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
