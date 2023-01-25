<?php

require_once('../../conexao.php');
@session_start();
$id = $_POST['id'];

$pdo->query("UPDATE grupos_de_oracao SET ativo = 'N' WHERE id_group = '$id'");
$res = $pdo->query("UPDATE grupos_de_oracao SET ativo = 'N' WHERE id_group = '$id'");
echo "Fechado com Sucesso!";
