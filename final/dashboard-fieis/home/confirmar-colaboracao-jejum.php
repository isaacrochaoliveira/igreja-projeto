<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum-col']);

$query = $pdo->query("SELECT * FROM jejuns WHERE id_jejum = '$id_jejum'");
$res = $quer->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $cola = $res[0]['colaboracao'];
    $cola += 1;
    $pdo->query("UPDATE jejuns SET coladoracao = '$cola' WHERE id_jejum = '$id_jejum'");

    echo $cola;
} else {
    echo "erro!";
}

?>