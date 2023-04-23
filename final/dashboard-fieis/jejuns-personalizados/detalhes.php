<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT * FROM jejuns WHERE id_jejum = '$id_jejum'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$id_criador = $res[0]['id_criador_jejum'];
	$pastor = $res[0]['pastor_comando'];
	$pastora = $res[0]['pastora_comando'];
	$jejum = $res[0]['jejum'];
	$desc = $res[0]['descricao_jejum'];
	$vers = $res[0]['versiculo_baseado'];
	$colaboradores = $res[0]['colaboracao'];
	$partic = $res[0]['quantidade_pessoas'];
	$data = $res[0]['data_jejum'];
	$hora = $res[0]['hora_jejum'];
	
	$query_cli = $pdo->query("SELECT * FROM usuarios WHERE id = '$id_criador'");
	$res_cli = $query_cli->fetchAll(PDO::FETCH_ASSOC);
	$nome = $res_cli[0]['nome'];
	
	if ($pastor == "") {
		$tabela = "pastoras";
		$column = 'id_pas_ras';
		$id = $pastora;
	} else {
		$tabela = 'pastores';
		$column = 'id_pas';
		$id = $pastor;
	}
	
	$query_pas = $pdo->query("SELECT * FROM $tabela WHERE $column = '$id'");
	$res = $query_pas->fetchAll(PDO::FETCH_ASSOC);
	if (!isset($res[0]['id_pas'])) {
		$nome_p = $res[0]['nome_pas_ras'];
	} else {
		$nome_p = $res[0]['nome_pas'];
	}
		
	echo "$id_criador@!#$nome@!#$nome_p@!#$jejum@!#$desc@!#$vers@!#$colaboradores@!#$partic@!#$data@!#$hora";
}