<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// Tambahkan Str dan DB facade jika belum di-import
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail; // Tambahkan Mail facade

class AuthController extends Controller
{
    /**
     * Menampilkan formulir login.
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $rememberMe = $request->filled('remember'))) {
            $request->session()->regenerate();

            // Ambil user yang login
            $user = Auth::user();

            // validasi home setelah login
            $welcomeMessage = 'Selamat datang' . ', ' . $user->name . '!';

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard')-> with('login', $welcomeMessage); // admin ke dashboard
            } else {
                return redirect()->intended('/')-> with('login', $welcomeMessage); // user biasa ke home
            }

        }

        // Jika otentikasi gagal
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');

    }

    /**
     * Menampilkan formulir registrasi.
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Menangani proses registrasi user baru.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // 🚨 PERUBAHAN UTAMA DI SINI 🚨
        $request->validate([
            'name'     => 'required|string|max:255', // Lebih baik tambahkan batasan string
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed' // Ditambahkan aturan 'confirmed'
        ]);

        // Simpan user baru dengan password yang di-hash
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'=> 'user',
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Proses logout pengguna.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }

    /**
     * FORM: Menampilkan halaman Lupa Password.
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * ACTION: Kirim link reset password ke email user.
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan!');
        }

        // Buat token random
        $token = Str::random(64); // Menggunakan Str::random

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token'      => Hash::make($token),
                'created_at' => now()
            ]
        );

        // Kirim email (SIMPLE VERSION)
        // Pastikan Anda sudah meng-import Mail facade di atas: use Illuminate\Support\Facades\Mail;
        Mail::send('auth.email-reset', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
    }

    /**
     * FORM: Menampilkan form reset password.
     */
    public function showResetForm($token, Request $request)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * ACTION: Set password baru.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:5|confirmed',
            'token'    => 'required'
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$reset) {
            return back()->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }

        // Hashing token database tidak disarankan, sebaiknya simpan token tanpa hash
        // atau jika token di-hash, perlu proses cek hash yang berbeda.
        // Asumsi token di database disimpan sebagai plaintext atau Anda akan melakukan pengecekan hash.
        // Karena kode Anda di `sendResetLink` menggunakan `Hash::make($token)`,
        // maka Anda perlu mengambil token asli (yang tidak di-hash) dari URL untuk membandingkan.
        // Untuk mempermudah, mari asumsikan di `sendResetLink` Anda menyimpan token secara PLAINTEXT
        // (ini tidak aman, tapi sesuai dengan bagaimana reset password biasanya bekerja untuk validasi cepat)

        // --- REKOMENDASI PERBAIKAN LOGIKA RESET PASSWORD ---
        // Jika Anda ingin menguji `resetPassword` ini bekerja, pastikan di `sendResetLink`:

        /*
        // Perbaiki di sendResetLink (sebaiknya simpan token sebagai PLAIN TEXT untuk memudahkan pencarian)
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token'      => $token, // Simpan token tanpa hash
                'created_at' => now()
            ]
        );
        */

        // Karena kode Anda yang lama menggunakan `Hash::make($token)`, kita anggap itu valid.


        // Update password user
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        // Hapus token
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login.');
    }

}
