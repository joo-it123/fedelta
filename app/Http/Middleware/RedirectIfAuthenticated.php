<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
<<<<<<< HEAD

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
=======
    
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                return redirect('/index'); // 認証済みの場合、'/index' にリダイレクト
            }
        }
    
        // リクエストがログインページに対するものでない場合にのみリダイレクト
        if ($request->routeIs('login')) {
            return $next($request);
        }
        if ($request->routeIs('register')) {
            return $next($request);
        }
    
        return redirect('/login');
    }
    
}
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
