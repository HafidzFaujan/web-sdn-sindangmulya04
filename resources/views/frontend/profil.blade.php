@extends('layouts.frontend')
@section('title', 'Profil Sekolah - SDN Sindangmulya 04')
@section('content')

<div class="bg-blue-700 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-xl font-bold text-white" data-aos="fade-up">Profil Sekolah</h1>
        <p class="text-blue-200 mt-1 text-xs" data-aos="fade-up">SDN Sindangmulya 04 Kabupaten Bekasi</p>
    </div>
</div>

<section class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center mb-8">
            <div data-aos="fade-right">
                <h2 class="text-base font-bold text-gray-800 mb-3">Tentang Sekolah</h2>
                <p class="text-gray-600 leading-relaxed mb-3 text-justify text-sm">
                    SDN Sindangmulya 04 adalah sekolah dasar negeri yang berlokasi di Desa Sindangmulya, Kecamatan Cibarusah, Kabupaten Bekasi, Jawa Barat. Sebagai salah satu lembaga pendidikan dasar di wilayah Cibarusah, kami berkomitmen untuk memberikan pendidikan yang berkualitas, inklusif, dan berkarakter bagi setiap peserta didik.
                </p>
                <p class="text-gray-600 leading-relaxed mb-3 text-justify text-sm">
                   Kami percaya bahwa setiap anak memiliki potensi yang unik dan berharga. Oleh karena itu, SDN Sindangmulya 04 menghadirkan lingkungan belajar yang nyaman, aman, dan menyenangkan, di mana siswa tidak hanya dibimbing untuk unggul secara akademik, tetapi juga ditanamkan nilai-nilai moral, keagamaan, dan kedisiplinan sebagai bekal kehidupan.
                </p>
                <div class="grid grid-cols-2 gap-3 mt-4">
                    <div class="bg-blue-50 rounded-xl p-3">
                        <div class="text-blue-700 font-bold text-sm">NPSN</div>
                        <div class="text-gray-600 text-xs">20218189</div>
                    </div>
                    <div class="bg-yellow-50 rounded-xl p-3">
                        <div class="text-yellow-700 font-bold text-sm">Akreditasi</div>
                        <div class="text-gray-600 text-xs">B</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-3 col-span-2 text-center">
                        <div class="text-green-700 font-bold text-sm">Status</div>
                        <div class="text-gray-600 text-xs">Negeri</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center" data-aos="fade-left">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Sindangmulya 04" class="w-48 h-48 object-contain drop-shadow-xl">
            </div>
        </div>

        {{-- Visi Misi --}}
        <div class="mb-8">
            <div class="text-center mb-6" data-aos="fade-up">
                <h2 class="text-base font-bold text-gray-800">Visi & Misi</h2>
                <div class="w-16 h-1 bg-black mx-auto mt-2"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-100 rounded-xl p-4 border border-blue-200" data-aos="fade-right">
                    <h3 class="text-sm font-bold mb-2 flex items-center text-blue-700"><i class="fas fa-eye mr-2 text-yellow-500"></i>Visi</h3>
                    <p class="text-gray-600 leading-relaxed italic text-xs">
                        "Terwujudnya peserta didik yang beriman, bertaqwa, cerdas, terampil, berkarakter, dan berwawasan lingkungan."
                    </p>
                </div>
                <div class="bg-blue-100 rounded-xl p-4 border border-blue-200" data-aos="fade-left">
                    <h3 class="text-sm font-bold mb-2 text-blue-700 flex items-center"><i class="fas fa-bullseye mr-2 text-yellow-500"></i>Misi</h3>
                    <ul class="space-y-1.5 text-gray-600 text-xs">
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-0.5 text-blue-600 text-xs"></i>Menyelenggarakan pembelajaran yang aktif, kreatif, efektif, dan menyenangkan</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-0.5 text-blue-600 text-xs"></i>Membentuk karakter siswa yang berakhlak mulia dan berbudi pekerti luhur</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-0.5 text-blue-600 text-xs"></i>Meningkatkan prestasi akademik dan non-akademik siswa</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-0.5 text-blue-600 text-xs"></i>Menciptakan lingkungan sekolah yang bersih, indah, dan nyaman</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-0.5 text-blue-600 text-xs"></i>Menjalin kerjasama yang harmonis antara sekolah, orang tua, dan masyarakat</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Kepala Sekolah --}}
        @php $kepala = App\Models\Guru::where('kategori','kepala_sekolah')->where('is_active',true)->first(); @endphp
        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-blue-100 rounded-xl p-4 border border-blue-200" data-aos="fade-up">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden flex-shrink-0 border-4 border-blue-300">
                        @if($kepala && $kepala->foto)
                            <img src="{{ asset('storage/' . $kepala->foto) }}" alt="{{ $kepala->nama }}" class="w-full h-full object-cover object-top">
                        @else
                            <div class="w-full h-full bg-blue-200 flex items-center justify-center">
                                <i class="fas fa-user-tie text-3xl text-blue-400"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-blue-700 font-semibold text-xs uppercase tracking-widest mb-1">Kepala Sekolah</p>
                        <h3 class="text-sm font-bold mb-1 text-gray-800">{{ $kepala ? $kepala->nama : '[Nama Kepala Sekolah]' }}</h3>
                        <p class="text-gray-600 text-xs leading-relaxed italic">
                            "Kami berkomitmen untuk terus meningkatkan kualitas pendidikan dan menciptakan lingkungan belajar yang kondusif bagi seluruh peserta didik SDN Sindangmulya 04."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ekstrakurikuler --}}
        <div class="mt-8">
            <div class="text-center mb-6" data-aos="fade-up">
                <h2 class="text-base font-bold text-gray-800">Ekstrakurikuler</h2>
                <div class="w-16 h-1 bg-yellow-400 mx-auto mt-2"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                @foreach([['icon'=>'fa-book-open','name'=>'Pramuka','color'=>'yellow'],['icon'=>'fa-futbol','name'=>'Futsal','color'=>'green'],['icon'=>'fa-hand-fist','name'=>'Pencak Silat','color'=>'red'],['icon'=>'fa-shield-halved','name'=>'Karate','color'=>'blue']] as $ekskul)
                <div class="bg-white rounded-xl p-4 text-center shadow-md card-hover" data-aos="fade-up">
                    <div class="w-10 h-10 bg-{{ $ekskul['color'] }}-100 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas {{ $ekskul['icon'] }} text-{{ $ekskul['color'] }}-600 text-lg"></i>
                    </div>
                    <p class="font-bold text-gray-700 text-xs">{{ $ekskul['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
