<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {
        $roles = $this->CekRoute($request->route());
        
        //dd($next($request));

        if(Auth::guard()->check() && $request->user()->hasRole($roles) || !$roles)
        {
            
            return $next($request);
        }
        return abort(503, 'Anda tidak memiliki hak akses');
    }

    private function CekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
