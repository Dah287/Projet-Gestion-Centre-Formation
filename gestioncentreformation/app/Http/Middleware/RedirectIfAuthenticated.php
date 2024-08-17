<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class RedirectIfAuthenticated
{

    public function handle($request, \Closure $next)
    {
        if (auth('admin')->check()) {
            return redirect(RouteServiceProvider::ADMIN);
        }

        if (auth('etudiant')->check()) {
            return redirect(RouteServiceProvider::ETUDIANT);
        }

        if (auth('professeur')->check()) {
            return redirect(RouteServiceProvider::PROFESSEUR);
        }

        return $next($request);
    }

    
}