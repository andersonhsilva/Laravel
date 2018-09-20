<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('corpo');
});

Route::get('primeiraView', function() {
  return view('minhaView');
});

Route::get('/ola', function() {
    $result = view('minhaView')
    ->with('nome', 'Anderson')
    ->with('sobrenome', 'Henrique');
    return $result;
});

Route::get('/ola/{nome}/{sobrenome}', function($nome=null, $sobrenome=null) {

    /* primeira forma
    $result = view('minhaView')
    ->with('nome', $nome)
    ->with('sobrenome', $sobrenome);
    */

    /* segunda forma
    $parametros = ['nome' => $nome, 'sobrenome' => $sobrenome];
    $result = view('minhaView', $parametros);
    */

    // terceira forma e melhor forma -> a função compact do php gera um array automaticamente com os dados passados como parametros
    $result = view('minhaView', compact('nome', 'sobrenome'));

    return $result;
});

Route::get('/email/{email}', function($email){
  if (View::exists('email')){
    return view('email', compact('email'));
  } else {
    return view('erro');
  }
});
