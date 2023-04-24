<?php

require_once('../../conexao.php');

$pastor = addslashes($_POST['pastor_a']);
$desc = addslashes($_POST['desc']);
$vers_base = addslashes($_POST['vers_base']);

$query = $pdo->query("SELECT * FROM jejuns WHERE pastor_comando = '$pastor'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$pdo->query("UPDATE jejuns SET pastor_comando = '$pastor', descricao_jejum = '$desc', versiculo_baseado = '$vers_base'");
} else {
	$pdo->query("UPDATE jejuns SET pastora_comando = '$pastor', descricao_jejum = '$desc', versiculo_baseado = '$vers_base'");
}

echo "Editado com Sucesso!";

?>