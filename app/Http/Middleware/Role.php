<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Vérifie si l'utilisateur a le rôle spécifié
        if ($request->user() && $request->user()->hasRole($role)) {
            return $next($request);
        }

        // Redirige l'utilisateur vers la route précédente
        return redirect()->back();
    }
}
