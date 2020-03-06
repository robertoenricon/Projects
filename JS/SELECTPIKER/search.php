<?php 

require_once 'conexao.php';

$id = '';
$name = '';

$sql = "SELECT * FROM crud_ajax";
$query = $pdo->query($sql);
// $result = $query->fetchAll();

foreach ($query as $key => $value) {

    print $id = $value['id'];
    print $name = $value['nome']; 

}


?>