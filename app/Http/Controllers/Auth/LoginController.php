<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //  Commented out to add Muli -redirects

    // protected $redirectTo = RouteServiceProvider::HOME;

    // Added authenticated Function for redirects
    public function authenticated(){

        if(Auth::user() ->role_as == '1'){

            // if Admin - redirect to Admin /dashboard
            return redirect('admin/dashboard')->with('status','Welcome to Admin Dashboard');

        }else{

            //  redirect to homepage
             return redirect('/home')->with('status','Logged In Successfully');

        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
