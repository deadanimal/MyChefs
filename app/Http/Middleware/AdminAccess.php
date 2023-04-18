<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::check() && \Auth::user()->user_type == 'admin') {
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
