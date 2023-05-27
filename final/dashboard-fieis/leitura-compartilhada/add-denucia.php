<?php

require_once('../../conexao.php');

$id_LeiCom = addslashes($_POST['id_indLeiCom']);
$reclamacao = addslashes($_POST['reportarabuso']);

if ($reclamacao == "") {
	echo "Escreva sua Reclamação";
	exit();
}

$query = $pdo->prepare("SELECT * FROM ");

?>