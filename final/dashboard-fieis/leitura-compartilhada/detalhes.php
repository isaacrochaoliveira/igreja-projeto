<?php

require_once('../../conexao.php');

$id = addslashes($_POST['id']);

$query = $pdo->query("SELECT * FROM leitura_compartilhada WHERE id_leiCom = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {

}


?>
