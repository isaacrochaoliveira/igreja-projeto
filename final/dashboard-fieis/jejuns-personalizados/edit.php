<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum_d']);
$pastor = addslashes($_POST['pastor']);
$pastora = addslashes($_POST['pastora']);
$desc = addslashes($_POST['desc']);
$vers_base = addslashes($_POST['vers_base']);

if ($pastor == "" && $pastora == "") {
	echo "Informe o Pastor(a)";
	exit();
}

if ($pastora == "") {
	$pdo->query("UPDATE jejuns SET pastora_comando = null, pastor_comando = '$pastor', descricao_jejum = '$desc', versiculo_baseado = '$vers_base' WHERE id_jejum = '$id_jejum'");
	
	$query = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$pastor'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$nome = $res[0]['nome_pas'];
	
	echo "Editado com Sucesso!$@#$nome$@#$desc$@#$vers_base";
	exit();
} else {
	$pdo->query("UPDATE jejuns SET pastor_comando = null, pastora_comando = '$pastora', descricao_jejum = '$desc', versiculo_baseado = '$vers_base' WHERE id_jejum = '$id_jejum'");
	
	$query = $pdo->query("SELECT * FROM pastoras WHERE id_pas_ras = '$pastora'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$nome = $res[0]['nome_pas_ras'];
	
	echo "Editado com Sucesso!$@#$nome$@#$desc$@#$vers_base";
	exit();
}

echo "Erro ao Editar";


?>