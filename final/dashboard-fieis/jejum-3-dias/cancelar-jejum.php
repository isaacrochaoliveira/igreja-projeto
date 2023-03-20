<?php

require_once('../../conexao.php');
@session_start();

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT quantidade_pessoas FROM jejuns WHERE id_jejum = '$id_jejum'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {

    $res_p = $pdo->prepare("DELETE FROM participando_do_jejum WHERE id_participante = :id_participante AND id_jejum_part = :id_jejum_part");
    $res_p->bindValue(':id_participante', $_SESSION['id']);
    $res_p->bindValue(':id_jejum_part', $id_jejum);
    $res_p->execute();

    $i = intval($res[0]['quantidade_pessoas']) - 1;
    $pdo->query("UPDATE jejuns SET quantidade_pessoas = '$i' WHERE id_jejum = '$id_jejum'");

    echo "$i";
} else {
    echo "Não possível entrar no grupo!";
}


?>
