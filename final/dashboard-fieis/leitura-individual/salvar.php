<?php

require_once('../../conexao.php');

$data = addslashes($_POST['data']);

$query = $pdo->query("SELECT * FROM leitura_individual autor_indLei = '$id_user'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    
}

?>
