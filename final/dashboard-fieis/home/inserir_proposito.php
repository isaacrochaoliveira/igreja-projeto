<?php

require_once('../../conexao.php');

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM oracao WHERE id_pray = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$mais_um = $res[0]['orando'];
	$mais_um += 1;
	$pdo->query("UPDATE oracao SET orando = '$mais_um' WHERE id_pray = '$id'");

	echo "Oração Curtida com Sucesso!";
}


?>