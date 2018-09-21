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
}
