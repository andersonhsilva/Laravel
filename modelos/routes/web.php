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

use App\Categoria;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert/categoria/{nome}', function($nome) {
  $cat = new Categoria();
  $cat->nome = $nome;
  $cat->save();
  return redirect()->route('listar_categoria');
})->name('inserir_categoria')->where('nome','[A-za-z]+');

Route::get('/list/categoria/', function() {
  $cat = Categoria::all();
  echo json_encode($cat);
})->name('listar_categoria');

Route::get('/get/categoria/{id}', function($id) {
  $cat = Categoria::find($id);
  echo json_encode($cat);
})->name('captura_categoria_id')->where('id','[0-9]+');

Route::get('/get/categoria/{nome}', function($nome) {
  $cat = Categoria::where('nome', 'like', "%$nome%")->get();
  // retorna o resultado, só que com o json mais elaborado
  $result[0] = ["resultado" => $cat];
  $result[1] = ["qtd_registros" => $cat->count()];
  $result[2] = ["id_max" => $cat->max('id')];
  echo json_encode($result);
})->name('captura_categoria_nome')->where('nome','[A-za-z]+');

Route::get('/update/categoria/{id}/{nome}', function($id, $nome) {
  $cat = Categoria::find($id);
  $cat->nome = $nome;
  $cat->save();
  echo json_encode($cat);
})->name('atualizar_categoria')->where('id','[0-9]+')->where('nome','[A-za-z]+');

Route::get('/delete/categoria/{id}', function($id) {
  $cat = Categoria::find($id);
  $cat->delete();
  return redirect()->route('listar_categoria');
})->name('atualizar_categoria')->where('id','[0-9]+');
