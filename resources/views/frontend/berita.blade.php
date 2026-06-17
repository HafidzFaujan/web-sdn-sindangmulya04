@extends('layouts.frontend')
@section('title', 'Berita - SDN Sindangmulya 04')
@section('content')

<div class="bg-blue-700 py-10">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-2xl font-bold text-white" data-aos="fade-up">Berita & Pengumuman</h1>
        <p class="text-blue-200 mt-1 text-sm">Informasi terkini dari SDN Sindangmulya 04</p>
    </div>
</div>

<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        @if($beritas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($beritas as $berita)
            <article class="bg-white rounded-xl shadow-md overflow-hidden card-hover" data-aos="fade-up">
                <div class="h-52 bg-blue-100 overflow-hidden cursor-pointer" onclick="openGlobalLightbox('{{ asset('storage/' . $berita->gambar) }}', '{{ addslashes($berita->judul) }}')">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                            <i class="fas fa-newspaper text-4xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-0.5 rounded-full">{{ ucfirst($berita->kategori) }}</span>
                        <span class="text-gray-400 text-xs"><i class="fas fa-calendar mr-1"></i>{{ $berita->published_at?->format('d M Y') }}</span>
                    </div>
                    <h3 class="font-bold text-gray-800 text-sm mb-1 leading-snug">{{ $berita->judul }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-3">{{ strip_tags($berita->isi) }}</p>
                    <div class="mt-3 pt-2 border-t border-gray-100">
                        <a href="{{ route('berita.detail', $berita->slug) }}" class="inline-flex items-center bg-blue-700 text-white font-semibold px-3 py-1.5 rounded-lg hover:bg-blue-800 transition text-xs">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-6">{{ $beritas->links() }}</div>
        @else
        <div class="text-center py-20">
            <i class="fas fa-newspaper text-7xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl">Belum ada berita yang dipublikasikan</p>
        </div>
        @endif
    </div>
</section>
@endsection
