<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{

    public function handle($request, Closure $next)
    {
        if (auth()->user()->isAdmin == 1) {
            return $next($request);
        }
        return response(['message' => 'Вы не админ'], 403);
    }
}
