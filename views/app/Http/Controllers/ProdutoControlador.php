<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller {
    public function listar(){
      $produtos = [
        "notebook del i7",
        "mouse",
        "teclado",
        "monitor AOC usb",
        "impressora epson",
        "disco SSD de 240Gb"
      ];
      // parra para a view produtos um array associativo de produto com a função php
      return view('produtos', compact('produtos'));
    }

    public function sessaoProduto($palavra){
      return View('sessao_produtos', compact('palavra'));
    }

    public function mostrar_opcoes(){
      return View('mostrar_opcoes');
    }

    public function opcoes($opcao){
      return View('opcoes', compact('opcao'));
    }

    public function loopFor($n){
      return View('loop_for', compact('n'));
    }

    public function loopForeach(){
      $produtos = [
        ["id" => 1, "nome" => "caneca"],
        ["id" => 2, "nome" => "armamento"],
        ["id" => 3, "nome" => "munições"],
        ["id" => 4, "nome" => "coldre"],
        ["id" => 5, "nome" => "alvo"],
        ["id" => 6, "nome" => "faca na caveira"]
      ];
      return View('loop_foreach', compact('produtos'));
    }


}
