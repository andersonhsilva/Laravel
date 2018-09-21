@extends('sessao_produtos')

<!-- apaguei o conteudo da section "corpo" do arquivo base.blade.php -->
@section('minha_sessao_produtos')

  <a href="/opcoes/1" class="btn btn-primary btn-sm" role="buttom" aria-disabled="true">Azul</a>
  <a href="/opcoes/2" class="btn btn-danger btn-sm" role="buttom" aria-disabled="true">Vermelho</a>
  <a href="/opcoes/3" class="btn btn-success btn-sm" role="buttom" aria-disabled="true">Verde</a>
  <a href="/opcoes/4" class="btn btn-warning btn-sm" role="buttom" aria-disabled="true">Amarelo</a>
  <a href="/opcoes/10" class="btn btn-light btn-sm" role="buttom" aria-disabled="true">Branco</a>

@endsection
