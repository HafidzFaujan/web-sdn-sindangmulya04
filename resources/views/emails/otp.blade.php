<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 20px; }
        .container { max-width: 480px; margin: 0 auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #1d4ed8, #3b82f6); padding: 32px 24px; text-align: center; }
        .header img { width: 70px; height: 70px; object-fit: contain; margin-bottom: 12px; }
        .header h1 { color: white; font-size: 20px; margin: 0; font-weight: 700; }
        .header p { color: #bfdbfe; font-size: 13px; margin: 4px 0 0; }
        .body { padding: 32px 24px; text-align: center; }
        .body p { color: #374151; font-size: 15px; margin-bottom: 8px; }
        .otp-box { background: #eff6ff; border: 2px dashed #3b82f6; border-radius: 12px; padding: 20px; margin: 24px 0; }
        .otp-code { font-size: 42px; font-weight: 800; color: #1d4ed8; letter-spacing: 12px; }
        .expire { color: #6b7280; font-size: 13px; margin-top: 16px; }
        .warning { background: #fef3c7; border-left: 4px solid #f59e0b; padding: 12px 16px; border-radius: 8px; text-align: left; margin-top: 16px; font-size: 13px; color: #92400e; }
        .footer { background: #f9fafb; padding: 16px 24px; text-align: center; font-size: 12px; color: #9ca3af; border-top: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">

            <h1>SDN Sindangmulya 04</h1>
            <p>Kabupaten Bekasi</p>
        </div>
        <div class="body">
            <p>Halo, Admin!</p>
            <p>Berikut adalah kode OTP untuk login ke Panel Admin:</p>
            <div class="otp-box">
                <div class="otp-code">{{ $otpCode }}</div>
            </div>
            <p class="expire">⏱ Kode ini berlaku selama <strong>5 menit</strong></p>
            <div class="warning">
                ⚠️ Jangan bagikan kode ini kepada siapapun. Jika Anda tidak merasa melakukan login, abaikan email ini.
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} SDN Sindangmulya 04 · Panel Admin
        </div>
    </div>
</body>
</html>
