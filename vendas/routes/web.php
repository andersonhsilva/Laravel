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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {

  // recupera todos os dados do banco na tabela especifica
  $categorias = DB::table('categorias')->get();

  // recupera todos os dados do banco na tabela especifica
  $categorias = DB::table('categorias')->where('id', 3)->get();

  // where avançado
  $categorias = DB::table('categorias')->where('nome', 'like', '%p%')->get();

  // sentenças lógicas
  $categorias = DB::table('categorias')->where('id', 1)->orWhere('id',2)->get();

  // intervalos
  $categorias = DB::table('categorias')->whereBetween('id', [1,3])->get();

  // intervalos com negação
  $categorias = DB::table('categorias')->whereNotBetween('id', [2,3])->get();

  // retornar conjunto
  $categorias = DB::table('categorias')->whereIn('id', [1,3,4])->get();

  // retornar os que não estão no conjunto
  $categorias = DB::table('categorias')->whereNotIn('id', [1,3,4])->get();

  // sentenças logicas de vários where's
  $categorias = DB::table('categorias')->where([
    ['id', 1],
    ['nome', 'roupas']
  ])->get();

  // ordenando por nome - asc / desc
  $categorias = DB::table('categorias')->orderBy('nome','desc')->get();

  // consultado pelo select da maneira tradicional
  $categorias = DB::select('select * from categorias where nome like ?', ['%p%']);

  //-----------------------------------------------------

  // recupera todos os dados do banco na tabela especifica apenas do primeiro elemento
  $categoria = DB::table('categorias')->where('id', 3)->first();

  // recupera apenas uma tupla do banco de dados de uma tabela especifica
  $nomes = DB::table('categorias')->pluck('nome');

  return view('categorias')
  ->with(compact('categorias','nomes'))
  ->with('uma_categoria', $categoria);

});

Route::get('/insert/categorias/{nome}', function ($nome) {

  //inseri no banco de forma onde tambem aceita varios de um array
  //$id = DB::table('categorias')->insertGetId([['nome' => $nome]]);

  //inseri no banco retornando o id do mesmo
  $id = DB::table('categorias')->insertGetId(['nome' => $nome]);
  if ($id){
    echo "Categoria cadastrada com sucesso -> ID: ".$id;
  }

});

Route::get('/update/categorias/{id}/{nome}', function ($id, $nome) {

  //atualiza no banco retornando o id do mesmo
  $categoria = DB::table('categorias')->where('id', $id)->update(['nome' => $nome]);

});
