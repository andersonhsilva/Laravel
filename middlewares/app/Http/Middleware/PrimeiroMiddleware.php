<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class PrimeiroMiddleware
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
        Log::debug('passou pelo primeiro middleware com o nome!');

        // parei a proximo request que possivelmente será alguma rotina de verificação do sistema filtro e etc
        return response('Proibido o next!');
        // return $next($request);
    }
}