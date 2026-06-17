<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Step 1: Tampilkan form login
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    // Step 2: Verifikasi email+password, kirim OTP
    public function login(Request $request)
    {
        $request->validate([
            'email'              => 'required|email',
            'password'           => 'required',
            'g-recaptcha-response' => app()->environment('production') ? 'required' : 'nullable',
        ]);

        // Verifikasi reCAPTCHA (skip di local/testing)
        if (app()->environment('production')) {
            $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            if (!$recaptcha->json('success')) {
                return back()->withErrors(['recaptcha' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.'])->withInput();
            }
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }

        // Hapus OTP lama
        Otp::where('email', $request->email)->delete();

        // Generate OTP 6 digit
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Simpan OTP ke database
        Otp::create([
            'email'      => $request->email,
            'otp'        => $otpCode,
            'expires_at' => now()->addMinutes(5),
            'used'       => false,
        ]);

        // Kirim OTP ke email
        Mail::to($request->email)->send(new OtpMail($otpCode));

        // Simpan email di session untuk verifikasi OTP
        session(['otp_email' => $request->email]);

        return redirect()->route('admin.otp.form')->with('info', 'Kode OTP telah dikirim ke email Anda.');
    }

    // Step 3: Tampilkan form OTP
    public function otpForm()
    {
        if (!session('otp_email')) {
            return redirect()->route('admin.login');
        }
        return view('admin.otp');
    }

    // Step 4: Verifikasi OTP
    public function otpVerify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $email = session('otp_email');

        if (!$email) {
            return redirect()->route('admin.login');
        }

        $otp = Otp::where('email', $email)
            ->where('otp', $request->otp)
            ->where('used', false)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah atau sudah kadaluarsa.']);
        }

        // Tandai OTP sudah dipakai
        $otp->update(['used' => true]);

        // Login user
        $user = User::where('email', $email)->first();
        Auth::login($user);
        session()->forget('otp_email');
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
