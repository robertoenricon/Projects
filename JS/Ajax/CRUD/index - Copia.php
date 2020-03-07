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
          <?php //while ($row = $stmt->fetch()) { ?>
          <!-- <input type="hidden" id="update-<?php //print $row['id'];?>" value="<?php //print $row['id'];?>"> -->
          
          <!-- <tbody>
            <tr>
              <th scope="row" id="returnAjaxNome"><?php //print $row['nome']; ?></th>
              <td id="returnAjaxIdade"><?php //print $row['idade']; ?></td>
              <td><button type="button" class="btn btn-outline-primary btn-sm btn-update" data-toggle="modal" data-target="#idModal-<?php print $row['id'];?>" value="<?php print $row['id'];?>">Alterar</button></td>
            </tr>
          </tbody> -->

          <tbody id="listar"></tbody>
          <div id="modalAjax"></div>

            <!-- Modal alter -->
            <!-- <form method="POST" id="formUpdate-<?php //print $row['id'];?>">
              <div class="modal fade" id="idModal-<?php //+++print $row['id'];?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Alterar Cadastro de Usuário:</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="text" name="id" value="<?php //print $row['id']; ?>">
                      <div>Nome: <input class="form-control form-control-sm" type="text" name="nome" value="<?php //print $row['nome']; ?>"></div>
                      <div>Idade: <input class="form-control form-control-sm" type="number" name="idade" value="<?php //print $row['idade']; ?>"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-outline-success btn-sm salvar">Salvar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form> -->
          <?php //} ?>
          <!-- </tbody> -->
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

      function listar(parametro){
        if(parametro != ''){
          $('#listar').html('');
          json = JSON.parse(parametro);
          $.each(json, function(i, index) {
            $('#listar').append(
              '<tr id="'+ index.id+'">'+
              '<td id="returnAjaxNome-'+ index.id+'">'+index.nome+'</td>'+
              '<td id="returnAjaxIdade-'+ index.id+'">'+index.idade+'</td>'+
              '<td><button type="button" class="btn btn-outline-primary btn-sm update-'+index.id+'" data-toggle="modal" data-target="#idModal-'+index.id+'">Alterar</button>&nbsp&nbsp'+
              '<button type="button" class="btn btn-outline-danger btn-sm" id="delete-'+index.id+'">Deletar</button></td>'+
              '</tr>'
            );
            $('#modalAjax').append(
              '<form method="POST" id="formUpdate-'+index.id+'">'+
              '<div class="modal fade" id="idModal-'+index.id+'">'+
                '<div class="modal-dialog">'+
                  '<div class="modal-content">'+
                    '<div class="modal-header">'+
                      '<h5 class="modal-title">Alterar Cadastro de Usuário:</h5>'+
                      '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                      '</button>'+
                    '</div>'+
                    '<div class="modal-body">'+
                      '<input type="text" name="id" value="'+index.id+'">'+
                      '<div>Nome: <input class="form-control form-control-sm" type="text" name="nome" value="'+index.nome+'"></div>'+
                      '<div>Idade: <input class="form-control form-control-sm" type="number" name="idade" value="'+index.idade+'"></div>'+
                    '</div>'+
                    '<div class="modal-footer">'+
                      '<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Fechar</button>'+
                      '<button type="submit" class="btn btn-outline-success btn-sm salvar">Salvar</button>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</form>'
            );
          });
        }
      }

      //LISTAR > UPDATE > DELETE
      $.ajax({
        type: 'GET',
        url: 'listar.php',
        success: function(success) {
          json = JSON.parse(success);
          $.each(json, function(i, index) {
            $('#listar').append(
              '<tr id="'+ index.id+'">'+
              '<td id="returnAjaxNome-'+ index.id+'">'+index.nome+'</td>'+
              '<td id="returnAjaxIdade-'+ index.id+'">'+index.idade+'</td>'+
              '<td><button type="button" class="btn btn-outline-primary btn-sm update-'+index.id+'" data-toggle="modal" data-target="#idModal-'+index.id+'">Alterar</button>&nbsp&nbsp'+
              '<button type="button" class="btn btn-outline-danger btn-sm delete-'+index.id+'" id="'+index.id+'">Deletar</button></td>'+
              '</tr>'
            );
            $('#modalAjax').append(
              '<form method="POST" id="formUpdate-'+index.id+'">'+
              '<div class="modal fade" id="idModal-'+index.id+'">'+
                '<div class="modal-dialog">'+
                  '<div class="modal-content">'+
                    '<div class="modal-header">'+
                      '<h5 class="modal-title">Alterar Cadastro de Usuário:</h5>'+
                      '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                      '</button>'+
                    '</div>'+
                    '<div class="modal-body">'+
                      '<input type="text" name="id" value="'+index.id+'">'+
                      '<div>Nome: <input class="form-control form-control-sm" type="text" name="nome" value="'+index.nome+'"></div>'+
                      '<div>Idade: <input class="form-control form-control-sm" type="number" name="idade" value="'+index.idade+'"></div>'+
                    '</div>'+
                    '<div class="modal-footer">'+
                      '<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Fechar</button>'+
                      '<button type="submit" class="btn btn-outline-success btn-sm salvar">Salvar</button>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</form>'
            );

            //UPDATE
            $('.update-'+index.id).click(function(){
              $('#modalAjax, #formUpdate-' + index.id).bind('submit', function(event) {
                event.preventDefault();
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
                      data: $('#formUpdate-' + index.id).serialize(),
                      statusCode: {
                        //caira aqui se a requisição for passada errada
                        404: function () {
                          $('.update-'+index.id).html("Página não encontrada");
                        }
                      },
                      beforeSend: function() {
                        $('.update-'+index.id).html('Aguarde...');
                      },
                      success: function(success) {
                        json = JSON.parse(success);

                        $('#idModal-' + index.id).modal('toggle');
                        $('#returnAjaxNome-'+ index.id).html(json.nome);
                        $('#returnAjaxIdade-'+ index.id).html(json.idade);
                        $('.update-'+index.id).html('Alterar');

                      },
                    });                  
                  }
                });
              });
            });

            //DELETE
            $('.delete-'+index.id).click(function(){
              var idDeleted = $(this).attr('id');
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
                    // statusCode: {
                    //   //caira aqui se a requisição for passada errada
                    //   404: function () {
                    //     $('#delete-'+index.id).html("Página não encontrada");
                    //   }
                    // },
                    beforeSend: function() {
                      $('.delete-'+index.id).html('Aguarde...');
                    },
                    success: function(deleted) {
                      // json = JSON.parse(deleted);
                      listar(deleted);
                      // $.each(json, function(i, index) {
                        // $('#listar').append(
                        //   '<tr id="'+ index.id+'">'+
                        //   '<td id="returnAjaxNome-'+ index.id+'">'+index.nome+'</td>'+
                        //   '<td id="returnAjaxIdade-'+ index.id+'">'+index.idade+'</td>'+
                        //   '<td><button type="button" class="btn btn-outline-primary btn-sm update-'+index.id+'" data-toggle="modal" data-target="#idModal-'+index.id+'">Alterar</button>&nbsp&nbsp'+
                        //   '<button type="button" class="btn btn-outline-danger btn-sm delete-'+index.id+'" id="'+index.id+'">Deletar</button></td>'+
                        //   '</tr>'
                        // );
                      // });
                    },
                  });                  
                }
              });
            });



            // $('#delete-'+index.id).click(function(){
            
            
            // });



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

      // load_data();
      // $("#search_idade").change(function(){
      //   var idade = $(this).val();
      //   if(idade != ''){
      //     load_data(idade);
      //   }
      //   // else{
      //   //   load_data();
      //   // }
      // })
      // $('#search').keyup(function(){
      //   var search = $(this).val();
      //   if(search != ''){
      //     load_data(search);
      //   }
      //   // else{
      //   //   load_data();
      //   // }
      // });

      // function load_data(result){
      //   if(result != ''){
      //     $.ajax({
      //       method:"POST",
      //       url:"search.php",
      //       data:{result:result},
      //       success:function(data){
      //         $('#user').html(data);
      //       }
      //     });
      //   }
      // }

      //UPDATE
      // $('#listar').click(function(){
      //   console.log('1');
      //   $.ajax({
      //     type: 'GET',
      //     url: 'listar.php',
      //     success: function(success) {
      //       json = JSON.parse(success);
            
            
      //       var value = $('#litar > .delete').val();
      //       console.log(value);


      //       if(value == 'update'){
      //         $.each(json, function(i, index) {
      //           $('#modalAjax, #formUpdate-' + index.id).bind('submit', function(event) {
      //             event.preventDefault();
      //             swal({
      //               title : "Confirmar Alteração",
      //               html : 'Deseja alterar o usúario?',
      //               type : 'warning',
      //               confirmButtonColor: '#3085d6',
      //               confirmButtonText: 'Confirmar',
      //               cancelButtonColor: '#d33',
      //               showCancelButton: true,
      //               allowOutsideClick: false,
      //             }).then(function (result) {
      //               if(result.value === true) {
      //                 let timerInterval
      //                 Swal.fire({
      //                   title: 'Contato alterado com sucesso',
      //                   type : 'success',
      //                   timer: 2000,
      //                   timerProgressBar: true,
      //                   allowOutsideClick: false,
      //                   onBeforeOpen: () => {
      //                     Swal.showLoading()
      //                     timerInterval = setInterval(() => {
      //                       const content = Swal.getContent()
      //                       if (content) {
      //                         const b = content.querySelector('b')
      //                         if (b) {
      //                           b.textContent = Swal.getTimerLeft()
      //                         }
      //                       }
      //                     }, 100)
      //                   },
      //                   onClose: () => {
      //                     clearInterval(timerInterval)
      //                   }
      //                 }).then(function (result){
      //                   if (result.dismiss === Swal.DismissReason.timer) {
      //                     $.ajax({
      //                       type: 'POST',
      //                       url: 'alterar.php',
      //                       data: $('#formUpdate-' + index.id).serialize(),
      //                       success: function(success) {
      //                         json = JSON.parse(success);

      //                         $('#idModal-' + index.id).modal('toggle');
      //                         $('#returnAjaxNome-'+ index.id).html(json.nome);
      //                         $('#returnAjaxIdade-'+ index.id).html(json.idade);

      //                       },
      //                     });
      //                   }
      //                 })
      //               }
      //             });
      //           });
      //         });
      //       }else{
      //         console.log('dsa');
      //       }
            
      //     },
      //   });
      // });

    });

    </script>

  </body>
</html>