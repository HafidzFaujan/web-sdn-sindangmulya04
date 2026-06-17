@extends('layouts.frontend')
@section('title', 'Sarana & Prasarana - SDN Sindangmulya 04')
@section('content')

<div class="bg-blue-700 py-10">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-2xl font-bold text-white" data-aos="fade-up">Sarana & Prasarana</h1>
        <p class="text-blue-200 mt-1 text-sm">Fasilitas pendukung kegiatan belajar mengajar</p>
    </div>
</div>

<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        @if($saranas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($saranas as $sarana)
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover" data-aos="fade-up">
                <div class="h-52 bg-blue-50 overflow-hidden cursor-pointer" onclick="openGlobalLightbox('{{ asset('storage/' . $sarana->gambar) }}', '{{ $sarana->nama }}')">
                    @if($sarana->gambar)
                        <img src="{{ asset('storage/' . $sarana->gambar) }}" alt="{{ $sarana->nama }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                            <i class="fas fa-school text-4xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-bold text-gray-800 text-sm">{{ $sarana->nama }}</h3>
                        <span class="bg-{{ $sarana->kondisi == 'Baik' ? 'green' : ($sarana->kondisi == 'Cukup' ? 'yellow' : 'red') }}-100 text-{{ $sarana->kondisi == 'Baik' ? 'green' : ($sarana->kondisi == 'Cukup' ? 'yellow' : 'red') }}-700 text-xs font-semibold px-2 py-0.5 rounded-full">
                            {{ $sarana->kondisi }}
                        </span>
                    </div>
                    @if($sarana->deskripsi)
                    <p class="text-gray-500 text-xs leading-relaxed">{{ $sarana->deskripsi }}</p>
                    @endif
                    <div class="mt-2 flex items-center text-gray-400 text-xs">
                        <i class="fas fa-layer-group mr-1.5 text-blue-400"></i>
                        Jumlah: <span class="font-semibold text-gray-700 ml-1">{{ $sarana->jumlah }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20">
            <i class="fas fa-school text-7xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl">Data sarana & prasarana sedang dipersiapkan</p>
        </div>
        @endif
    </div>
</section>
@endsection
