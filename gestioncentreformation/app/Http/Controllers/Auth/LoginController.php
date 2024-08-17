<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AuthTait;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Professeur;
use Illuminate\Support\Facades\Session;




use function PHPSTORM_META\type;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
    use  AuthTait;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm($type){

        return view('auth.login',compact('type'));
    }


    public function login(Request $request){

    /*  if(Auth::guard($this->chekGuard($request))->attempt(['email'=> $request->email, 'pass'=> $request->password])){
            return $this->redirect($request);
       }*/

    //---------------------------------- Etudiant Login ----------------------------------
       if($request->type == 'etudiant')
       {
            $etudiant= Etudiant::where([['email',$request->email],['pass',$request->password]])->first();
                if( $etudiant != null)
                {
                    // Store a value in the session
                    Session::put('id', $etudiant->id);
                    Session::put('role', 'etudiant');
                    return $this->redirect($request);
                } 
                else
                    return back()->with('error', 'Email ou mot de passe incorrecte'); 
        }

        //---------------------------------- Professeur Login ----------------------------------
        if($request->type == 'professeur')
        {
             $professeur= Professeur::where([['email',$request->email],['password',$request->password]])->first();
                 if( $professeur != null)
                 {
                     // Store a value in the session
                     Session::put('id', $professeur->id);
                     Session::put('role', 'professeur');
                     return $this->redirect($request);
                 } 
                 else
                     return back()->with('error', 'Email ou mot de passe incorrecte'); 
         }
  

         //---------------------------------- Admin Login ----------------------------------
         if($request->type == 'admin')
         {
              $admin= Admin::where([['email',$request->email],['pass',$request->password]])->first();
                  if( $admin != null)
                  {
                      // Store a value in the session
                      Session::put('id', $admin->id);
                      Session::put('role', 'admin');
                      return $this->redirect($request);
                  } 
                  else
                      return back()->with('error', 'Email ou mot de passe incorrecte'); 
          }
      
    }


  /*  public function logout(Request $request)
    {
        Auth::logout(); // Clear the authenticated user's session data
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Generate a new CSRF token

        // Redirect the user to the desired page after logout
        return redirect('/login');
    }*/

            // Logout route or controller method
          /*  public function logout()
            {
                // Clear the session data
                Session::forget('id');
                // Redirect to the login page or any other desired page
                return redirect()->route('login')->with('success', 'Logged out successfully');
            }*/


           public function logout()
            {
                // Clear the user session
                Session::flush();                
                return redirect()->route('skillup')->with('success', 'Logged out successfully');

            }

        /*  public function logout()
            {
                // Perform logout logic

                if (Session::flush()) {
                    return redirect()->route('selection')->with('success', 'Logged out successfully');
                } else {
                    echo'just logout';
                }
            }*/

/*            public function logout()
{
    // Check if the user is already logged out
    // if (!auth()->check()) {
    //     return redirect()->route('selection')->with('success', 'You are already logged out.');
    // }
    

    // Clear the user session
   if(Session::flush() == null) {
       return redirect()->route('selection')->with('success', 'Logged out successfully');
   }
               
}*/
        
}