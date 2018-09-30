@extends('layout.base')

<!-- apaguei o conteudo da section "corpo" do arquivo base.blade.php -->
@section('corpo','')

<!-- gravo uma section no aruivo filho, onde sera exibida no aruivo pai -->
@section('minha_sessao_produtos')

  @if (isset($palavra))
    Palavra: {{$palavra}}
  @endif

@endsection
