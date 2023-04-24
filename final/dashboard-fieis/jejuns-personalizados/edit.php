<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum_d']);
$pastor = addslashes($_POST['pastor']);
$pastora = addslashes($_POST['pastora']);
$desc = addslashes($_POST['desc']);
$vers_base = addslashes($_POST['vers_base']);

if ($pastora == "") {
	$pdo->query("UPDATE jejuns SET pastora_comando = null, pastor_comando = '$pastor', descricao_jejum = '$desc', versiculo_baseado = '$vers_base' WHERE id_jejum = '$id_jejum'");
} else {
	$pdo->query("UPDATE jejuns SET pastor_comando = null, pastora_comando = '$pastora', descricao_jejum = '$desc', versiculo_baseado = '$vers_base' WHERE id_jejum = '$id_jejum'");
}

echo "Editado com Sucesso!";

?>