<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Exception;
use Illuminate\Database\QueryException;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('produtos');
    }

    public function index()
    {
      $prods = Produto::all();
      return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $result = array();
      try {
        $prod = new Produto();
        $prod->nome = $request->input('nomeProduto');
        $prod->preco = $request->input('precoProduto');
        $prod->estoque = $request->input('qtdProduto');
        $prod->categoria_id = $request->input('categoriaProduto');
        $prod->save();
        $result = ["message_name" => "Cadastrado com sucesso!", "message_type" => "success", "result" => $prod];

      } catch (Exception $e){
        $result = ["message_name" => "Erro ao cadastrar no banco de dados!", "message_type" => "danger", "message_exception" => $e];

      } finally {
        return json_encode($result);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
