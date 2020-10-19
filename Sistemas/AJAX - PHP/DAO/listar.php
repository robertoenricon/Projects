<?php 

require_once '../conexao/conexao.php';

$json   = array();
$result = array();
$pag_url    = $_POST['pag_url'];
$pag        = $_POST['pag'];

if(empty($pag_url)){
    $limit = "LIMIT $pag";
}else{
    if($pag_url == 1){
        $limit = "LIMIT $pag";
    }else{
        $limit = "LIMIT $pag".",10";
    }
}

$sql  = "SELECT COUNT(*) FROM crud_ajax";
$stmt = $pdo->prepare($sql);

if($stmt->execute()){
    foreach($stmt as $key => $row) {
        $total = $row[0];
    }
}

$sql = "SELECT * FROM crud_ajax $limit";
$stmt = $pdo->prepare($sql);

if($stmt->execute()){
    foreach($stmt as $key => $row) {
        $result[$key] = array(
            'id' => $row['id'],
            'nome' => $row['nome'],
            'idade' => $row['idade'],
        );
    }
}

$json[] = array(
    'registros' => $result,
    'pag' => $total,
);

echo json_encode($json);

?>