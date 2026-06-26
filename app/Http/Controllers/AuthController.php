<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    // ============ LOGIN ============
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // ============ REGISTER ============
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')
                         ->with('success', 'Akun berhasil dibuat! Selamat datang, ' . $user->name);
    }

    // ============ FORGOT PASSWORD ============
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Generate token
        $token = Str::random(60);
        
        // Simpan ke tabel password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]
        );

        // Kirim email (opsional, untuk demo kita tampilkan token langsung)
        // Untuk demo, kita redirect dengan pesan token
        return redirect()->route('password.reset', ['token' => $token, 'email' => $request->email])
                         ->with('success', 'Link reset password telah dikirim!');
    }

    // ============ RESET PASSWORD ============
    public function showResetForm($token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => request('email')
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Cari token di database
        $reset = DB::table('password_reset_tokens')
                   ->where('email', $request->email)
                   ->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors([
                'email' => 'Token tidak valid atau sudah kadaluarsa.'
            ]);
        }

        // Update password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')
                         ->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
    }
}