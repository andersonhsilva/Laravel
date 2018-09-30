<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return "Lista de todos os clientes - Raiz";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return "formulário para cadastrar novo cliente!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      $nome = $request->input('nome');
      $idade = $request->input('idade');
      // mudeo o codigo do erro no retorno com o metodo response
      return response("Armazena -> $nome - $idade", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
      $v = ["Mario", "Edson", "Roberto", "Jean"];
      if ($id >= 0 && $id < count($v)){
        return $v[$id];
      } else {
        return "Não encontrado!";
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return "formulário para editar cliente com o ID: $id";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // pra chegar neste metodo o formulário html tem que ter um campo oculto de nome _method e valor PUT para poder funcionar
    public function update(Request $request, $id) {
      $nome = $request->input('nome');
      $idade = $request->input('idade');
      // mudeo o codigo do erro no retorno com o metodo response
      return response("Editar cliente com ID: $id -> $nome - $idade", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return response("Apagado cliente com o ID: $id", 200);
    }

    // função adicional criada no controlador sem o parametro resource do comando controller
    public function requisitar(Request $request){
      echo "Nome: ".$request->input('nome');
    }
}
