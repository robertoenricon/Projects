<?php 

require_once '../conexao/conexao.php';

if($_POST){

  $nome = $_POST['nome'];
  $idade = $_POST['idade'];
  $id = $_POST['id'];
  $json = array();

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
    foreach($stmt as $key => $row) { 
      if($id == $row['id']){
        $json = array(
          'id' => $row['id'],
          'nome' => $row['nome'],
          'idade' => $row['idade'],
        );
      }
    }
    print_r(json_encode($json));
  } 
}

?>