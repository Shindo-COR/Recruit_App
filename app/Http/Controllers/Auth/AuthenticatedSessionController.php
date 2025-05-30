<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 入力バリデーション
        // ユーザー作成（User::create）
        // 自動ログイン（Auth::login）
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));


        //  権限によってリダイレクト先を変更
        $user = Auth::user();
        if ($user->role === 1) { // オーナー
            return redirect()->intended('/company/recruits');
        } elseif ($user->role === 0) { // 通常ユーザー
            return redirect()->intended('/user/recruits');
        }elseif ($user->role === 2) { // admin
            return redirect()->intended('/admin/companies');
        }else {
            return redirect()->intended('/dashboard'); // 保険用
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
