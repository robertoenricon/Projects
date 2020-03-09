<?php 

require_once 'conexao.php';

$sql = "SELECT * FROM crud_ajax";
$stmt = $pdo->prepare($sql);
$stmt->execute();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>CRUD - Ajax</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  </head>
  <body>
      
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Cadastrar Usuário:</h2>
          <form method="POST" id="btnCadastrar">
            <div>Nome: <input class="form-control form-control-sm" type="text" name="nome"></div>
            <div>Idade: <input class="form-control form-control-sm" type="number" name="idade"></div>
            </br>
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </form>
        </div>
      </div>
      <hr>
      <h2>Pesquisando Usuarios:</h2> 
      <input class="form-control" type="text" id="search" placeholder="Nome">
      <br>
      <select class="form-control" id="search_idade">
        <option>Idade</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="25">25</option>
      </select>
      <hr>
      <h4>Resultado:</h4>
      <p id="user"></p>
      <hr>
      <h2>Listando Usuarios:</h2>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Idade</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          
          <tbody id="listar"></tbody>
          <div id="modalAjax"></div>

        </table>
      </div>
    </div>

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- SWEET ALERT -->   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
    $(document).ready(function(){

      function listar(paramList){
        if(paramList != ''){
          $('#listar').html('');
          $('#modalAjax').html('');
          var json = paramList;
          $.each(json, function(i, index) {
            // $('#listar').append(
            //   '<tr id="'+ index.id+'">'+
            //   '<td id="returnAjaxNome-'+ index.id+'">'+index.nome+'</td>'+
            //   '<td id="returnAjaxIdade-'+ index.id+'">'+index.idade+'</td>'+
            //   '<td><button type="button" class="btn btn-outline-primary btn-sm update-'+index.id+'" data-toggle="modal" data-target="#idModal-'+index.id+'">Alterar</button>&nbsp&nbsp'+
            //   '<button type="button" class="btn btn-outline-danger btn-sm delete-'+index.id+'" id="'+index.id+'">Deletar</button></td>'+
            //   '</tr>'
            // );
            // $('#modalAjax').append(
            //   '<form method="POST" class="formUpdate-'+index.id+'" id="'+index.id+'">'+
            //   '<div class="modal fade" id="idModal-'+index.id+'">'+
            //     '<div class="modal-dialog">'+
            //       '<div class="modal-content">'+
            //         '<div class="modal-header">'+
            //           '<h5 class="modal-title">Alterar Cadastro de Usuário:</h5>'+
            //           '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
            //             '<span aria-hidden="true">&times;</span>'+
            //           '</button>'+
            //         '</div>'+
            //         '<div class="modal-body">'+
            //           '<input type="text" name="id" value="'+index.id+'">'+
            //           '<div>Nome: <input class="form-control form-control-sm" type="text" name="nome" value="'+index.nome+'"></div>'+
            //           '<div>Idade: <input class="form-control form-control-sm" type="number" name="idade" value="'+index.idade+'"></div>'+
            //         '</div>'+
            //         '<div class="modal-footer">'+
            //           '<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Fechar</button>'+
            //           '<button type="submit" class="btn btn-outline-success btn-sm salvar">Salvar</button>'+
            //         '</div>'+
            //       '</div>'+
            //     '</div>'+
            //   '</div>'+
            // '</form>'
            // );
          });
        }
      }

      function deletar(paramDelet){
        var idDeleted = paramDelet;
        swal({
          title : "Confirmar Alteração",
          html : 'Deseja EXCLUIR o usuário?',
          type : 'warning',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Confirmar',
          cancelButtonColor: '#d33',
          showCancelButton: true,
          allowOutsideClick: false,
        }).then(function (result) {
          if(result.value === true) {
            $.ajax({
              type: 'POST',
              url: 'deletar.php',
              data: {'id' : idDeleted},
              beforeSend: function() {
                $('.delete-'+idDeleted).html('Aguarde...');
              },
              success: function(success) {
                json = JSON.parse(success);
                listar(json);
              },
            });                  
          }
        });
      }

      function alterar(paramUpdat){
        var idUpdate = paramUpdat;
        swal({
          title : "Confirmar Alteração",
          html : 'Deseja alterar o usúario?',
          type : 'warning',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Confirmar',
          cancelButtonColor: '#d33',
          showCancelButton: true,
          allowOutsideClick: false,
        }).then(function (result) {
          if(result.value === true) {
            $.ajax({
              type: 'POST',
              url: 'alterar.php',
              data: $('.formUpdate-' + idUpdate).serialize(),
              beforeSend: function() {
                $('.update-'+idUpdate).html('Aguarde...');
              },
              success: function(success) {
                json = JSON.parse(success);
                $('#idModal-' + idUpdate).modal('toggle');
                $('#returnAjaxNome-'+ idUpdate).html(json.nome);
                $('#returnAjaxIdade-'+ idUpdate).html(json.idade);
                $('.update-'+idUpdate).html('Alterar');

              },
            });                  
          }
        });
      }

      //LISTAR > UPDATE > DELETE
      $.ajax({
        type: 'GET',
        url: 'listar.php',
        success: function(success) {
          json = JSON.parse(success);
          listar(json);
          $.each(json, function(i, index) {
            
            //UPDATE
            $('.update-'+index.id).click(function(){
              $('#modalAjax, .formUpdate-' + index.id).bind('submit', function(event) {
                event.preventDefault();
                var idUpdate = $('.formUpdate-' + index.id).attr('id');
                console.log('update: '+idUpdate);
                alterar(idUpdate);
                // listar(json);
              });
            });

            //DELETE
            $('.delete-'+index.id).click(function(){
              var idDeleted = $(this).attr('id');
              console.log('delete: '+idDeleted);
              deletar(idDeleted);
            });

          });

        },
      });
      
      $('#btnCadastrar').bind('submit', function(event) {
        event.preventDefault();

        var nome = $("input[name='nome']").val(); 
        var idade = $("input[name='idade']").val();

        $.ajax({
          type: 'POST',
          url: 'cadastrar.php',
          data: $('#btnCadastrar').serialize(),
          success: function(success) {
            $("#listar").html(success);
          }
        });
      });

    });

    </script>

  </body>
</html>