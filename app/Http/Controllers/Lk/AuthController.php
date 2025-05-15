<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->session()->has('user_id')) {
            $user = \App\Models\User::find($request->session()->get('user_id'));
            
            if ($user && $user->verified) {
                return redirect('/lk/main');
            }
        }

        $pageInfo = [
            'title' => 'Авторизация',
            'description' => 'Страница авторизации'
        ];

        return view('lk.auth.auth', compact('pageInfo'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Создаем сессию сроком на год с ID пользователя
            $request->session()->put('user_id', Auth::id());
            $request->session()->put('expires_at', now()->addYear());
            
            return redirect()->intended('/lk/main');
        }

        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email');
    }
}
