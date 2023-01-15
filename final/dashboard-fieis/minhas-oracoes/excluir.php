<?php

require_once('../../conexao.php');

$id = $_POST['id'];

$pdo->query("DELETE FROM oracao_relacionada_com_a_categoria WHERE id_oracao = '$id'");

$pdo->query("DELETE FROM oracao WHERE id_pray = '$id'");

echo "Oração Excluida com Sucesso!";


?>