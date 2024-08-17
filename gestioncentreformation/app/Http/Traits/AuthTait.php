<?php
namespace App\Http\Traits;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;


trait AuthTait{
    public function chekGuard($request)
    {
        if($request->type  == 'etudiant'){
            $guardName= 'etudiant';
        }

        elseif($request->type  == 'professeur'){
            $guardName= 'professeur';
        }

        elseif($request->type  == 'admin'){
            $guardName= 'admin';
        }
        
        return $guardName;
    }

    public function redirect($request)
    {
        if ($request->type == 'etudiant') {
            return redirect()->intended(RouteServiceProvider::ETUDIANT);
        }

        elseif ($request->type == 'professeur') {
            return redirect()->intended(RouteServiceProvider::PROFESSEUR);
        }

        elseif ($request->type == 'admin') {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

    }
}

