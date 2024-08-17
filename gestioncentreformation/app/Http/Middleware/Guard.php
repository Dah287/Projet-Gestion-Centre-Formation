<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Professeur;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Guard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if (session()->has('id') && session()->has('role')){

            if(session()->get('role') == $role && $role == 'admin'){
                $user = Admin::find(session()->get('id'));
                if($user == null){
                    session()->flush();                
                    return abort(403, 'Unauthorized access');
                }
                else
                    return $next($request);
            }
        
            if(session()->get('role') == $role && $role == 'etudiant'){
                $user = Etudiant::find(session()->get('id'));
                if($user == null){
                    session()->flush();                
                    return abort(403, 'Unauthorized access');
                }
                else
                    return $next($request);
            }
        

            if(session()->get('role') == $role && $role == 'professeur'){
                $user = Professeur::find(session()->get('id'));
                if($user == null){
                    session()->flush();                
                    return abort(403, 'Unauthorized access');
                }
                else
                    return $next($request);
            }
           
            return abort(403, 'Unauthorized access');
        }
        return redirect('selection');
    }
}
