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
        body { font-family: 'Poppins', sans-serif; font-size: 16px; }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.15); border-left: 4px solid #f59e0b; }
    </style>
</head>
<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-72 bg-blue-600 text-white flex flex-col flex-shrink-0">
        <div class="p-6 border-b border-blue-500">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-14 object-contain">
                <div>
                    <div class="font-bold text-sm leading-tight">SDN Sindangmulya 04</div>
                    <div class="text-blue-200 text-xs mt-0.5">Panel Admin</div>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt w-5 text-lg"></i><span>Dashboard</span>
            </a>
            <div class="pt-4 pb-2 text-xs text-blue-200 uppercase tracking-widest px-4 font-semibold">Konten</div>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                <i class="fas fa-newspaper w-5 text-lg"></i><span>Berita</span>
            </a>
            <a href="{{ route('admin.guru.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher w-5 text-lg"></i><span>Data Guru</span>
            </a>
            <a href="{{ route('admin.sarana.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base {{ request()->routeIs('admin.sarana*') ? 'active' : '' }}">
                <i class="fas fa-school w-5 text-lg"></i><span>Sarana & Prasarana</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                <i class="fas fa-images w-5 text-lg"></i><span>Galeri</span>
            </a>
            <div class="pt-4 pb-2 text-xs text-blue-200 uppercase tracking-widest px-4 font-semibold">Lainnya</div>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base">
                <i class="fas fa-globe w-5 text-lg"></i><span>Lihat Website</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg text-base {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-users-cog w-5 text-lg"></i><span>Kelola Akun Admin</span>
            </a>
        </nav>

        <div class="p-5 border-t border-blue-500">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-blue-900 text-base"></i>
                </div>
                <div>
                    <div class="text-base font-semibold">{{ Auth::user()->name }}</div>
                    <div class="text-blue-200 text-sm">Administrator</div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-base py-2.5 px-4 rounded-lg transition flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm px-8 py-5 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
            <div class="text-base text-gray-500">{{ now()->format('l, d F Y') }}</div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-8">
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
