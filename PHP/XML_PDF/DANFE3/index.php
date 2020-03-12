<?php 
    

  if(isset($_POST['inputXML'])){

  $xml = simplexml_load_file($_POST['inputXML']);

  echo 'Título: ' . $xml->ide->cUF . '<br>';
  echo 'Data de Atualização: ' . $xml->data_atualizacao . '<br>';

  // foreach($xml->venda as $registro){
  //   echo 'Código da Venda: ' . $registro->cod_venda . '<br>';
  //   echo 'Cliente: ' . $registro->cliente . '<br>';
  //   echo 'Email: ' . $registro->email . '<br>';

  //   // foreach($registro->itens->item as $item){
  //   //   echo 'Código do Produto: ' . $item->cod_produto . '<br>';
  //   //   echo 'Quantidade: ' . $item->qtde . '<br>';
  //   //   echo 'Descrição do Produto: ' . $item->descricao . '<br>';
  //   // }

  //   echo '<hr>';
  // }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>VALIDA CNPJ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  </head>
  <body>
      
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Validar CNPJ</h2>
          <form method="POST">
            <input type="file" class="form-control-file" name="inputXML">
            <br>
            <button type="submit" class="btn btn-outline-danger">GERAR PDF</button>
            <br>
          </form>
        </div>
      </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </body>
</html>