<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT * FROM regras_jejum JOIN jejuns ON regras_jejum._id_regras_jejum = jejuns.id_jejum");
$regras = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($regras) > 0) {
    $jejum = $regras['jejum'];
    $_1 = $regras[0]['_1'];
    $_2 = $regras[0]['_2'];
    $_3 = $regras[0]['_3'];
    $_4 = $regras[0]['_4'];
    $_5 = $regras[0]['_5'];
    $_6 = $regras[0]['_6'];
    $_7 = $regras[0]['_7'];
    $_8 = $regras[0]['_8'];
    $_9 = $regras[0]['_9'];
    $_10 = $regras[0]['_10'];

    echo "$jejum!@#$_1!@#$_2!@#$_3!@#$_4!@#$_5!@#$_6!@#$_7!@#$_8!@#$_9!@#$_10";
} else {
    echo "Algo deu errado";
}

?>