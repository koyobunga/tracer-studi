<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Alumni
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()){
            if(Auth::user()->level == 'alumni')
                return $next($request);
            return redirect('/')->with('Anda bukan Alumni !');
        }
        return redirect('/')->with('Silahkan login terlebih dahulu !');
    }
}
