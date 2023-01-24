<?php

require_once('../../conexao.php');
@session_start();
$id = $_POST['id'];

$pdo->query("UPDATE grupos_de_oracao SET ativo = 'N' WHERE id_group = '$id'");
$res = $pdo->prepare("UPDATE grupos_de_oracao SET ativo = :ativo WHERE id_group = :id");
$res->bindValue(':ativo', 'S');
$res->bindValue(':id', $id),
if ($res->execute()) {
    echo "Reaberto com Sucesso!";
} else {
    echo "Erro na atualização";
}
