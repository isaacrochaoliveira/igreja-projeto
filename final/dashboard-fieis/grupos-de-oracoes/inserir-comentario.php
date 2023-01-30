<?php

require_once('../../conexao.php');
@session_start();

$comentario_text = addslashes($_POST['comentario_text']);
$id_grupo = addslashes($_POST['id_grupo']);
$data = date('Y-m-d');
$agora = date('H:i:s');

$res = $pdo->prepare("INSERT INTO comentarios_grupos SET id_comentador = :id_comentador, id_grupo = :id_grupo, comentario = :comentario, pessoas_curtiram = :pessoas_curtiram, data_comment = :data_comment, hora_comment = :hora_comment");
$res->bindValue(':id_comentador', $_SESSION['id']);
$res->bindValue(':id_grupo', $id_grupo);
$res->bindValue(':comentario', $comentario_text);
$res->bindValue(':pessoas_curtiram', '0');
$res->bindValue(':data_comment', $data);
$res->bindValue(':hora_comment', $agora);
if ($res->execute()) {
    echo "$id_grupo";
} else {
    echo "Não Inserido!";
}
?>
