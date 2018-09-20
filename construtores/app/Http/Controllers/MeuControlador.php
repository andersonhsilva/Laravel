<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller {

  public function getNome(){
    return "Anderson Henrique da Silva";
  }

  public function getIdade(){
    return "32 Anos";
  }

  public function multiplicar($n1, $n2){
    return $n1 * $n2;
  }

  public function getNomeByID($id){
    $v = ["Mario", "Edson", "Roberto", "Jean"];
    if ($id >= 0 && $id < count($v)){
      return $v[$id];
    } else {
      return "Não encontrado!";
    }
  }

}
