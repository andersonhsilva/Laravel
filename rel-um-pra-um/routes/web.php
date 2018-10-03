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

use App\Cliente;
use App\Endereco;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $cli) {
      // consulta simples do larvel
      echo "ID: ".$cli->id." Nome: ".$cli->nome." Telefone: ".$cli->telefone." <br>";

      echo "Idade: ".$cli->idade."<br>";

// subconsulta no banco de forma manual pelo laravel
//      $end = Endereco::where('cliente_id', $cli->id)->first();
//      echo "Rua: $end->rua Numero: $end->numero Bairro: $end->bairro Cidade: $end->cidade UF: $end->uf CEP: $end->cep <br>";

      echo "Rua: ".$cli->endereco->rua." Numero: ".$cli->endereco->numero." Bairro: ".$cli->endereco->bairro." Cidade: ".$cli->endereco->cidade." UF: ".$cli->endereco->uf." CEP: ".$cli->endereco->cep." <br>";
      echo "-----------------------------------------<br>";
    }
});

Route::get('/enderecos', function () {
    $endereco = Endereco::all();
    foreach ($endereco as $end) {
      echo "Rua: $end->rua Numero: $end->numero Bairro: $end->bairro Cidade: $end->cidade UF: $end->uf CEP: $end->cep <br>";
    }
});
