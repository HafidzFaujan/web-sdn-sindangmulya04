<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SDN Sindangmulya 04</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; font-size: 13px; }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.15); border-left: 4px solid #f59e0b; }
    </style>
</head>
<body class="bg-gray-100">

{{-- Mobile warning --}}
<div class="md:hidden fixed inset-0 z-50 bg-blue-700 flex items-center justify-center p-6 text-center">
    <div>
        <i class="fas fa-desktop text-white text-5xl mb-4"></i>
        <h2 class="text-white font-bold text-xl mb-2">Gunakan Laptop/PC</h2>
        <p class="text-blue-200 text-sm">Panel admin tidak mendukung tampilan mobile. Silakan buka menggunakan laptop atau komputer.</p>
    </div>
</div>

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-56 bg-blue-600 text-white flex flex-col flex-shrink-0">
        <div class="p-4 border-b border-blue-500">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 object-contain">
                <div>
                    <div class="font-bold text-xs leading-tight">SDN Sindangmulya 04</div>
                    <div class="text-blue-200 text-xs mt-0.5">Panel Admin</div>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt w-4 text-sm"></i><span>Dashboard</span>
            </a>
            <div class="pt-3 pb-1 text-xs text-blue-200 uppercase tracking-widest px-3 font-semibold">Konten</div>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                <i class="fas fa-newspaper w-4 text-sm"></i><span>Berita</span>
            </a>
            <a href="{{ route('admin.guru.index') }}" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher w-4 text-sm"></i><span>Data Guru</span>
            </a>
            <a href="{{ route('admin.sarana.index') }}" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.sarana*') ? 'active' : '' }}">
                <i class="fas fa-school w-4 text-sm"></i><span>Sarana & Prasarana</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                <i class="fas fa-images w-4 text-sm"></i><span>Galeri</span>
            </a>
            <div class="pt-3 pb-1 text-xs text-blue-200 uppercase tracking-widest px-3 font-semibold">Lainnya</div>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm">
                <i class="fas fa-globe w-4 text-sm"></i><span>Lihat Website</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link flex items-center space-x-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-users-cog w-4 text-sm"></i><span>Kelola Akun Admin</span>
            </a>
        </nav>

        <div class="p-4 border-t border-blue-500">
            <div class="flex items-center space-x-2 mb-3">
                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-blue-900 text-xs"></i>
                </div>
                <div>
                    <div class="text-sm font-semibold">{{ Auth::user()->name }}</div>
                    <div class="text-blue-200 text-xs">Administrator</div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-xs py-2 px-3 rounded-lg transition flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm px-6 py-3 flex justify-between items-center">
            <h1 class="text-base font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
            <div class="text-xs text-gray-500">{{ now()->format('l, d F Y') }}</div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-lg mb-5 flex items-center justify-between text-base">
                <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900"><i class="fas fa-times"></i></button>
            </div>
            @endif
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-5 py-4 rounded-lg mb-5 text-base">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
