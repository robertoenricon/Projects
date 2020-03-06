<?php 

require_once 'conexao.php';

if($_POST){

  $nome = $_POST['nome'];
  $idade = $_POST['idade'];
  $id = $_POST['id'];
  $html = '';

  $update = "UPDATE crud_ajax SET nome = :nome, idade = :idade WHERE id = :id";
  $stmt = $pdo->prepare($update);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':idade', $idade);
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  if($stmt->execute()){
    $sql = "SELECT * FROM crud_ajax";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) { 
      // if($id == $row['id']){
        print json_encode(array(
          'nome' => $row['nome'],
          'idade' => $row['idade'],)
        );
      // }
    }
  } 
}

?>