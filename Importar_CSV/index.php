<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Erro conexão Mysql: ' . $e->getMessage();
}


if(isset($_FILES["import_csv"]["name"])){
  $name = $_FILES["import_csv"]["name"];
  //$ext = extensao do arquivo
  $ext = pathinfo($name, PATHINFO_EXTENSION);
  //diretorio para onde o arquivo sera movido
  $diretorio = "importado/";
  move_uploaded_file($diretorio, $name);

  if ($ext == 'csv') {
    //abre arquivo
    $arquivo = fopen($name, 'r');
    $qtd = 0;
    while ($linha_arquivo = fgets($arquivo)){
      $linha = explode(";", $linha_arquivo);

      print "<pre>";
      print_r($linha);
      print "</pre>";

      foreach ($linha as $key => $value) {
        if($qtd >= 0){
          print "<pre>";
          
          // print_r($linha[$key]);
          // $var = $linha[$key];
          var_dump($var);
          // print $var;
          // $var = $linha[0];
          // print $var;

          print "</pre>";
          if(($linha[$key] == "NomeProduto") && ($linha[$key] == "Preco Custo") && ($linha[$key] == "Nao") && ($linha[$key] == "Frete"))  {
            print "dfsdfsfsd";
          }
        }
        $qtd++;
      }

      die();
      if ($qtd >= 1){
        $produto = $linha[0];
        $valor = str_replace('R$', '', str_replace(',', '.', $linha[1]));
        $frete = $linha[2];
        $valor_total = $valor + $frete;

        $sql = "INSERT INTO importar_csv (produto, valor, frete, valor_total) VALUES (:produto, :valor, :frete, :valor_total)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':frete', $frete);
        $stmt->bindParam(':valor_total', $valor_total);
        $stmt->execute();
      }	
		  $qtd++;
		}
    fclose($arquivo);
    $success = "Inserido com sucesso";
  }else{
    $error = "Arquivo tem que ser do tipo .CVS";
	}
}else{
  $error = "Selecione um arquivo";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Importar CSV</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>Selecione seu arquivo CSV e clique para importar</h3><br>
				<form method="POST" action="#"  files="true" enctype="multipart/form-data">
					<div class="custom-file" style="width:30%">
						<input type="file" name="import_csv" class="custom-file-input" id="customFile" required>
						<label class="custom-file-label" for="customFile">Choose file...</label>
						<div class="invalid-feedback">Example invalid custom file feedback</div>
					</div><br><br>
					<button type="submit" class="btn btn-sm btn-outline-primary">Importar</button>
					<p></p>
					<?php if(isset($error)){ ?> 
					<div class="alert alert-danger" role="alert">
						<?php print $error; ?>
					</div>
					<?php }else if (isset($success)){ ?>
					<div class="alert alert-success" role="alert">
						<?php print $success; ?>
					</div>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>