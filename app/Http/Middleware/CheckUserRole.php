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
            // Если пользователь не администратор и пытается зайти на страницу администратора
            if ($request->routeIs('admin.view')) {
                return redirect()->route('profile.view'); // Перенаправляем на профиль
            }
        } else {
            // Если администратор пытается зайти на страницу профиля
            if ($request->routeIs('profile.view')) {
                return redirect()->route('admin.view'); // Перенаправляем на админку
            }
        }

        return $next($request); // Если всё в порядке, продолжаем
    }
}
