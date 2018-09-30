
<!-- extende a base html -->
@extends('layout.base')

<!-- modifica o titulo da base html -->
@section('titulo', 'Lista de Produtos!')

<!-- sobrescreve a section "corpo" do arquivo base.blade.php -->
@section('corpo')
  <!-- @parent <- esta tag mostra o conteudo da section "corpo" do arquivo base.blade.php -->
    <div class="container">
      <div class="row">
        <b>Lista de Produtos:</b>
      </div>
      <div class="col-12">
        @if (isset($produtos))
          @if (count($produtos) > 0)
            <h1>temos produtos</h1>
            @foreach($produtos as $produto)
              <p>Nome: {{$produto}}</p>
            @endforeach
          @endif
        @endif
        @empty($produtos)
          Não tem produtos!
        @endempty
      </div>
    </div>
@endsection
