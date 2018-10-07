<?php

namespace App\Http\Middleware;

use Closure;

class ProdutoAdmin
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
    // se existir uma sessão de login faz o seguinte
    if ($request->session()->exists('login')){

      // captura os dados de array do login na sessao
      $login = $request->session()->get('login');
      if ($login['admin']){
        return $next($request);
      } else {
        return redirect()->route('negadoLogin');
      }
    }
    // atenção! cuidado com os elses do if pois sempre tem que ter um retorno para uma rota nos middlewares
    return redirect()->route('negado');

  }
}
