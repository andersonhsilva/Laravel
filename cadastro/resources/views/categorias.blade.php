@extends('layout.base', [ "current_link" => "categorias" ])

@section('body')

<div class="card border">
  <div class="card-body">
    <h3>Lista de Categorias</h3>
    @if(count($cats) > 0)
    <table class="table table-ordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome da Categoria</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cats as $cat)
          <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->nome}}</td>
            <td>
              <a href="/categorias/update/{{$cat->id}}" class="btn btn-sm btn-secondary">Editar</a>
              <a href="/categorias/delete/{{$cat->id}}" class="btn btn-sm btn-danger">Apagar</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @else
        @component('layout.alert', [ "tipo" => "warning" ])
          <h5>Nenhuma categoria cadastrada até o momento!</h5>
        @endcomponent
    @endif
    <a href="/categorias/novo/" class="btn btn-sm btn-primary">Novo</a>
  </div>
</div>

@endsection
