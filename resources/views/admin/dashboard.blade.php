@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-blue-500">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Berita</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalBerita }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-newspaper text-blue-600 text-xl"></i>
            </div>
        </div>
        <a href="{{ route('admin.berita.index') }}" class="text-blue-600 text-xs mt-3 inline-block hover:underline">Kelola Berita →</a>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-yellow-500">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Guru</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalGuru }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <i class="fas fa-chalkboard-teacher text-yellow-600 text-xl"></i>
            </div>
        </div>
        <a href="{{ route('admin.guru.index') }}" class="text-yellow-600 text-xs mt-3 inline-block hover:underline">Kelola Guru →</a>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-green-500">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Sarana</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalSarana }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-school text-green-600 text-xl"></i>
            </div>
        </div>
        <a href="{{ route('admin.sarana.index') }}" class="text-green-600 text-xs mt-3 inline-block hover:underline">Kelola Sarana →</a>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-purple-500">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Galeri</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalGaleri }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-images text-purple-600 text-xl"></i>
            </div>
        </div>
        <a href="{{ route('admin.galeri.index') }}" class="text-purple-600 text-xs mt-3 inline-block hover:underline">Kelola Galeri →</a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Berita Terbaru</h2>
    @if($beritaTerbaru->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-gray-600">
                    <th class="text-left px-4 py-3 rounded-l-lg">Judul</th>
                    <th class="text-left px-4 py-3">Kategori</th>
                    <th class="text-left px-4 py-3">Status</th>
                    <th class="text-left px-4 py-3 rounded-r-lg">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($beritaTerbaru as $berita)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">{{ Str::limit($berita->judul, 50) }}</td>
                    <td class="px-4 py-3"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">{{ ucfirst($berita->kategori) }}</span></td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded-full text-xs {{ $berita->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $berita->is_published ? 'Dipublikasi' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-500">{{ $berita->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-gray-400 text-center py-8">Belum ada berita</p>
    @endif
</div>
@endsection
