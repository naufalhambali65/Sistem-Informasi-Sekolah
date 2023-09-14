<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class is_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guest()){ // jika belum login (guest) atau bukan naufalhambali munculkan abort 403
            return redirect('/contact')->with('login', 'Anda Harus Login Dahulu!');
        }
        return $next($request);
    }
}
