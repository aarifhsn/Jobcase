<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        $role_name = is_null($role) ? $request->route('role') : $role;
        if (!Auth::user()->hasRole($role_name)) {
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        return $next($request);
    }
}
