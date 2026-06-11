@extends('layouts.frontend')
@section('title', 'Galeri - SDN Sindangmulya 04')

@push('styles')
<style>
.galeri-item {
    overflow: hidden;
    border-radius: 12px;
    cursor: pointer;
    position: relative;
}
.galeri-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.galeri-item:hover img {
    transform: scale(1.07);
}
.galeri-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: flex-end;
    padding: 16px;
}
.galeri-item:hover .galeri-overlay {
    opacity: 1;
}

/* Lightbox */
#lightbox {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.92);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 20px;
}
#lightbox.active { display: flex; }
#lightbox img {
    max-width: 90vw;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 12px;
    box-shadow: 0 25px 80px rgba(0,0,0,0.5);
}
#lightbox-caption {
    color: white;
    margin-top: 12px;
    font-size: 14px;
    text-align: center;
}
#lightbox-close {
    position: absolute;
    top: 20px;
    right: 24px;
    color: white;
    font-size: 32px;
    cursor: pointer;
    line-height: 1;
    opacity: 0.8;
    transition: opacity 0.2s;
}
#lightbox-close:hover { opacity: 1; }
</style>
@endpush

@section('content')

<div class="bg-blue-700 py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-white" data-aos="fade-up">Galeri Foto</h1>
        <p class="text-blue-200 mt-2">Dokumentasi kegiatan SDN Sindangmulya 04</p>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        @if($galeris->count() > 0)

        {{-- Filter Kategori --}}
        @php $kategoris = $galeris->pluck('kategori')->unique(); @endphp
        @if($kategoris->count() > 1)
        <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up">
            <button onclick="filterGaleri('semua')" class="filter-btn active px-5 py-2 rounded-full text-sm font-semibold bg-blue-700 text-white transition">Semua</button>
            @foreach($kategoris as $kat)
            <button onclick="filterGaleri('{{ $kat }}')" class="filter-btn px-5 py-2 rounded-full text-sm font-semibold bg-white text-gray-600 border border-gray-200 hover:bg-blue-700 hover:text-white transition">{{ ucfirst($kat) }}</button>
            @endforeach
        </div>
        @endif

        {{-- Grid Galeri --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8" id="galeri-grid">
            @foreach($galeris as $foto)
            <div class="galeri-item shadow-md bg-white rounded-2xl overflow-hidden card-hover" data-kategori="{{ $foto->kategori }}" data-aos="fade-up"
                 onclick="openLightbox('{{ asset('storage/' . $foto->gambar) }}', '{{ $foto->judul }}', '{{ $foto->deskripsi }}')">
                <div class="h-80 overflow-hidden">
                    <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->judul }}" loading="lazy" class="w-full h-full object-cover hover:scale-105 transition duration-300 cursor-pointer">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 text-xl mb-2">{{ $foto->judul }}</h3>
                    @if($foto->deskripsi)
                    <p class="text-gray-500 text-base leading-relaxed text-justify">{{ $foto->deskripsi }}</p>
                    @endif
                    <div class="mt-3">
                        <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full">{{ ucfirst($foto->kategori) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <div class="text-center py-24">
            <i class="fas fa-images text-7xl text-gray-300 mb-6"></i>
            <p class="text-gray-500 text-2xl font-semibold">Galeri sedang dipersiapkan</p>
            <p class="text-gray-400 mt-2">Dokumentasi kegiatan akan segera tersedia</p>
        </div>
        @endif

    </div>
</section>

{{-- Lightbox --}}
<div id="lightbox" onclick="closeLightbox()">
    <span id="lightbox-close" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-img" src="" alt="">
    <div id="lightbox-caption"></div>
</div>

@push('scripts')
<script>
function openLightbox(src, judul, deskripsi) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').innerHTML = '<strong>' + judul + '</strong>' + (deskripsi ? '<br><span style="opacity:0.7">' + deskripsi + '</span>' : '');
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});

function filterGaleri(kategori) {
    document.querySelectorAll('.galeri-item').forEach(item => {
        if (kategori === 'semua' || item.dataset.kategori === kategori) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-blue-700', 'text-white');
        btn.classList.add('bg-white', 'text-gray-600');
    });
    event.target.classList.add('bg-blue-700', 'text-white');
    event.target.classList.remove('bg-white', 'text-gray-600');
}
</script>
@endpush

@endsection
