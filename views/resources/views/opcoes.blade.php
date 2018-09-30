@extends('sessao_produtos')

<!-- apaguei o conteudo da section "corpo" do arquivo base.blade.php -->
@section('minha_sessao_produtos')

  Voce escolheu a opção:
  @if (isset($opcao))
    @switch($opcao)
      @case(1)
        <span class="badge badge-primary">Azul</span>
        @break
      @case(2)
        <span class="badge badge-danger">Vermelho</span>
        @break
      @case(3)
        <span class="badge badge-success">Verde</span>
        @break
      @case(4)
        <span class="badge badge-warning">Amarelo</span>
        @break
      @default
        <span class="badge badge-dark">Outra Cor</span>
        @break
    @endswitch
  @endif

@endsection
