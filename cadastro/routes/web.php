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
    return view('index');
});

// rotas dos produtos
Route::get('/produtos', 'ControladorProduto@index');

// rotas das categorias
Route::get('/categorias', 'ControladorCategoria@index');
Route::post('/categorias', 'ControladorCategoria@store');
Route::get('/categorias/novo', 'ControladorCategoria@create')->name('categorias_novo');
