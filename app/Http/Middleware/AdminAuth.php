<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if ($request->user()->isAdmin() || $request->user()->isModerator()) {
                return $next($request);
            }
        }

        abort(403);
    }
}
