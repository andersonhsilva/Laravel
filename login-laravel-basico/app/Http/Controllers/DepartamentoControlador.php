<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{

  public function index(){
    // este codigo nao funcinou no construtor da class
    if (Auth::check()){
      $user = Auth::user();
      echo "<h4> O Usuário".$user->name.", está logado com o e-mail: ".$user->email." e ID: ".$user->id."<h4>";
    }

    echo "conteudo de departamento....";
  }
}
