<?php

namespace App\Http\Middleware;

use Closure;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if(!auth()->check() || auth()->user()->$role != true ){
            return redirect(route('index'));
        }
        return $next($request);
    }
}
