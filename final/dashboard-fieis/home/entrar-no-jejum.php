<?php

require_once('../../conexao.php');
@session_start();

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT quantidade_pessoas FROM jejum WHERE id_jejum = '$id_jejum'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $i = intval($res[0]['quantidade_pessoas']) + 1;
    $pdo->query("UPDATE jejuns SET quantidade_pessoas = '$i' WHERE id_jejum = '$id_jejum'");

    echo "$i";
}


?>
