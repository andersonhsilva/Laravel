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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projeto', function () {

  $desenvolvedores = Desenvolvedor::with('projetos')->get();

  foreach ($desenvolvedores as $d) {
    echo "<p>nome: ". $d->nome."<br>";
    echo "cargo: ". $d->cargo."</p>";
    if (count($d->projetos) > 0){
      echo "<ul>";
      foreach ($d->projetos as $p) {
        echo "<b>-----Projetos-----</b>: <br>";
        echo "<li>Nome: ".$p->nome."</li>";
        echo "<li>Horas estimadas:".$p->estimativa_horas."</li>";
      }
      echo "</ul>";
    }
    echo "<hr>";
  }

});
