<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Trainer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user() && $request->user()->roll_id !='2' )
        {
            abort(403, 'Sorry You Have No Permission!');
        }
        return $next($request);
    }
}
