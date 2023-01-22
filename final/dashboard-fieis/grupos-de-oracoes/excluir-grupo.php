<?php

require_once('../../conexao.php');

$_cpf = $_POST['CPF'];
$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM usuarios WHERE cpf = '$_cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$pdo->query("DELETE FROM regras_do_grupo WHERE id_grupo = '$id'");
	$pdo->query("DELETE FROM grupos_de_oracao WHERE id_group = '$id'");
	echo "Excluído com Sucesso!";	
} else {
	echo "CPF Incorreto ou inexistente na nossa base de Dados!"
}
