<?php 

require_once '../conexao/conexao.php';

if($_POST){

  $id = $_POST['id'];
  $json = array();

  $delete = "DELETE FROM crud_ajax WHERE id = :id";
  $stmt = $pdo->prepare($delete);
  $stmt->bindParam(':id', $id);
  $stmt->execute();

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

?>