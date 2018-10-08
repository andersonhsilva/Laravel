<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{

  // ativa a proteção no controlador pelo middleware de autenticação padrão de logins do laravel
  public function __construct() {
    $this->middleware('auth');
  }

  public function index(){

    echo "lista de produtos.....";

  }
}
