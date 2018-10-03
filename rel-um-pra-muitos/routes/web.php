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
use App\Produto;

Route::get('/categorias', function () {
    $cats = Categoria::all();
    if (count($cats) === 0) {
      echo "<h4>Voce não possui nenhuma categoria cadastrada</h4>";
    } else {
      foreach ($cats as $c) {
        echo "<p>".$c->id." - ".$c->nome."</p>";
      }
    }
});


Route::get('/cat_prod', function () {
    $cats = Categoria::all();
    if (count($cats) === 0) {
      echo "<h4>Voce não possui nenhuma categoria cadastrada</h4>";
    } else {
      foreach ($cats as $c) {
        echo "<p>".$c->id." - ".$c->nome."</p>";
        $produtos = $c->produtos; // captura todos os produtos pelo relacionamento hasMany do modelo de categoria
        if (count($produtos) > 0){
          echo "<ul>";
          foreach ($produtos as $p) {
            echo "<li>".$p->nome."</li>";
          }
          echo "</ul>";
        }
      }
    }
});

Route::get('/cat_prod/json', function () {
  $cats = Categoria::with('produtos')->get();
  return $cats->toJson();
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (count($prods) === 0) {
      echo "<h4>Voce não possui nenhum produto cadastrado</h4>";
    } else {
      echo '<table border="1px">
              <thead>
                <tr>
                  <td>ID</td>
                  <td>Nome</td>
                  <td>Preço R$</td>
                  <td>Qtd.</td>
                  <td>Categoria</td>
                </tr>
              </thead>';
      echo "<tbody>";
      foreach ($prods as $p) {
        echo "<tr>";
          echo "<td>".$p->id."</td>";
          echo "<td>".$p->nome."</td>";
          echo "<td>".$p->preco."</td>";
          echo "<td>".$p->qtd."</td>";
          echo "<td>".$p->categoria->nome."</td>";
        echo "<tr>";
      }
      echo "</tbody>";
    }
});

Route::get('/add/produto', function () {
  $cat = Categoria::find(1);

  $p = new Produto();
  $p->nome = "Meu novo produto";
  $p->preco = 1.00;
  $p->qtd = 1;

  // uma forma de fazer o relacionamento
  //$p->categoria_id = $cat->id;

  // outra  forma mais elegante de fazer o relacionamento
  $p->categoria()->associate($cat);

  $p->save();
  return $p->toJson();
});


Route::get('/dissociate/produto', function () {
  $p = Produto::find(9);
  if (isset($p)){
    $p->categoria()->dissociate();
    $p->save();
    return $p->toJson();
  }

  return 'error -> produto nao encontrado! :(';
});
