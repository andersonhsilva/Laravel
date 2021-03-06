<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('lista_cliente', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validação do formulário via request
        $request->validate([
          // regras de validação para o campo
          'nome' => 'required|min:5|max:20|unique:clientes', // consulta o campo no banco para saber se os dados é único na tabela de clientes
          'idade' => 'required|integer',
          'endereco' => 'required|min:5',
          'email' => 'required|email',
        ], [
          // mensagens de retorno para o formulário
          'required' => 'O campo :attribute não pode ficar em branco.',
          'min' => 'O campo :attribute está com caracteres insuficientes.',
          'max' => 'O campo :attribute está com caracteres em excesso.',
          'email' => 'O campo :attribute nome está preenchido inválido.',
          'unique' => 'O campo :attribute não pode ser repedido no banco de dados.',
          'integer' => 'O campo :attribute deve ser um inteiro.',
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->idade = $request->input('idade');
        $cliente->endereco = $request->input('endereco');
        $cliente->email = $request->input('email');
        $cliente->save();
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
