<?php

require_once('../../conexao.php');
@session_start();

$id_jejum = addslashes($_POST['id_jejum-col']);

$query = $pdo->query("SELECT * FROM jejuns WHERE id_jejum = '$id_jejum'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $cola = $res[0]['colaboracao'];
    $cola -= 1;

    $res_colab = $pdo->prepare("DELETE FROM colaborando_jejum WHERE id_colaborando = :id_colaborando AND id_colaborando_jejum = :id_colaborando_jejum");
    $res_colab->bindValue(':id_colaborando', $_SESSION['id']);
    $res_colab->bindValue(':id_colaborando_jejum', $id_jejum);
    $res_colab->execute();

    $pdo->query("UPDATE jejuns SET colaboracao = '$cola' WHERE id_jejum = '$id_jejum'");

    echo $cola;
} else {
    echo "erro!";
}

?>