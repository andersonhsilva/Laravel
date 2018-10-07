<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class UsuarioControlador extends Controller
{
  //public function __construct(){
  //  $this->middleware('primeiro');
  //}

  public function index() {
    Log::debug("estou no UsuarioControlador@index");
    return '<h3>Lista de usuarios</h3>'.
    '<ul>'.
    '<li>Joao</li>'.
    '<li>Maria</li>'.
    '<li>José</li>'.
    '<li>Marcos</li>'.
    '</ul>';
  }
}
