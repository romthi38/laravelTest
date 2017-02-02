<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\RightManagement;

class AuthenticateAdmin
{    
    public function handle($request, Closure $next)
    {      
        if(Auth::check() && RightManagement::authIs('super admin')) {
            return $next($request);
        } else {
            return redirect('/');
        }        
    }
}
