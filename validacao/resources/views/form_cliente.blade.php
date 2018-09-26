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
            <input type="text" id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" placeholder="Nome do CLiente" value="">
            @if($errors->has('nome'))
              <div class="invalid-feedback">
                {{ $errors->first('nome') }}
              </div>
            @endif
          </div>
          <div class="form-group">
            <label for="idade">Idade</label>
            <input type="text" id="idade" class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" name="idade" placeholder="Idade do CLiente" value="">
            @if($errors->has('idade'))
              <div class="invalid-feedback">
                {{ $errors->first('idade') }}
              </div>
            @endif
          </div>
          <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" name="endereco" placeholder="Endereço do CLiente" value="">
            @if($errors->has('endereco'))
              <div class="invalid-feedback">
                {{ $errors->first('endereco') }}
              </div>
            @endif
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="E-mail do CLiente" value="">
            @if($errors->has('email'))
              <div class="invalid-feedback">
                {{ $errors->first('email') }}
              </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
          <button type="cancel" class="btn btn-secondary btn-sm">Cancelar</button>
        </form>
      </div>
      <!--
      @if ($errors->any())
        <div class="card-footer">
          <div class="alert alert-danger">
            <div class="alert-title"><p><b>Atenção!</b></p></div>
            @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        </div>
      @endif
    -->
    </div>
    <!--
    @if (isset($errors))
      {{var_dump($errors)}}
    @endif
  -->
  </div>
@endsection
