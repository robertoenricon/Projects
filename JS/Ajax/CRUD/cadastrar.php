<?php 

require_once 'conexao.php';

if ($_POST) {
    
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $html = '';

    $insert = "INSERT INTO crud_ajax (nome, idade) VALUES (:nome, :idade)";
    $stmt = $pdo->prepare($insert);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':idade', $idade);
    // $stmt->execute();
    if($stmt->execute()){
        $sql = "SELECT * FROM crud_ajax";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) { 
            $html .= '<tr>
            <th scope="row">'.$row['nome'].'</th>
            <td>'.$row['idade'].'</td>
            </tr>';
        }
        print $html;
    }
}
