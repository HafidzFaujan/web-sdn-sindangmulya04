<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SDN Sindangmulya 04</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative">
    {{-- Background --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/bgloginsekolah.jpeg') }}" class="w-full h-full object-cover" alt="Background">
        <div class="absolute inset-0 bg-blue-950/50"></div>
    </div>

<div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 relative z-10">
    <div class="text-center mb-9">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-20 object-contain mx-auto mb-5">
        <h1 class="text-2xl font-bold text-gray-800">LOGIN ADMIN</h1>
        <p class="text-gray-900 text-sm mt-1 font-bold">SDN Sindangmulya 04</p>
    </div>

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6 text-sm">
        <i class="fas fa-exclamation-circle mr-2"></i>{{ $errors->first() }}
    </div>
    @endif

    <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-600"></i>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full pl-10 pr-4 py-3 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    placeholder="admin@sekolah.com">
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-600"></i>
                <input type="password" name="password" required
                    class="w-full pl-10 pr-4 py-3 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                    placeholder="********">
            </div>
        </div>


        {{-- reCAPTCHA --}}
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        @error('recaptcha')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
            <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
        </button>
    </form>

    <div class="text-center mt-6">
        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 text-sm"><i class="fas fa-arrow-left mr-1"></i>Kembali ke Website</a>
    </div>
</div>

</body>
</html>
