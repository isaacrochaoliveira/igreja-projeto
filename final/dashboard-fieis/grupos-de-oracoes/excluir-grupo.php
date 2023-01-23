<?php

require_once('../../conexao.php');
@session_start();
$_cpf = $_POST['CPF'];
$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM grupos_de_oracao as g JOIN usuarios as u ON g.id_criador = '$_SESSION[id]'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($res);
if (count($res) > 0) {
	
} else {
	echo "CPF Incorreto ou inexistente na nossa base de Dados!";
}
