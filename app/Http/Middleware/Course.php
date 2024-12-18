<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Course
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, аутентифицирован ли пользователь
        if (!auth()->check()) {
            // Если пользователь не аутентифицирован, перенаправляем на страницу входа
            return redirect()->route('auth.login')->with('error', 'You must be logged in to access this page.');
        }

        // Если пользователь аутентифицирован, пропускаем запрос
        return $next($request);
    }
}
