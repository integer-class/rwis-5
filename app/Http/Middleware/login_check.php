<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class login_check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->level == $level) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
