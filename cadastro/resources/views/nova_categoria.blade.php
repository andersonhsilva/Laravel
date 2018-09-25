@extends('layout.base', [ "current_link" => "categorias" ])

@section('body')

  <div class="card border">
    <div class="card-body">
      <form class="" action="/categorias" method="post">
        @csrf
        <div class="form-group">
          <label for="nomeCategoria">Nome da Ctegoria</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Categoria">
        </div>
        <button type="submit" class="btn btn-primary btn-sm" name="button">Salvar</button>
        <a href="/categorias" class="btn btn-danger btn-sm">Cancelar</a>
      </form>
      @if(isset($success))
          @component('layout.alert', [ "tipo" => "success" ])
            <h5>{{$success}}</h5>
          @endcomponent
      @endif
    </div>
  </div>

@endsection
