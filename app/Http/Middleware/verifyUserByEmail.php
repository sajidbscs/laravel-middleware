<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class verifyUserByEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   
    public function handle($request, Closure $next)
    {
       
        $user = \App\User::findOrFail(Auth::id());
       if($user->status == 0)
        Auth::logout();
        return redirect('login')->with('message','You Need to Verify Your Account First,Check You Email');

        return $next($request);
    }
}
