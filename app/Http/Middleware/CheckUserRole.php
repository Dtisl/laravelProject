<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if (Auth::user()->is_admin === 0) {
            if ($request->routeIs('admin.view')) {
                return redirect()->route('profile.view');
            }
        } else {
            if ($request->routeIs('profile.view')) {
                return redirect()->route('admin.view');
            }
        }

        return $next($request);
    }
}
