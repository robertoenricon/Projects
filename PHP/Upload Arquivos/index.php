<?php



if(isset($_FILES["xml"]["name"]) && isset($_GET['portal'])){

  $ext = pathinfo($xml, PATHINFO_EXTENSION);
  
  if($ext == 'xml'){

    $xml = $_FILES['xml']['name'];
    move_uploaded_file($_FILES['xml']['tmp_name'], "../xml/".$xml);

  }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

  <form method="POST" id="pegarXML" files="true" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Converter XML em PDF</h4>
      </div>
      <div class="modal-body">
        <h3>Selecione o arquivo XML</h3>
        <br>
        <input type="file" name="xml" class="custom-file-input" required>
        <br>
        <button type="submit" class="btn btn-success">Converter</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$('#cliente_db').bind('submit', function(event) {
		  event.preventDefault();

		  $.each($(this).serializeArray(), function(i, field) { 
		    cliente_db[field.name] = field.value;
		  });

		  var form = $('#cliente_db')[0];
		  var data = new FormData(form);

		  console.log(cliente_db);

		  $.ajax({
		    type: "POST",
		    enctype: 'multipart/form-data',
		    url: 'db/insertdb.php',
		    data: data,
		    processData: false, 
		    contentType: false, 
		    cache: false, 
		    //timeout: 600000, 

		    success: function(success) {
		      console.log(success);
		      alert("Cadastro Completo");
		    },
		    error: function(error) {
		      console.log(error);
		    }
		  });
		});
    </script>
  </body>
</html>