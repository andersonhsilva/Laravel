@extends('layout.base')

@component('layout.navbar')
@endcomponent

@section('body')
  <div class="jumbotron bg-light border border-secundary">
    <div class="row">
      <div class="card-deck">

        <div class="card border border-primary">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <p class="card-text">
              cadastra o produto aqui...
            </p>
            <a href="/produtos" class="btn btn-primary">Cadastrar Produtos</a>
          </div>
        </div>

        <div class="card border border-primary">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="/categorias" class="btn btn-primary">Cadastrar Categorias</a>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
