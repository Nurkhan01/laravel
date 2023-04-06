<?php

namespace App\Http\Middleware\OwnMiddleware\RoleMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()->hasRole('admin')){
//            abort(403, 'Доступ запрещен');
            throw new AccessDeniedHttpException('Доступ запрещен');
        }
        return $next($request);
    }
}
