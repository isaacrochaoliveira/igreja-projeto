<?php

require_once('../../conexao.php');

$id_group = addslashes($_POST['id_group']);
$anotacao = addslashes($_POST['anotacao']);

$res = $pdo->prepare("INSERT INTO anotacoes SET id_group = :id_group, anotacao = :anotacao;");
$res->bindValue(':id_group', $id_group);
$res->bindValue(':anotacao', $anotacao);
if ($res->execute()) {
    echo "Anotação Inserida com Sucesso!";
} else {
    echo "Anotação Nçao inserida com Sucesso";
}

?>
