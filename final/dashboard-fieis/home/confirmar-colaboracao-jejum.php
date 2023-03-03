<?php

require_once('../../conexao.php');
@session_start();

$id_jejum = addslashes($_POST['id_jejum-col']);

$query = $pdo->query("SELECT * FROM jejuns WHERE id_jejum = '$id_jejum'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $cola = $res[0]['colaboracao'];
    $cola += 1;

    $res_colab = $pdo->prepare("INSERT INTO colaborando_jejum SET id_colaborando = :id_colaborando, id_colaborando_jejum = :id_colaborando_jejum, data_colaboracao = :data_colaboracao, hora_colaboracao = :hora_colaboracao");
    $res_colab->bindValue(':id_colaborando', $_SESSION['id']);
    $res_colab->bindValue(':id_colaborando_jejum', $id_jejum);
    $res_colab->bindValue(':data_colaboracao', date('Y-m-d'));
    $res_colab->bindValue(':hora_colaboracao', date('G:i:s'));
    $res_colab->execute();

    $pdo->query("UPDATE jejuns SET colaboracao = '$cola' WHERE id_jejum = '$id_jejum'");

    echo $cola;
} else {
    echo "erro!";
}

?>