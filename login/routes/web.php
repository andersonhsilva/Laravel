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

use Illuminate\Http\Request;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function(){
  return "Acesso negado!";
})->name('negado');

Route::get('/negadoLogin', function(){
  return "Prezado usuario, voce precisa ser administrador para este tipo de conteudo!";
})->name('negadoLogin');

Route::get('/logout', function(Request $request){
  $request->session()->flush();
  return response("Deslogado com sucesso!", 200);
})->name('logout');

Route::post('/login', function(Request $request){

  $login_ok = false;
  $admin = false;
  $user = utf8_encode($request->input('user'));

  switch($user) {

    case 'João':
    $login_ok = $request->input('password') === "123456";
    $admin = true;
    break;

    case "Marcos":
    $login_ok = $request->input('password') === "142536";
    break;

    case 'default':
    $login_ok = false;

  }

  if ($login_ok){

    $login = [ 'user' => $user, 'admin' => $admin ];
    $request->session()->put('login', $login);
    return response('login ok', 200);

  } else {
    return response('Erro no login', 404);
  }


});
