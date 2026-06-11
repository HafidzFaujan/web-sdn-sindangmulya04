<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SDN SindangMulya 04 - Kab. Bekasi')</title>
    <meta name="description" content="Website Resmi SDN Sindangmulya 04 Kabupaten Bekasi">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a56db',
                        secondary: '#f59e0b',
                    }
                }
            }
        }
    </script>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-overlay { background: linear-gradient(135deg, rgba(26,86,219,0.85) 0%, rgba(26,86,219,0.6) 100%); }
        .nav-link { transition: all 0.3s ease; }
        .nav-link:hover { color: #f59e0b; }
        .nav-link.active { color: #f59e0b; border-bottom: 2px solid #f59e0b; }
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .guru-card img { transition: transform 0.3s ease; }
        .guru-card:hover img { transform: scale(1.05); }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <!-- Logo & Nama -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Sindangmulya 04" class="h-14 w-14 object-contain">
                    <div class="text-white">
                        <div class="font-bold text-sm md:text-base leading-tight">SDN SINDANGMULYA 04</div>
                        <div class="text-xs md:text-sm text-blue-200">Cibarusah</div>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
                    <a href="{{ route('guru') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('guru') ? 'active' : '' }}">Guru</a>
                    <a href="{{ route('sarana') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('sarana') ? 'active' : '' }}">Sarana & Prasarana</a>
                    <a href="{{ route('berita') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('berita*') ? 'active' : '' }}">Berita</a>
                    <a href="{{ route('galeri') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
                    <a href="{{ route('kontak') }}" class="nav-link text-white px-4 py-2 text-lg font-medium {{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-800 px-4 pb-4">
            <a href="{{ route('home') }}" class="block text-white py-2 text-base">Beranda</a>
            <a href="{{ route('profil') }}" class="block text-white py-2 text-base">Profil</a>
            <a href="{{ route('guru') }}" class="block text-white py-2 text-base">Guru</a>
            <a href="{{ route('sarana') }}" class="block text-white py-2 text-base">Sarana & Prasarana</a>
            <a href="{{ route('berita') }}" class="block text-white py-2 text-base">Berita</a>
            <a href="{{ route('galeri') }}" class="block text-white py-2 text-base">Galeri</a>
            <a href="{{ route('kontak') }}" class="block text-white py-2 text-base">Kontak</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Info Sekolah -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 object-contain">
                        <div>
                            <div class="font-bold">SDN Sindangmulya 04</div>
                            <div class="text-blue-300 text-sm">Kabupaten Bekasi</div>
                        </div>
                    </div>
                    <p class="text-blue-200 text-sm leading-relaxed">
                      Berkomitmen dalam mewujudkan pendidikan dasar yang berkualitas, berkarakter, dan berlandaskan nilai-nilai keislaman bagi seluruh peserta didik.
                    </p>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="font-semibold text-yellow-400 mb-4">Link Cepat</h3>
                    <ul class="space-y-2 text-sm text-blue-200">
                        <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition">Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="hover:text-yellow-400 transition">Profil Sekolah</a></li>
                        <li><a href="{{ route('guru') }}" class="hover:text-yellow-400 transition">Data Guru</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-yellow-400 transition">Berita & Pengumuman</a></li>
                        <li><a href="{{ route('galeri') }}" class="hover:text-yellow-400 transition">Galeri</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-yellow-400 transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="font-semibold text-yellow-400 mb-4">Kontak Kami</h3>
                    <ul class="space-y-3 text-sm text-blue-200">
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-map-marker-alt mt-1 text-yellow-400"></i>
                            <span>Kp. Cikoronjo, Sindangmulya, Kec. Cibarusah, Kabupaten Bekasi, Jawa Barat 17330</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-yellow-400"></i>
                            <span>sindangmulyaempatsdn@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-700 mt-4 pt-3 flex flex-col md:flex-row justify-between items-center text-sm text-blue-300">
                <p>&copy; {{ date('Y') }} SDN Sindangmulya 04. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
