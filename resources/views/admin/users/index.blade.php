@extends('layouts.admin')
@section('title', 'Manajemen Akun Admin')
@section('page-title', 'Manajemen Akun Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total: {{ $users->count() }} akun</p>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition flex items-center space-x-2">
        <i class="fas fa-plus"></i><span>Tambah Akun</span>
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="text-left px-4 py-3">Nama</th>
                <th class="text-left px-4 py-3">Email</th>
                <th class="text-left px-4 py-3">Dibuat</th>
                <th class="text-left px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-blue-600 text-xs"></i>
                        </div>
                        <span class="font-medium text-gray-800">{{ $user->name }}</span>
                        @if($user->id === Auth::id())
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full">Anda</span>
                        @endif
                    </div>
                </td>
                <td class="px-4 py-3 text-gray-600">{{ $user->email }}</td>
                <td class="px-4 py-3 text-gray-400">{{ $user->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg text-xs hover:bg-yellow-200 transition">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        @if($user->id !== Auth::id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus akun {{ $user->name }}?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-lg text-xs hover:bg-red-200 transition">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
