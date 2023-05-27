<?php

require_once("../../conexao.php");
session_start();

$LeiCom = addslashes($_POST['LeiCom']);

$query = $pdo->query("SELECT * FROM leitura_compartilhada WHERE id_leiCom = '$LeiCom'");
$res = $query->fetchAll(PDO:FETCH_ASSOC);
$part_indLei = $res[0]['part_indLei'] + 1;

$query = $pdo->prepare("UPDATE leitura_compartilhada SET part_indLei = :part_indLei WHERE id_leiCom = :id_leiCom");

?>