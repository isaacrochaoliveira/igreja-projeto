<?php

require_once('../../../conexao.php');

$anotacao = addslashes($_POST['anotacao']);
$view = addslashes($_POST['view']);
$escolha = addslashes($_POST['escolha']);

if ($escolha == "view") {
    $res = $pdo->prepare("INSERT INTO anotacoes_pastor SET id_pastor = :id_pastor, texto_anotacao = :text_anotacao, data_anotacao = :data_anotacao, hora_anotacao = :hora_anotacao");
    $res->bindValue(':id_pastor', $view);
    $res->bindValue(':text_anotacao', $anotacao);
    $res->bindValue(':data_anotacao', Date('Y-m-d'));
    $res->bindValue(':hora_anotacao', Date('G:i:s'));
    if ($res->execute()) {
        echo "$view";
    } else {
        echo "Erro ao  Inserir Anotação!";
    }
} else {
    if ($escolha == "view_pas") {
        $res = $pdo->prepare("INSERT INTO anotacoes_pastora SET id_pastora = :id_pastora, texto_anotacao_pastora = :texto_anotacao_pastora, data_anotacao_pastora = :data_anotacao_pastora, hora_anotacao_pastora = :hora_anotacao_pastora");
        $res->bindValue(':id_pastora', $view);
        $res->bindValue(':texto_anotacao_pastora', $anotacao);
        $res->bindValue(':data_anotacao_pastora', Date('Y-m-d'));
        $res->bindValue(':hora_anotacao_pastora', Date('G:i:s'));
        if ($res->execute()) {
            echo "$view";
        } else {
            echo "Erro ao  Inserir Anotação!";
        }
    }
}
?>
