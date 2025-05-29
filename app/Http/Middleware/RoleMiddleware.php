<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
            $user = Auth::user();

    // 文字列引数 → 整数に変換して比較
    $roles = array_map('intval', $role);

    if (!$user || !in_array($user->role, $roles, true)) {
        abort(403); // 権限なし
    }

    return $next($request);
        // return $next($request);

    }
}
