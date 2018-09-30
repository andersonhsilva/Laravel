<h1>Lista de objetos do banco</h1>
@foreach ($categorias as $categoria)
  ID: {{$categoria->id}} - Nome: {{$categoria->nome}}</br>
  <hr>
@endforeach

<h1>Lista de nomes de um objeto do banco</h1>
@foreach ($nomes as $nome)
  Nome: {{$nome}}</br>
  <hr>
@endforeach

<h1>Único objeto retornado do banco</h1>
ID: {{$uma_categoria->id}} - Nome -> {{$uma_categoria->nome}}
