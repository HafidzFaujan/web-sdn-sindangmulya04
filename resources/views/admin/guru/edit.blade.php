@extends('layouts.admin')
@section('title', 'Edit Guru')
@section('page-title', 'Edit Data Guru')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.guru.update', $guru) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $guru->jabatan) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach(['kepala_sekolah'=>'Kepala Sekolah','staf'=>'Staf Manajemen','wali_kelas'=>'Wali Kelas','guru_mapel'=>'Guru Mata Pelajaran'] as $val=>$label)
                        <option value="{{ $val }}" {{ old('kategori',$guru->kategori)==$val?'selected':'' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $guru->urutan) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>
                    @if($guru->foto)
                    <div class="mb-3 flex items-center space-x-3">
                        <img src="{{ asset('storage/' . $guru->foto) }}" class="w-16 h-16 rounded-full object-cover border-2 border-blue-200">
                        <span class="text-sm text-gray-500">Foto saat ini</span>
                    </div>
                    @endif
                    <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-400 text-xs mt-1">Kosongkan jika tidak ingin mengubah foto</p>
                </div>
                <div class="md:col-span-2">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $guru->is_active) ? 'checked' : '' }} class="w-4 h-4 text-blue-600">
                        <span class="text-sm font-semibold text-gray-700">Tampilkan di website</span>
                    </label>
                </div>
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition"><i class="fas fa-save mr-2"></i>Update</button>
                <a href="{{ route('admin.guru.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
