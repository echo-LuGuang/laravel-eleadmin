<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    private string $guard = 'admin';

    public function handle(Request $request, Closure $next): Response
    {
        Auth::shouldUse($this->guard);

        return $next($request);
    }
}
