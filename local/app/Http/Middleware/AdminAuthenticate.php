<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{

    public function handle(Request $request, Closure $next,$guard='admin')
    {
        //Auth::guard('admin')->check() kiem tra dang nhap hay chua
        // neu chua dang nhap thi cho ve login
        if(Auth::guard($guard)->check()){
            return redirect()->intended('admin/loginQl');
        }
        return $next($request);
    }
}
