<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
  </head>
  <body>
    @section('barraLateral')
    <p>Esta parte da seção é da base</p>
    @show
    <div class="">
      @yield('conteudo')
    </div>
  </body>
</html>
