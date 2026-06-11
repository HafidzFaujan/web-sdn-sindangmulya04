@extends('layouts.admin')
@section('title', 'Profil & Ubah Password')
@section('page-title', 'Profil & Ubah Password')

@section('content')
<div class="max-w-2xl space-y-6">

    {{-- Info Akun --}}
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-user-circle mr-2 text-blue-600"></i>Informasi Akun
        </h2>
        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-800 transition">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- Ubah Password --}}
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-lock mr-2 text-yellow-500"></i>Ubah Password
        </h2>
        <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Lama</label>
                <input type="password" name="current_password" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password lama">
                @error('current_password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Minimal 8 karakter">
                @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ulangi password baru">
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-yellow-600 transition">
                <i class="fas fa-key mr-2"></i>Ubah Password
            </button>
        </form>
    </div>

</div>
@endsection
