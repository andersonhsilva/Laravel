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

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;
use Illuminate\Database\QueryException;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projeto', function () {

  $desenvolvedores = Desenvolvedor::with('projetos')->get();
//  return $desenvolvedores->toJson();


  foreach ($desenvolvedores as $d) {
    echo "<p>nome: ". $d->nome."<br>";
    echo "cargo: ". $d->cargo."</p>";
    if (count($d->projetos) > 0){
      echo "<ul>";
      foreach ($d->projetos as $p) {
        echo "<b>-----Projetos-----</b>: <br>";
        echo "<li>Nome: ".$p->nome."</li>";
        echo "<li>Horas estimadas: ".$p->estimativa_horas."</li>";
        echo "<li>Horas semanais: ".$p->pivot->horas_semanais."</li>";
      }
      echo "</ul>";
    }
    echo "<hr>";
  }


});

Route::get('/projeto_desenvolvedores', function () {

  $projeto = Projeto::with('desenvolvedores')->get();
  return $projeto->toJson();

});

Route::get('/alocar', function () {
  try {

    $projeto = Projeto::find(4);
    if (isset($projeto)){
      // adicionando um desenvolvedor no relacionamento
      // $projeto->desenvolvedores()->attach(2, ['horas_semanais' => 999]);

      // adicionar varios desenvolvedores simultaneamente no relacionamento
      $projeto->desenvolvedores()->attach([
        3 => ['horas_semanais' => 999],
      ]);
    }

    // verifica na exception se possui duplicidade no banco
  } catch (QueryException $e){
    if (strpos($e->getMessage(), 'Duplicate')){
        echo "não pode vincular o mesmo desenvolvedor em um projeto";
    }
  }

});

Route::get('/desalocar', function () {
  $projeto = Projeto::find(4);
  if (isset($projeto)){
    // removendo um ou varios desenvolvedores no relacionamento
    $projeto->desenvolvedores()->detach([2,3]);
  }

});
