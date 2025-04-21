<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\RoleEnum;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return $next($request);
    }

}
