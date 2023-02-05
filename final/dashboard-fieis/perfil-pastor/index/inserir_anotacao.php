<?php

require_once('../../../conexao.php');

$anotacao = addslashes($_POST['anotacao']);

$pdo->query("INSERT INTO anotacoes_pastor SET id_pastor = :id_pastor, texto_anotacao = :text_anotacao, data_anotacao = :data_anotacao, hora_anotacao = :hora_anotacao")

?>