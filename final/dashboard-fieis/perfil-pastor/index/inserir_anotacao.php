<?php

require_once('../../../conexao.php');
@session_start();

$anotacao = addslashes($_POST['anotacao']);
$view = addslashes($_POST['view']);

$res = $pdo->prepare("INSERT INTO anotacoes_pastor SET id_pastor = :id_pastor, texto_anotacao = :text_anotacao, data_anotacao = :data_anotacao, hora_anotacao = :hora_anotacao");
$res->bindValue(':id_pastor', $_SESSION['id']);
$res->bindValue(':texto_anotacao', $anotacao);
$res->bindValue(':data_anotacao', Date('Y-m-d'));
$res->bindValue(':hora_anotacao', Date('G:i:s'));
if ($res->execute()) {
    echo "$view";
} else {
    echo "Erro ao  Inserir Anotação!";
}

?>