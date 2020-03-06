<?php

// CONEXAO
require 'conexao.php';

$html = '';			

if(isset($_POST["result"]) && !empty($_POST["result"])){
  
  $result = $_POST["result"];
  
  $query = "SELECT * FROM crud_ajax WHERE nome LIKE '%".$result."%' OR idade LIKE '%".$result."%'";
  
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':nome', $result);
  $stmt->bindParam(':idade', $result);
  $stmt->execute();
 
  if($stmt->rowCount() > 0){
    while($row = $stmt->fetch()) {
      $html .= '
      '.$row['nome'].'
      '.$row['idade'].'
      ';
    }
    print $html;
  } else {
    print "Not Found";
  }
}
?>