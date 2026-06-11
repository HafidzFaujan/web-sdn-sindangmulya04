<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - SDN Sindangmulya 04</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }
    .otp-input { letter-spacing: 0.5rem; font-size: 2rem; text-align: center; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative">
    <div class="absolute inset-0">
        <img src="{{ asset('images/bgloginsekolah.jpeg') }}" class="w-full h-full object-cover" alt="Background">
        <div class="absolute inset-0 bg-blue-900/60"></div>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 relative z-10">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-envelope-open-text text-blue-600 text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Verifikasi OTP</h1>
            <p class="text-gray-500 text-sm mt-2">Masukkan kode 6 digit yang dikirim ke</p>
            <p class="text-blue-600 font-semibold text-sm">{{ session('otp_email') }}</p>
        </div>

        @if(session('info'))
        <div class="bg-blue-50 border border-blue-200 text-blue-600 px-4 py-3 rounded-lg mb-5 text-sm text-center">
            <i class="fas fa-info-circle mr-2"></i>{{ session('info') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-5 text-sm text-center">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.otp.verify') }}" method="POST">
            @csrf
            <div class="mb-6">
                <input type="text" name="otp" maxlength="6" required autofocus
                    class="otp-input w-full border-2 border-gray-300 rounded-xl px-4 py-4 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    placeholder="______">
            </div>
            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-check-circle"></i><span>Verifikasi</span>
            </button>
        </form>

        <div class="text-center mt-6 space-y-2">
            <p class="text-gray-600 text-xs">Kode berlaku selama <strong>5 menit</strong></p>
            <a href="{{ route('admin.login') }}" class="text-blue-600 hover:text-blue-800 text-sm block">
                <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
            </a>
        </div>
    </div>

    {{-- Timer countdown --}}
    <script>
        let seconds = 300;
        const timer = setInterval(() => {
            seconds--;
            if (seconds <= 0) {
                clearInterval(timer);
                document.querySelector('button[type=submit]').disabled = true;
                document.querySelector('button[type=submit]').textContent = 'OTP Kadaluarsa';
                document.querySelector('button[type=submit]').classList.add('opacity-50');
            }
        }, 1000);
    </script>
</body>
</html>
