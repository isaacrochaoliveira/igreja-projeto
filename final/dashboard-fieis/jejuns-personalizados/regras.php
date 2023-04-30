<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT * FROM regras_jejum WHERE id_regras_jejum = '$id_jejum'");
$regras = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($regras) > 0) {
    
}

?>