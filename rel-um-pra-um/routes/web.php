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
      echo "(Cliente: ".$end->cliente->nome.") Rua: $end->rua Numero: $end->numero Bairro: $end->bairro Cidade: $end->cidade UF: $end->uf CEP: $end->cep <br>";
    }
});

Route::get('/inserir', function(){

  // cliente
  $cli = new Cliente();
  $cli->nome = "anderson Henrique";
  $cli->telefone = "37219999";
  $cli->save();

  // endereco
  $end = new Endereco();
  $end->rua = "av estrada";
  $end->numero = "486 a";
  $end->bairro = "boa vista";
  $end->cidade = "recife";
  $end->uf = "pe";
  $end->cep = "55000000";
//  $end->cliente_id = $cli->id; // uma forma de salvar os relacionamento
  $cli->endereco()->save($end); // outra forma mais elegante de salvar os relacionamento, assim nao precisa saver quais as chaves

});

Route::get('/clientes/json', function () {
    // apesar do all a exibição é lazy loading -> carregamento resumido
    // $clientes = Cliente::all();
    // return $clientes->toJson();

    // agora com o with a exibição é Eager loading -> carregamento com mais objetos relacionados
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('/enderecos/json', function () {
    // $enderecos = Endereco::all();
    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();
});
