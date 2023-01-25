<?php

require_once('../../conexao.php');
@session_start();
$id = $_POST['id'];

$pdo->query("UPDATE grupos_de_oracao SET ativo = 'S' WHERE id_group = '$id'");
$res = $pdo->query("UPDATE grupos_de_oracao SET ativo = 'S' WHERE id_group = '$id'");
echo "Reaberto com Sucesso!";
