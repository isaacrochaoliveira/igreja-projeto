<?php

require_once('../../conexao.php');

$id_anotacao = addslashes($_POST['id_anotacao']);
$anotacao = addslashes($_POST['nova_anotacao']);
$res = $pdo->prepare("UPDATE anotacoes SET anotacao = :anotacao WHERE id = :id_anotacao;");
$res->bindValue(':id_anotacao', $id_anotacao);
$res->bindValue(':anotacao', $anotacao);
if ($res->execute()) {
    echo $anotacao;
} else {
    echo "Anotação Nçao inserida com Sucesso";
}

?>
