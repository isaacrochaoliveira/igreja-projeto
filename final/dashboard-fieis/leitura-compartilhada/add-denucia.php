<?php

require_once('../../conexao.php');
session_start();
$id_LeiCom = addslashes($_POST['id_indLeiCom']);
$reclamacao = addslashes($_POST['reportarabuso']);

if ($reclamacao == "") {
	echo "Escreva sua Reclamação";
	exit();
}

$query = $pdo->prepare("INSERT INTO Reclamacoes_LeiCom SET usuario_id_ReLeiCom = :usuario_id_ReLeiCom, reclamacao_text = :reclamacao_text, leitcom_id_ReLeiCom = :leitcom_id_ReLeiCom");
$query->bindValue(':usuario_id_ReLeiCom', $_SESSION['id']);
$query->bindValue(':reclamacao_text', $reclamacao);
$query->bindValue(':leitcom_id_ReLeiCom', $id_LeiCom);
$query->execute();

echo "SUCCESS";

?>