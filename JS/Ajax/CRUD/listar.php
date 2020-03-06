<?php 

require_once 'conexao.php';

// $html = '';
$nome = '';
$idade = '';


$sql = "SELECT * FROM crud_ajax";
$stmt = $pdo->prepare($sql);
if($stmt->execute()){
    // while ($row = $stmt->fetch()) { 
    foreach($stmt as $key => $row) { 
        // $nome = $row['nome'];
        // $idade = $row['idade'];
        $nome[$key] = 
            array(
                'nome' => $row['nome'],
                'idade' => $row['idade'],
            );
    }
    print_r($nome);

    die();
    print_r(json_encode($nome));
}


?>