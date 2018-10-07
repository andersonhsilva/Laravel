<?php

namespace App\Http\Middleware;

use Closure;
Use Log;

class SegundoMiddleware
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
    Log::debug('passou pelo segundo middleware com o nome!');
    return $next($request);
  }
}
