<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in 
        if( Auth::check() ){

            // If - YES  Check if the logged in user is an admin

            if( Auth::user()->role_as == '1'){ // 1- Admin ; 0- user
            
                //if Admin - Proceed
                   return $next($request);

            }else{

                //If not
                return redirect('/home')->with('status','Access Denied ! As you are not an Admin');

            }

        }
        //If not logged in - Redirect to login
        else{

        return redirect('/login')->with('status','Please Login First ');

        }
     
    }
}
