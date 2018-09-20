@extends('layout.base')

@section('titulo', 'Titulo Base com Blade!')

@section('barraLateral')
  @parent
  <p>Esta parte é do corpo</p>
@endsection

@section('conteudo')
  <p>Este conteudo é do corpo!</p>
@endsection
