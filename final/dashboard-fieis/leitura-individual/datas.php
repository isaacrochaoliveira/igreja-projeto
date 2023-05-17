<?php

require_once('../../conexao.php');
$id_user = addslashes($_POST['id_usuario']);

$r = '';
$result = '';
$query = $pdo->query("SELECT * FROM leitura_individual WHERE autor_indLei = '$id_user'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	for ($i = 0; $i < count($res); $i++) {
		foreach($res[$i] as $key => $value) {
		}
		$dataFull = explode('-', $res[$i]['data_job']);
		$month = intVal($dataFull[1] - 1);
		$year = intVal($dataFull[0]);
		$day = intVal($dataFull[2]);
		$title = $res[$i]['desc_indLei'];
		
		$r = "!@#$year!@#$month!@#$day!@#$title";
		$result = $result.$r;
	}
}
print_r($result);