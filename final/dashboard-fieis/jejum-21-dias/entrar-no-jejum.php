<?php

require_once('../../conexao.php');
@session_start();

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT quantidade_pessoas FROM jejuns WHERE id_jejum = '$id_jejum'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {

    $res_p = $pdo->prepare("INSERT INTO participando_do_jejum SET id_participante = :id_participante, id_jejum_part = :id_jejum_part, data_participa = :data_participa, hora_participa = :hora_participa");
    $res_p->bindValue(':id_participante', $_SESSION['id']);
    $res_p->bindValue(':id_jejum_part', $id_jejum);
    $res_p->bindValue(':data_participa', date('Y-m-d'));
    $res_p->bindValue(':hora_participa', date('G:i:s'));
    $res_p->execute();

    $i = intval($res[0]['quantidade_pessoas']) + 1;
    $pdo->query("UPDATE jejuns SET quantidade_pessoas = '$i' WHERE id_jejum = '$id_jejum'");

    echo "$i";
} else {
    echo "Não possível entrar no grupo!";
}


?>
