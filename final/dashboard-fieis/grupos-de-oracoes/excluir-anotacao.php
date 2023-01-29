<?php

require_once('../../conexao.php');

$id_group = addslashes($_POST['id_group']);
$id_anotacao = addslashes($_POST['id_anotacao']);

$pdo->query("DELETE FROM anotacoes WHERE id = '$id_anotacao'");
echo "Excluído com Sucesso!";

?>
