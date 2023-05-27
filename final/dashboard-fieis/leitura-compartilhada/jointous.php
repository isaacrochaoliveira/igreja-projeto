<?php

require_once("../../conexao.php");
session_start();

$today = Date("Y-d-m");
$time = Date("G:m:i");

$LeiCom = addslashes($_POST['LeiCom']);

$query = $pdo->query("SELECT * FROM leitura_compartilhada WHERE id_leiCom = '$LeiCom'");
$res = $query->fetchAll(PDO:FETCH_ASSOC);
$part_indLei = $res[0]['part_indLei'] + 1;

$res = $pdo->prepare("INSERT INTO JoinToUsLeiCom SET usuario_JTU = ':usuario_JTU', leiCom_JTU = ':leiCom_JTU, data_JTU = '$today', hora_JTU = '$time'" );
$res->bindValue(":usuario_JTU", $_SESSION['id']);
$res->bindValue(":leiCom_JTU", $LeiCom);
$res->execute();
	
	
$query = $pdo->prepare("UPDATE leitura_compartilhada SET part_indLei = :part_indLei WHERE id_leiCom = :id_leiCom");
$query->bindValue(':part_indLei', $part_indLei);
$query->bindValue(':id_leiCom', $LeiCom);
$query->execute();

echo "JOIN";

?>