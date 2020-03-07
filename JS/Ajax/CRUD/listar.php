<?php 

require_once 'conexao.php';

$json = array();

$sql = "SELECT * FROM crud_ajax";
$stmt = $pdo->prepare($sql);
if($stmt->execute()){
    foreach($stmt as $key => $row) { 
        $json[$key] = array(
            'id' => $row['id'],
            'nome' => $row['nome'],
            'idade' => $row['idade'],
        );
    }
    print_r(json_encode($json));
}


?>