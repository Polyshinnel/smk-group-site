<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect('/lk/auth');
        }

        $user = User::find(session('user_id'));

        if (!$user) {
            session()->forget('user_id');
            return redirect('/lk/auth');
        }

        if (!$user->verified) {
            return redirect('/lk/await');
        }

        return $next($request);
    }
} 