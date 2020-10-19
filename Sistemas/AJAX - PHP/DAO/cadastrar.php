<?php 

require_once '../conexao/conexao.php';

if ($_POST) {
  $nome = $_POST['nome'];
  $idade = $_POST['idade'];
  $html = '';

  $insert = "INSERT INTO crud_ajax (nome, idade) VALUES (:nome, :idade)";
  $stmt = $pdo->prepare($insert);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':idade', $idade);
  if($stmt->execute()){
    $sql = "SELECT * FROM crud_ajax";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    foreach($stmt as $key => $row) {
      $json[$key] = array(
        'id' => $row['id'],
        'nome' => $row['nome'],
        'idade' => $row['idade'],
      );
    }
    print_r(json_encode($json));
  }
}
