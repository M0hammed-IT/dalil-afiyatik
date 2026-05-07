<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('login');
    }

    // التحقق من البيانات وتسجيل الدخول
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // إذا البيانات صحيحة، دخله للوحة التحكم
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // إذا غلط، رجعه وطلعله خطأ
        return back()->withErrors([
            'email' => 'الإيميل أو كلمة المرور غير صحيحة.',
        ])->onlyInput('email');
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}