@extends('layouts.frontend')

@section('title', 'Beranda - SDN SindangMulya 04')

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex items-center overflow-hidden">

    {{-- Background foto sekolah --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/bg.png') }}" class="w-full h-full object-cover object-center" alt="Foto Sekolah">
        {{-- Overlay transparan agar teks tetap terbaca --}}
        <div class="absolute inset-0 bg-white/50"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 py-20 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <p class="text-blue-700 font-bold text-lg md:text-2xl uppercase tracking-widest mb-1">Selamat Datang di Website Profile</p>
                <h1 class="text-3xl md:text-6xl lg:text-7xl font-bold text-gray-800 leading-tight mb-3">
                    SDN SINDANG<br><span class="text-blue-700">MULYA 04</span>
                </h1>
                <p class="text-black-900 text-justify font-bold text-base md:text-xl mb-8 leading-relaxed">
Bersama SDN Sindangmulya 04, kami hadir untuk membimbing setiap anak tumbuh menjadi pribadi yang cerdas, berkarakter kuat, dan siap menghadapi masa depan di jantung Kecamatan Cibarusah, Kabupaten Bekasi.                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('profil') }}" class="bg-blue-700 text-white font-bold px-6 py-3 md:px-8 md:py-4 text-base md:text-lg rounded-lg hover:bg-blue-800 transition duration-300 shadow-md">
                        <i class="fas fa-info-circle mr-2"></i>Info Lebih Lanjut
                    </a>
                    <a href="{{ route('kontak') }}" class="border-2 border-blue-700 text-blue-700 font-bold px-6 py-3 md:px-8 md:py-4 text-base md:text-lg rounded-lg bg-white/50 hover:bg-blue-700 hover:text-white transition duration-300">
                        <i class="fas fa-phone mr-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="flex justify-center" data-aos="fade-left">
                <div class="relative">
                    <div class="w-64 h-64 md:w-80 md:h-80 rounded-full bg-white border-4 border-blue-200 flex items-center justify-center shadow-2xl">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Sindangmulya 04" class="w-48 h-48 md:w-64 md:h-64 object-contain drop-shadow-xl">
                    </div>
                    {{-- Badge Akreditasi --}}
                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-blue-700 text-white px-5 py-2 rounded-full shadow-lg flex items-center space-x-2 whitespace-nowrap border-2 border-yellow-400">
                        <i class="fas fa-medal text-yellow-400"></i>
                        <span class="text-sm font-bold tracking-wide">Akreditasi <span class="text-yellow-400">B</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- VISI MISI --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-800">Visi & Misi</h2>
            <div class="w-16 h-1 bg-black mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-blue-700 rounded-2xl p-8 text-white" data-aos="fade-right">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-eye text-blue-900 text-xl"></i>
                    </div>
                    <h3 class="text-2xl text-yellow-400 font-bold">Visi</h3>
                </div>
                <p class="text-blue- text-lg italic leading-relaxed">
                    Terwujudnya sekolah yang kondusif, unggul dalam prestasi, berkarakter, dan berbudaya ramah lingkungan berdasarkan IMTAQ dan IPTEK.
                </p>
            </div>
            <div class="bg-blue-700 rounded-2xl p-8" data-aos="fade-left">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-bullseye text-blue-700 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-yellow-400">Misi</h3>
                </div>
                <ul class="space-y-2 text-white text-lg italic">
                    <li class="flex items-start"><span class="mr-2 mt-1 text-yellow-400 font-bold">•</span>Meningkatkan iklim pendidikan yang demokratis</li>
                    <li class="flex items-start"><span class="mr-2 mt-1 text-yellow-400 font-bold">•</span>Melaksanakan kurikulum berbasis kompetensi </li>
                    <li class="flex items-start"><span class="mr-2 mt-1 text-yellow-400 font-bold">•</span>Meningkatkan pengalaman ajaran agama dalam kehidupan sehari-haru</li>
                    <li class="flex items-start"><span class="mr-2 mt-1 text-yellow-400 font-bold">•</span>Meningkatkan profesionalisme pendidikan dan tenaga pekerjaan</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- FITUR UNGGULAN --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-800">Keunggulan Kami</h2>
            <div class="w-40 h-1 bg-black mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 text-center shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Tenaga Pendidik</h3>
                <p class="text-gray-500 leading-relaxed">Dibimbing oleh guru-guru profesional, berpengalaman, dan berdedikasi tinggi di bidangnya.</p>
                <a href="{{ route('guru') }}" class="inline-block mt-4 text-blue-600 font-semibold hover:text-yellow-500 transition">Lihat Guru <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-school text-yellow-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fasilitas Lengkap</h3>
                <p class="text-gray-500 leading-relaxed">Sarana dan prasarana yang memadai untuk mendukung kegiatan belajar mengajar secara optimal.</p>
                <a href="{{ route('sarana') }}" class="inline-block mt-4 text-blue-600 font-semibold hover:text-yellow-500 transition">Lihat Fasilitas <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Ekstrakurikuler</h3>
                <p class="text-gray-500 leading-relaxed">Berbagai pilihan kegiatan untuk mengembangkan minat, bakat, dan karakter peserta didik.</p>
                <a href="{{ route('profil') }}" class="inline-block mt-4 text-blue-600 font-semibold hover:text-yellow-500 transition">Selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- GURU SECTION --}}
@if($gurus->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-800">Tenaga Pendidik</h2>
            <div class="w-40 h-1 bg-blue-700 mx-auto mt-3"></div>
            <p class="text-gray-700 mt-3">Guru-guru berdedikasi SDN Sindangmulya 04</p>
        </div>

        @php
            $kepala = $gurus->firstWhere('jabatan', 'Kepala Sekolah');
            $guruLain = $gurus->filter(fn($g) => $g->jabatan !== 'Kepala Sekolah')->take(6);
        @endphp

        {{-- Kepala Sekolah --}}
        @if($kepala)
        <div class="flex justify-center mb-10" data-aos="fade-up">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden w-52 text-center border-2 border-blue-200">
                <div class="h-44 bg-blue-50 overflow-hidden">
                    @if($kepala->foto)
                        <img src="{{ asset('storage/' . $kepala->foto) }}" alt="{{ $kepala->nama }}" class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                            <i class="fas fa-user-tie text-6xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                <div class="p-3">
                    <h4 class="font-bold text-gray-800 text-sm">{{ $kepala->nama }}</h4>
                    <span class="inline-block bg-blue-700 text-white text-xs px-2 py-0.5 rounded-full mt-1">Kepala Sekolah</span>
                </div>
            </div>
        </div>
        @endif

        {{-- Guru Lainnya --}}
        @if($guruLain->count() > 0)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden" data-aos="fade-up">
            <table class="w-full text-sm">
                <thead class="bg-blue-700 text-white">
                    <tr>
                        <th class="text-left px-6 py-3">No</th>
                        <th class="text-left px-6 py-3">Nama Guru</th>
                        <th class="text-left px-6 py-3">Jabatan / Wali Kelas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($guruLain as $i => $guru)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-3 text-gray-400">{{ $i + 1 }}</td>
                        <td class="px-6 py-3 font-semibold text-gray-800">{{ $guru->nama }}</td>
                        <td class="px-6 py-3">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">{{ $guru->jabatan }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="text-center mt-8">
            <a href="{{ route('guru') }}" class="bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                Lihat Semua Guru <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- BERITA TERBARU --}}
@if($beritas->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center mb-12">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
                <div class="w-16 h-1 bg-yellow-400 mt-3"></div>
            </div>
            <a href="{{ route('berita') }}" class="text-blue-600 font-semibold hover:text-yellow-500 transition" data-aos="fade-left">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($beritas as $berita)
            <article class="bg-white rounded-2xl shadow-md overflow-hidden card-hover" data-aos="fade-up">
                <div class="h-48 bg-blue-100 overflow-hidden">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                            <i class="fas fa-newspaper text-5xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">{{ ucfirst($berita->kategori) }}</span>
                    <h3 class="font-bold text-gray-800 mt-3 mb-2 line-clamp-2">{{ $berita->judul }}</h3>
                    <p class="text-gray-500 text-sm line-clamp-3">{{ strip_tags($berita->isi) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-gray-400 text-xs"><i class="fas fa-calendar mr-1"></i>{{ $berita->published_at?->format('d M Y') }}</span>
                        <a href="{{ route('berita.detail', $berita->slug) }}" class="text-blue-600 text-sm font-semibold hover:text-yellow-500 transition">Baca <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA KONTAK --}}
<section class="py-16 bg-blue-700">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-white mb-4">Ingin Tahu Lebih Lanjut?</h2>
        <p class="text-blue-100 text-lg mb-8">Hubungi kami untuk informasi lebih lanjut tentang SDN Sindangmulya 04</p>
        <a href="{{ route('kontak') }}" class="bg-yellow-400 text-blue-900 font-bold px-10 py-4 rounded-lg text-lg hover:bg-yellow-300 transition duration-300 shadow-lg">
            <i class="fas fa-envelope mr-2"></i>Hubungi Kami
        </a>
    </div>
</section>

@endsection
