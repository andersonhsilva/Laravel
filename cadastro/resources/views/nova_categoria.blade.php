@extends('layout.base', [ "current_link" => "categorias" ])

@section('body')
<?php
  // fiz essa adaptação de codigo para utilizar o mesmo formulário php para alterar
  use App\Categoria; if (!isset($cat)) { $cat = new Categoria(); }
?>
  <div class="card border">
    <div class="card-body">
      <form class="" action="<?php if (!isset($cat->id)){ echo '/categorias'; } else { echo '/categorias/'.$cat->id; }; ?>" method="post">
        @csrf
        <div class="form-group">
          <label for="nomeCategoria">Nome da Ctegoria</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Categoria" value="{{$cat->nome}}">
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
