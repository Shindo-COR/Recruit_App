<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_num' => $request->phone_num, // 追加
            'password' => Hash::make($request->password),
            // 'role' => 'user',
            'role' => (int)$request->role,
        ]);

        event(new Registered($user));

        // Auth::login($user);//自動ログイン


        // return redirect()->intended(RouteServiceProvider::HOME);
        // return redirect(route('dashboard', absolute: false));//登録後の遷移先
        //  return redirect(route('login',absolute: false));
          return redirect()->route('login');//登録後→ログイン画へ
    }
}
