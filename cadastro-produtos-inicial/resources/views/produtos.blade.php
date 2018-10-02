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
      <form class="form-horizontal" action="/api/produtos" id="formProduto" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Novo Produto</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" class="form-control">
          <div class="form-group">
            <label for="nomeProduto" class="control-label">Nome</label>
            <div class="input-group">
              <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Nome do Produto">
            </div>
          </div>
          <div class="form-group">
            <label for="precoProduto" class="control-label">Preço</label>
            <div class="input-group">
              <input type="number" class="form-control" name="precoProduto" id="precoProduto" placeholder="Preço do Produto">
            </div>
          </div>
          <div class="form-group">
            <label for="qtdProduto" class="control-label">Qtd</label>
            <div class="input-group">
              <input type="number" class="form-control" name="qtdProduto" id="qtdProduto" placeholder="Qtd do Produto">
            </div>
          </div>
          <div class="form-group">
            <label for="nomeProduto" class="control-label">Nome</label>
            <div class="input-group">
              <select class="form-control" name="categoriaProduto" id="categoriaProduto">
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="post_enviar" class="btn btn-primary">Salvar</button>
            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
        <div id="sts_form" class="alert alert-warning" style="display:none; margin-left: 20px; margin-right: 20px;"></div>
      </form>

    </div>
  </div>
</div>


@endsection

<style media="screen">
.rodar_infinito {
		-webkit-animation: rotation 2s infinite linear;
}
@-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(359deg);
		}
}
</style>

@section('javascript')
<script type="text/javascript">

// nao precisa ficar gerando o token de segurança do laravel em cada formulario
$.ajaxSetup({
    // <input type="hidden" name="_token" value="xxxxxxxxxxxxxx">
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});

// chama o modal de formulário
function novoProduto(){
  $('#dlgProdutos form input').val('');
  $('#sts_form').hide();
  $('#dlgProdutos').modal('show');
}

function tupla_tabela(prod){
  var result = "" +
  "<tr>" +
  "<td>" + prod.id + "</td>" +
  "<td>" + prod.nome + "</td>" +
  "<td>" + prod.estoque + "</td>" +
  "<td>" + prod.preco + "</td>" +
  "<td>" + prod.categoria_id + "</td>" +
  "<td>" +
    '<button type="submit" class="btn btn-primary btn-sm" onclick="javascript:editar(' + prod.id + ')">Editar</button> ' +
    '<button type="submit" class="btn btn-danger btn-sm" onclick="javascript:remover(' + prod.id + ')">Apagar</button>' +
  "</td>" +
  "</tr>";
  return result;
}

// alteração de produtos
function editar(id){
  $.getJSON('/api/produtos/' + id, function(data){
    // popula o formulário para alteração
    $('#id').val(data.id);
    $('#nomeProduto').val(data.nome);
    $('#precoProduto').val(data.preco);
    $('#qtdProduto').val(data.estoque);
    $('#categoriaProduto').val(data.categoria_id);
    $('#dlgProdutos').modal('show');

    // seta o metodo do formulário para PUT e a rota de alteração com id
    $('form#formProduto').attr("action","/api/produtos/"+ id);
    $('form#formProduto').attr("method","PUT");

  })
}

function remover(id){
  $.ajax({
    type: "DELETE",
    url: "/api/produtos/" + id,
    context: this,
    success: function(){
      console.log('Apagou ok!');
      // remove a linha do registro na tabela
      trs_tabela = $('table#tabProdutos tbody tr');
      tr_elemento = trs_tabela.filter(function(i, elemento){
        return elemento.cells[0].textContent == id;
      });
      if (tr_elemento){
        tr_elemento.remove();
      }
    },
    error: function(error){
      console.log(error);
    }
  });
}

// listar produtos do banco na tabela
function carregarProdutos(){

  var tab_carregar = "#tabProdutos";

  $('table' + tab_carregar + ' tbody').html('<tr><td colspan="6" class="text-center"><i class="fas fa-spinner fa-2x rodar_infinito" style="margin-top: 100px; margin-bottom: 100px;"></i> <span style="font-size: 20px;">Carregando...</span></td></tr>');
  $.getJSON('/api/produtos', function(data){
    for (var i = 0; i < data.length; i++) {
      if (i == 0){ $('table' + tab_carregar + ' tbody').html(''); }; // apaga o load
      var produto = data[i];
      var tupla = tupla_tabela(produto);
      $('table' + tab_carregar + ' tbody').append(tupla);
    }
  })
}

// carrega o campo de categoria pelo banco de dados
function carregarCategorias(){
  $.getJSON('/api/categorias', function(data){

    var element = "#categoriaProduto";

    $(element).append('<option value = "NULL">Escolha</option>');
    for (var i = 0; i < data.length; i++) {
      $(element).append('<option value = "' + data[i].id + '">' + data[i].nome + '</option>');
    }
  })
}

// enviar formulario via POST sem refresh na pagina
$('button#post_enviar').click(function() {

  var element_form = "#formProduto";
  var element_result = "#sts_form";
  var element_submit = $(this);
  element_submit.attr('disabled', true);

  $.ajax({
    method: $(element_form).attr("method"),
    url: $(element_form).attr("action"),
    dataType: "json",
    beforeSend: function() {
      // show load before post
      $(element_result).attr('class', 'alert alert-warning');
      $(element_result).html('<i class="fas fa-spinner fa-1x rodar_infinito"></i> Enviando os dados, aguarde...').show();

    }, data: $(element_form).serialize()}).done(function(data) {

      // icon de success
      if (data.message_type == "success"){ $(element_result).html('<i class="fas fa-check-circle"></i> ').attr('class', 'alert alert-success') };
      // icon de danger
      if (data.message_type == "danger"){ $(element_result).html('<i class="fas fa-exclamation-circle"></i> ').attr('class', 'alert alert-danger') };

      // show text
      $(element_result).append(data.message_name).attr('class', data.class).show();
      element_submit.removeAttr('disabled');
      setTimeout(function() { $(element_result).fadeOut('slow'); }, 9000);

      // adiciona o produto que foi cadastrado na tabela e retornado no result via json
      if (data.result && $('#id').val() == ''){
        var tupla = tupla_tabela(data.result);
        $('table#tabProdutos tbody').append(tupla);
      }

      // atualiza a linha do registro na tabela
      if (data.result && $('#id').val() != ''){
        var prod = data.result;
        trs_tabela = $('table#tabProdutos tbody tr');
        tr_elemento = trs_tabela.filter(function(i, elemento){
          return elemento.cells[0].textContent == prod.id;
        });
        if (tr_elemento){
          tr_elemento[0].cells[0].textContent = prod.id;
          tr_elemento[0].cells[1].textContent = prod.nome;
          tr_elemento[0].cells[2].textContent = prod.preco;
          tr_elemento[0].cells[3].textContent = prod.estoque;
          tr_elemento[0].cells[4].textContent = prod.categoria_id;
        }
      }

    });
    return false;
});

// carrega as funções inicias da pagina
$(function(){
  carregarProdutos();
  carregarCategorias();
})

</script>
@endsection
