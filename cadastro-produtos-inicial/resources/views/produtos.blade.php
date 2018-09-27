@extends('layout.app', ["current" => "categorias"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Produtos</h5>

        <table class="table table-ordered table-hover" id="tabProdutos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Qtd</th>
                    <th>Preço</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" onclick="novoProduto();" role="button">Novo Produto</button>
    </div>
</div>

<!-- FORMULARIO MODAL -->
<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="formProduto">
        <div class="modal-header">
          <h5 class="modal-title">Novo Produto</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" class="form-control">
          <div class="form-group">
            <label for="nomeProduto" class="control-label">Nome</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
            </div>
          </div>
          <div class="form-group">
            <label for="precoProduto" class="control-label">Preço</label>
            <div class="input-group">
              <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">
            </div>
          </div>
          <div class="form-group">
            <label for="qtdProduto" class="control-label">Qtd</label>
            <div class="input-group">
              <input type="number" class="form-control" id="qtdProduto" placeholder="Qtd do Produto">
            </div>
          </div>
          <div class="form-group">
            <label for="nomeProduto" class="control-label">Nome</label>
            <div class="input-group">
              <select class="form-control" id="categoriaProduto">
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="cancel" class="btn btn-secondary" data-dissmiss="modal">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection

@section('javascript')
<script type="text/javascript">

function novoProduto(){
  $('#dlgProdutos form input').val('');
  $('#dlgProdutos').modal('show');
}

function dados_linha_tabela(p){

  var dados_tr_tab = "" +
  "<tr>" +
  "<td>" + p.id + "</td>" +
  "<td>" + p.nome + "</td>" +
  "<td>" + p.estoque + "</td>" +
  "<td>" + p.preco + "</td>" +
  "<td>" + p.categoria_id + "</td>" +
  "<td>" +
    '<button type="submit" class="btn btn-primary btn-sm">Editar</button>' +
    '<button type="submit" class="btn btn-danger btn-sm">Apagar</button>' +
  "</td>" +
  "</tr>";

  return dados_tr_tab;

}

function carregarProdutos(){
  $.getJSON('/api/produtos', function(data){

    //console.log(data);

    for (var i = 0; i < data.length; i++) {
      tag_tr = dados_linha_tabela(data[i]);
      $('#tabProdutos tbody').append(tag_tr);
    }
  })
}

function carregarCategorias(){
  $.getJSON('/api/categorias', function(data){

    //console.log(data);

    opcao = '<option value = "NULL">Escolha</option>'
    $('#categoriaProduto').append(opcao);

    for (var i = 0; i < data.length; i++) {
      opcao = '<option value = "' + data[i].id + '">' + data[i].nome + '</option>';
      $('#categoriaProduto').append(opcao);
    }
  })
}

// carrega as funções inicias
$(function(){
  carregarProdutos();
  carregarCategorias();
})

</script>
@endsection
