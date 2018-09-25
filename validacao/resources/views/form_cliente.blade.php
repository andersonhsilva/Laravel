@extends('layout.base', [ "current_link" => "cliente" ])

@section('body')
  <div class="conteiner col-md-8 offset-md-2">
    <div class="card border">
      <div class="card-header">
        <div class="card-title">
          Cadastro de Cliente
        </div>
      </div>
      <div class="card-body">
        <form action="/cliente/novo" method="POST">
          @csrf
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do CLiente" value="">
          </div>
          <div class="form-group">
            <label for="idade">Idade</label>
            <input type="text" id="idade" class="form-control" name="idade" placeholder="Idade do CLiente" value="">
          </div>
          <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço do CLiente" value="">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="E-mail do CLiente" value="">
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
          <button type="cancel" class="btn btn-secondary btn-sm">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
