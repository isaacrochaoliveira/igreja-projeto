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
	$res_cli = $query_cli->fetchAl(PDO::FETCH_ASSOC);
	$nome = $res_cli[0]['nome'];
		
	echo "$id_criador@!#$nome@!#$pastor@!#$pastora@!#$jejum@!#$desc@!#$vers@!#$colaboradores@!#$partic@!#$data@!#$hora";
}