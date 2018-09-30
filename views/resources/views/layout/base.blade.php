<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>

    <!-- grava uma section para o conteudo do corpo que podera ser sobrescrito por algum arquivo filho -->
    @section('corpo')
    <p>Bem vindo ao corpo no body!</p>
    @show

    <!-- verifica se existe uma section "minha_sessao_produtos" gerada por algum arquivo filho para ser exibida -->
    @hasSection('minha_sessao_produtos')
    <div class="card" style="width: 500px; margin: 10px;">
      <div class="card-body">
        <h5 class="card-title">Produto</h5>
        <!-- o yield() exibe uma sectino de algum arquivo filho -->
        <p class="card-text">@yield('minha_sessao_produtos')</p>
        <a href="#">Ver mais</a>
        <a href="#">Ajuda</a>
      </div>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  </body>
</html>
