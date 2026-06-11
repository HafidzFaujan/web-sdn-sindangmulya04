@extends('layouts.frontend')
@section('title', $berita->judul . ' - SDN Sindangmulya 04')
@section('content')

<div class="bg-blue-700 py-16">
    <div class="max-w-4xl mx-auto px-4">
        <a href="{{ route('berita') }}" class="text-blue-200 hover:text-white text-sm mb-4 inline-block"><i class="fas fa-arrow-left mr-2"></i>Kembali ke Berita</a>
        <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">{{ $berita->judul }}</h1>
        <div class="flex items-center gap-4 mt-4 text-blue-200 text-sm">
            <span><i class="fas fa-calendar mr-1"></i>{{ $berita->published_at?->format('d M Y') }}</span>
            <span class="bg-yellow-400 text-blue-900 px-3 py-1 rounded-full text-xs font-semibold">{{ ucfirst($berita->kategori) }}</span>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <article class="bg-white rounded-2xl shadow-md overflow-hidden">
                    @if($berita->gambar)
                    <div class="max-h-96 overflow-hidden flex justify-center bg-gray-100">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="h-96 w-auto object-cover">
                    </div>
                    @endif
                    <div class="p-8 prose max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>
                </article>
            </div>
            <div>
                <h3 class="font-bold text-gray-800 text-lg mb-4">Berita Lainnya</h3>
                <div class="space-y-4">
                    @foreach($lainnya as $item)
                    <a href="{{ route('berita.detail', $item->slug) }}" class="flex gap-3 bg-white rounded-xl p-3 shadow-sm hover:shadow-md transition card-hover">
                        <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 bg-blue-100">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center"><i class="fas fa-newspaper text-blue-300"></i></div>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 line-clamp-2">{{ $item->judul }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $item->published_at?->format('d M Y') }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
