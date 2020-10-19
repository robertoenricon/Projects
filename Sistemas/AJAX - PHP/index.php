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
      <h2>Cadastrar Usuário:</h2>
      <form method="POST" id="form-cadastrar">
        <div class="row">
          <div class="col">
            Nome: <input class="form-control form-control-sm" type="text" name="nome" id="nome">
          </div>
          <div class="col">
            Idade: <input class="form-control form-control-sm" type="number" name="idade" id="idade">
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
      </form>
      <hr>
      <h2>Pesquisando Usuarios:</h2> 
      <div class="row">
        <div class="col">
          <input class="form-control" type="text" id="search" placeholder="Nome">
        </div>
        <div class="col">
          <select class="form-control" id="search_idade">
            <option>Idade</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="25">25</option>
          </select>
        </div>
      </div>
      <h4>Resultado:</h4>
      <p id="user"></p>
      <hr>
      <div class="row">
        <div class="col">
          <h2>Listando Usuarios:</h2>
        </div> 
        <div class="col">
          <h5 id="count" style="float:right">Total: <span></span></h5>
        </div> 
      </div> 
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Idade</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          
          <!-- RESULTADOS -->
          <tbody id="listar"></tbody>
          <!-- MODAL -->
          <div id="modalAjax"></div>
          <!-- PAGINAÇÃO -->
          <nav aria-label="Page navigation example"> 
            <input type="hidden" id="pag" value="<?php echo isset($_GET['pag']) ? $_GET['pag'] : ''; ?>">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" id="previous">Previous</a></li>
              <ul class="pagination" id="pagination"></ul>
              <li class="page-item"><a class="page-link" id="next">Next</a></li>
            </ul>
          </nav>

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
            $('#listar').append(
              '<tr id="id-'+index.id+'">'+
              '<td>'+index.id+'</td>'+
              '<td id="returnAjaxNome-'+ index.id+'">'+index.nome+'</td>'+
              '<td id="returnAjaxIdade-'+ index.id+'">'+index.idade+'</td>'+
              '<td><button type="button" class="btn btn-outline-primary btn-sm update-'+index.id+'" id="'+index.id+'" data-toggle="modal" data-target="#idModal-'+index.id+'">Alterar</button>&nbsp&nbsp'+
              '<button type="button" class="btn btn-outline-danger btn-sm delete-'+index.id+'" id="'+index.id+'">Deletar</button></td>'+
              '</tr>'
            );
            $('#modalAjax').append(
              '<form method="POST" class="formUpdate-'+index.id+'" id="'+index.id+'">'+
                '<div class="modal" id="idModal-'+index.id+'">'+
                  '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                      '<div class="modal-header">'+
                        '<h5 class="modal-title">Alterar Cadastro de Usuário:</h5>'+
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                          '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                      '</div>'+
                      '<div class="modal-body">'+
                        '<input type="hidden" name="id" value="'+index.id+'">'+
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
            $('#count').find('span').html(json.length);

            //UPDATE
            $('.update-'+index.id).click(function(){
              var idUpdate = $(this).attr('id');
              $('#modalAjax, .formUpdate-' + index.id).bind('submit', function(event) {
                event.preventDefault();
                console.log('update: '+idUpdate);
                alterar(idUpdate);
              });
            });

            //DELETE
            $('.delete-'+index.id).click(function(){
              var idDeleted = $(this).attr('id');
              console.log('delete: '+idDeleted);
              deletar(idDeleted);
            });

          });
        }
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
          cancelButtonText: 'Cancelar',
          showCancelButton: true,
          allowOutsideClick: false,
        }).then(function (result) {
          if(result.value === true) {
            $.ajax({
              type: 'POST',
              url: 'DAO/alterar.php',
              data: $('.formUpdate-' + idUpdate).serialize(),
              beforeSend: function() {
                $('.update-'+idUpdate).html('Aguarde...');
              },
              success: function(success) {
                json = JSON.parse(success);
                // $('#idModal-' + idUpdate).modal('toggle');
                $('.modal').modal('hide');
                $('#returnAjaxNome-'+ idUpdate).html(json.nome);
                $('#returnAjaxIdade-'+ idUpdate).html(json.idade);
                $('.update-'+idUpdate).html('Alterar');
              },
            });                  
          }
        });
      }

      function deletar(paramDelet){
        var idDeleted = paramDelet;

        id_tr = $('#id-'+idDeleted).attr('id');
        id_tr = id_tr.split('-');
        id_tr = id_tr[1];

        swal({
          title : "Confirmar Alteração",
          html : 'Deseja EXCLUIR o usuário?',
          type : 'warning',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Confirmar',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          showCancelButton: true,
          allowOutsideClick: false,
        }).then(function (result) {
          if(result.value === true) {
            $.ajax({
              type: 'POST',
              url: 'DAO/deletar.php',
              data: {
                'id' : idDeleted
              },
              beforeSend: function() {
                $('.delete-'+idDeleted).html('Aguarde...');
              },
              success: function(success) {
                json = JSON.parse(success);
                $('#count').find('span').html(json.length);

                if(json == ''){
                  $('tr#id-'+id_tr).html('');
                }

                $.each(json, function(i, index) {
                  if(index.id != id_tr){
                    $('tr#id-'+id_tr).html('');
                  }
                });
                
              },
            });                  
          }
        });
      }

      //LISTAR > UPDATE > DELETE
      var pag = $('#pag').val();
      console.log(pag);
      $.ajax({
        type: 'POST',
        url: 'DAO/listar.php',
        data: {
          'pag'      : 10,
          'pag_url'  : pag
        },
        success: function(success) {
          json = JSON.parse(success);          
          json = json[0];

          console.log(json);

          listar(json.registros);
          $.each(json.registros, function(i, index) {
            
            //UPDATE
            $('.update-'+index.id).click(function(){
              var idUpdate = $(this).attr('id');
              $('#modalAjax, .formUpdate-' + index.id).bind('submit', function(event) {
                event.preventDefault();
                console.log('update: '+idUpdate);
                alterar(idUpdate);
              });
            });

            //DELETE
            $('.delete-'+index.id).click(function(){
              var idDeleted = $(this).attr('id');
              console.log('delete: '+idDeleted);
              deletar(idDeleted);
            });

          });

          for(i=1; i <= json.pag; i++){
            $('#pagination').append(
              '<li class="page-item"><a class="page-link" href="index.php?pag='+i+'">'+i+'</a></li>'
            );
          }

        },
      });
      
      $('#form-cadastrar').bind('submit', function(event) {
        event.preventDefault();
        $.ajax({
          type: 'POST',
          url: 'DAO/cadastrar.php',
          data: $('#form-cadastrar').serialize(),
          success: function(success) {
            json = JSON.parse(success);
            $("#nome").val(''); 
            $("#idade").val('');
            listar(json);
          }
        });
      });

    });

    </script>

  </body>
</html>