<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // هذا السطر اللي يحل المشكلة

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // هنا استخدمنا Auth:: بدل ()auth حتى يفهمها المحرر
        if (Auth::check() && Auth::user()->role !== 'user') {
            return $next($request);
        }

        return redirect('/')->with('error', 'عذراً، لا تملك صلاحية الوصول لهذه الصفحة.');
    }
}