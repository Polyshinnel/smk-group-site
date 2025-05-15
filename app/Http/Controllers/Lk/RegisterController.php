<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
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
            'title' => 'Регистрация',
            'description' => 'Страница регистрации'
        ];

        return view('lk.auth.register', compact('pageInfo'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organization' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Обработка телефона
        $phone = $request->phone;
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        if (Str::startsWith($phone, '8')) {
            $phone = '7' . substr($phone, 1);
        }
        
        if (!Str::startsWith($phone, '7')) {
            $phone = '7' . $phone;
        }

        if (strlen($phone) !== 11) {
            return redirect()->back()
                ->withErrors(['phone' => 'Неверный формат телефона'])
                ->withInput();
        }

        // Создание пользователя
        $user = \App\Models\User::create([
            'organization' => $request->organization,
            'name' => $request->name,
            'phone' => $phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Авторизация пользователя
        auth()->login($user);

        return redirect('/lk/await');
    }
}
