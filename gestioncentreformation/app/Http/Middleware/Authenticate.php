<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

     protected function redirectTo(Request $request)
     {
         if (!$request->expectsJson()) {
             if ($request->is(app()->getLocale() . 'etudiant/indexEtudiant')) {
                 return route('selection');
             } elseif ($request->is(app()->getLocale() . '/professeur/indexProfesseur')) {
                 return route('selection');
             } elseif ($request->is(app()->getLocale() . '/admin/indexAdmin')) {
                 return route('selection');
             }
         }
     }
     
}
