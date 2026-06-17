@extends('layouts.frontend')
@section('title', 'Kontak - SDN Sindangmulya 04')
@section('content')

<div class="bg-blue-700 py-10">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-2xl font-bold text-white" data-aos="fade-up">Hubungi Kami</h1>
        <p class="text-blue-200 mt-1 text-sm">Informasi Lebih Lanjut</p>
    </div>
</div>

<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-xl p-4 text-center shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-map-marker-alt text-blue-600 text-base"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-sm mb-1">Alamat</h3>
                <p class="text-gray-700 text-xs text-justify">Kampung Cikoronjo, RT 001/RW 005, Desa Sindangmulya, Kecamatan Cibarusah, Kabupaten Bekasi, Jawa Barat, Kode Pos: 17340.</p>
            </div>
            <div class="bg-white rounded-xl p-4 text-center shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-phone text-yellow-600 text-base"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-sm mb-1">Telepon</h3>
                <p class="text-gray-700 text-xs">+62 81213321817</p>
            </div>
            <div class="bg-white rounded-xl p-4 text-center shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-envelope text-green-600 text-base"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-sm mb-1">Email</h3>
                <p class="text-gray-700 text-xs">sindangmulyaempatsdn@gmail.com</p>
            </div>
        </div>
        </div>

        {{-- Google Maps Embed --}}
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md overflow-hidden" data-aos="fade-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.858853561566!2d107.08184567475227!3d-6.412175293578653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699774e2ae5a93%3A0xd960647c7f661218!2sSDN%20Sindangmulya%2004!5e0!3m2!1sid!2sid!4v1780306186986!5m2!1sid!2sid"
                width="100%"
                height="420"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full">
            </iframe>
        </div>

        {{-- Jam Operasional --}}
        <div class="mt-8 bg-white rounded-2xl shadow-md p-8" data-aos="fade-up">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center"><i class="fas fa-clock mr-3 text-blue-600"></i>Jam Operasional</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Senin - Kamis</span>
                    <span class="font-semibold text-blue-700">06.30 - 17.00 WIB</span>
                </div>
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Jumat</span>
                    <span class="font-semibold text-blue-700">06.30 - 17.00 WIB</span>
                </div>
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Sabtu</span>
                    <span class="font-semibold text-blue-700">06.30 - 17.00 WIB</span>
                </div>
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Minggu & Hari Libur</span>
                    <span class="font-semibold text-red-500">Tutup</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
