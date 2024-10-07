<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!is_null(Auth::user())) {
            if (Str::contains($request->url(), 'dashboard') == true) {
                return $next($request);
            } else if (Str::contains($request->url(), 'dashboard') == false) { //check admin user then redirect to admin dashboard
                return redirect()->to('/masters/dashboard');
            } else {
                return $next($request);
            }
        } else {
            return redirect()->to('/masters/dashboard');
        }
    }
}
