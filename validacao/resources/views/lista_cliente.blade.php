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
        <table class="table table-border table-hover" id="tabela_clientes">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Idade</th>
              <th>Endereco</th>
              <th>E-mail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($clientes as $cli)
            <tr>
              <th>{{ $cli->id }}</th>
              <th>{{ $cli->nome }}</th>
              <th>{{ $cli->idade }}</th>
              <th>{{ $cli->endereco }}</th>
              <th>{{ $cli->email }}</th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
