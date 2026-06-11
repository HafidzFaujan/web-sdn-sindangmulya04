@extends('layouts.frontend')
@section('title', 'Profil Sekolah - SDN Sindangmulya 04')
@section('content')

<div class="bg-blue-700 py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-white" data-aos="fade-up">Profil Sekolah</h1>
        <p class="text-blue-200 mt-2" data-aos="fade-up">SDN Sindangmulya 04 Kabupaten Bekasi</p>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang Sekolah</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    SDN Sindangmulya 04 adalah sekolah dasar negeri yang berlokasi di Desa Sindangmulya, Kecamatan Cibarusah, Kabupaten Bekasi, Jawa Barat. Sebagai salah satu lembaga pendidikan dasar di wilayah Cibarusah, kami berkomitmen untuk memberikan pendidikan yang berkualitas, inklusif, dan berkarakter bagi setiap peserta didik..
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                   Kami percaya bahwa setiap anak memiliki potensi yang unik dan berharga. Oleh karena itu, SDN Sindangmulya 04 menghadirkan lingkungan belajar yang nyaman, aman, dan menyenangkan, di mana siswa tidak hanya dibimbing untuk unggul secara akademik, tetapi juga ditanamkan nilai-nilai moral, keagamaan, dan kedisiplinan sebagai bekal kehidupan.
                </p>
            
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-blue-50 rounded-xl p-4">
                        <div class="text-blue-700 font-bold text-lg">NPSN</div>
                        <div class="text-gray-600 text-sm">20218189</div>
                    </div>
                    <div class="bg-yellow-50 rounded-xl p-4">
                        <div class="text-yellow-700 font-bold text-lg">Akreditasi</div>
                        <div class="text-gray-600 text-sm">B</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4 col-span-2 text-center">
                        <div class="text-green-700 font-bold text-lg">Status</div>
                        <div class="text-gray-600 text-sm">Negeri</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center" data-aos="fade-left">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Sindangmulya 04" class="w-64 h-64 object-contain drop-shadow-xl">
            </div>
        </div>

        {{-- Visi Misi --}}
        <div class="mb-16">
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800">Visi & Misi</h2>
                <div class="w-16 h-1 bg-black mx-auto mt-3"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-blue-700 rounded-2xl p-8 text-white" data-aos="fade-right">
                    <h3 class="text-2xl font-bold mb-4 flex items-center"><i class="fas fa-eye mr-3 text-yellow-400"></i>Visi</h3>
                    <p class="text-blue-100 leading-relaxed italic text-lg">
                        "Terwujudnya peserta didik yang beriman, bertaqwa, cerdas, terampil, berkarakter, dan berwawasan lingkungan."
                    </p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-8" data-aos="fade-left">
                    <h3 class="text-2xl font-bold mb-4 text-blue-700 flex items-center"><i class="fas fa-bullseye mr-3 text-yellow-500"></i>Misi</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-1 text-blue-600"></i>Menyelenggarakan pembelajaran yang aktif, kreatif, efektif, dan menyenangkan</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-1 text-blue-600"></i>Membentuk karakter siswa yang berakhlak mulia dan berbudi pekerti luhur</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-1 text-blue-600"></i>Meningkatkan prestasi akademik dan non-akademik siswa</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-1 text-blue-600"></i>Menciptakan lingkungan sekolah yang bersih, indah, dan nyaman</li>
                        <li class="flex items-start"><i class="fas fa-check-circle mr-2 mt-1 text-blue-600"></i>Menjalin kerjasama yang harmonis antara sekolah, orang tua, dan masyarakat</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Kepala Sekolah --}}
        @php $kepala = App\Models\Guru::where('kategori','kepala_sekolah')->where('is_active',true)->first(); @endphp
        <div class="bg-gradient-to-r from-blue-700 to-blue-600 rounded-2xl p-8 text-white" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-32 h-32 rounded-full overflow-hidden flex-shrink-0 border-4 border-white/30">
                    @if($kepala && $kepala->foto)
                        <img src="{{ asset('storage/' . $kepala->foto) }}" alt="{{ $kepala->nama }}" class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full bg-white/20 flex items-center justify-center">
                            <i class="fas fa-user-tie text-6xl text-white/70"></i>
                        </div>
                    @endif
                </div>
                <div>
                    <p class="text-yellow-400 font-semibold text-sm uppercase tracking-widest mb-2">Kepala Sekolah</p>
                    <h3 class="text-2xl font-bold mb-2">{{ $kepala ? $kepala->nama : '[Nama Kepala Sekolah]' }}</h3>
                    <p class="text-blue-100 leading-relaxed">
                        "Kami berkomitmen untuk terus meningkatkan kualitas pendidikan dan menciptakan lingkungan belajar yang kondusif bagi seluruh peserta didik SDN Sindangmulya 04."
                    </p>
                </div>
            </div>
        </div>

        {{-- Ekstrakurikuler --}}
        <div class="mt-16">
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800">Ekstrakurikuler</h2>
                <div class="w-16 h-1 bg-yellow-400 mx-auto mt-3"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach([['icon'=>'fa-book-open','name'=>'Pramuka','color'=>'yellow'],['icon'=>'fa-futbol','name'=>'Futsal','color'=>'green'],['icon'=>'fa-hand-fist','name'=>'Pencak Silat','color'=>'red'],['icon'=>'fa-shield-halved','name'=>'Karate','color'=>'blue']] as $ekskul)
                <div class="bg-white rounded-2xl p-8 text-center shadow-md card-hover" data-aos="fade-up">
                    <div class="w-24 h-24 bg-{{ $ekskul['color'] }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas {{ $ekskul['icon'] }} text-{{ $ekskul['color'] }}-600 text-4xl"></i>
                    </div>
                    <p class="font-bold text-gray-700 text-lg">{{ $ekskul['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
