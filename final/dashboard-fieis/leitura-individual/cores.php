<?php

require_once('../../conexao.php');
session_start();

$hexa = addslashes($_POST['chooise']);

$query = $pdo->prepare("INSERT INTO leitura_cores_favoritas SET hexa = :hexa, id_userIndLei = :id");
$query->bindValue(':hexa', $hexa);
$query->bindValue(':id', $_SESSION['id']);
$query->execute();

echo "Cor salva";

?>
