<?php

//conexao
try {
	$pdo = new PDO('mysql:host=localhost;dbname=php', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
} catch (PDOException $e) {
	echo "ERRO BANCO DE DADOS: <br> " . $e->getMessage(); 
}