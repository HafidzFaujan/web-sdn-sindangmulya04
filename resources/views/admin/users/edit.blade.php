@extends('layouts.admin')
@section('title', 'Edit Akun Admin')
@section('page-title', 'Edit Akun Admin')

@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="border-t pt-4">
                <p class="text-xs text-gray-400 mb-3">Kosongkan jika tidak ingin mengubah password</p>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Minimal 8 karakter">
                @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ulangi password baru">
            </div>
            <div class="flex space-x-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
