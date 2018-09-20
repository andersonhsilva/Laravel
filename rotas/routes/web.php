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

Route::get('/hello', function () {
    return view('hello');
});

// a regra a baixo é a mesma regra anterior so que de forma abreviada
// Route::view('/hello', 'hello');

Route::view('/viewnome', 'hellonome',
  ['nome'=>'Anderson', 'sobrenome'=>'Henrique']
);

// passando parametros na rota para view
Route::get('/hellonome/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return view('hellonome', ['nome' => $nome, 'sobrenome' => $sobrenome]);
});


Route::get('/ola', function () {
    return "<h1>Laravel - sejá bem vindo!</h1>";
});

// rota com parametros get
Route::get('/nome/{nome}/{parametro2ordem}', function($nome, $sobreNome) {
  return "olá, ".$nome." ".$sobreNome;
});

// rota sem distrinção de tipo de dado no parametro
Route::get('/repetir/{nome}/{n}', function($nome, $n) {
    for ($i=0; $i < $n; $i++) {
      echo $nome.'<br>';
    }
});

// rota seu nome com regra
Route::get('/nomeregra/{nome}/{n}', function($nome, $n) {
  for ($i=0; $i < $n; $i++) {
    echo $nome.'<br>';
  }
})->where('n','[0-9]+')->where('nome','[A-za-z]+');

// rota seu nome opicional
Route::get('/nomeregra/{nome?}', function($nome=null) {
  if (isset($nome)){
    echo $nome.'<br>';
  } else {
    echo "voce não passou nenhum nome!";
  }
})->where('nome','[A-za-z]+');

// por organização do codigo organiza a rota -> /app/...
Route::prefix('app')->group(function(){
  Route::get('/', function(){
    return "Pagina principal do APP";
  });
  Route::get('profile', function(){
    return "Pagina Profile";
  });
  Route::get('about', function(){
    return "Meu about";
  });
});

// redireciona uma rota para outra
Route::redirect('/aqui','/ola', 301);

// outras rotas além do GET a baixo
Route::get('/rest/hello', function() {
  return "olá hello";
});

Route::post('/rest/hello', function() {
  return "olá hello (POST)";
});

Route::delete('/rest/hello', function() {
  return "olá hello (DELETE)";
});

Route::put('/rest/hello', function() {
  return "olá hello (PUT)";
});

Route::patch('/rest/hello', function() {
  return "olá hello (PATCH)";
});

Route::options('/rest/hello', function() {
  return "olá hello (OPTIONS)";
});

// rota para imprimir um post na tela
Route::post('/rest/imprimir', function(Request $req) {
  $nome = $req->input('nome');
  $fone = $req->input('fone');
  return "olá hello: $nome com o fone: $fone";
});

// com o match podemos utilizar dois ou varios tipos de requisição http na mesma rota
Route::match(['get','post'], '/rest/hello2', function(){
  return "hello worlds 2";
});

// com o any podemos receber todas as requisições http em apenas uma unica rota
Route::any('/rest/hello3', function(){
  return "hello worlds 3";
});

// uma rota nomeada em que pode ser vista pelo comando
Route::get('/produtos_mudou_rota', function() {
  echo "<h1>Produtos</h1>";
  echo "<ol>";
  echo "<li>Notebook</li>";
  echo "<li>Impressora</li>";
  echo "<li>Computador</li>";
  echo "</ol>";
})->name('meus_produtos');

// criei uma rota onde chamo outra rota pelo nome, desta forma podemos mudar as rotas de local desde que permaneça os nomes
Route::get('/link_produtos', function(){
  $url = route('meus_produtos');
  echo "<a href='$url'>Meus Produtos</a>";
});

Route::get('/redireciona_para_produto', function(){
  return redirect()->route('meus_produtos');
});
