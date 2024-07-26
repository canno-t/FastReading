<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GameMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(empty($request['time'])){
            $request['time'] = 60;
        }
        if($request['time']>120){
            $request['time'] = 120;
        }
        else if($request['time']<15){
            $request['time'] = 15;
        }
        return $next($request);
    }
}
