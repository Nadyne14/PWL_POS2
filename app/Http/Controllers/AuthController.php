<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('m_user.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = UserModel::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user info in session
            Session::put('user_id', $user->user_id);
            Session::put('username', $user->username);
            Session::put('nama', $user->nama);
            Session::put('level_id', $user->level_id);

            // Add success notification
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil. Selamat datang, ' . $user->nama . '!');
        } else {
            // Add error notification
            return redirect()->back()->withErrors(['login_error' => 'Username atau password salah'])->withInput();
        }
    }

    // Handle logout
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
