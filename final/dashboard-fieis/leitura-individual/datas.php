<?php

require_once('../../conexao.php');
session_start();

$query = $pdo->query("SELECT * FROM leitura_individual WHERE autor_indLei = '$_SESSION[id]'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	for ($i = 0; $i < count($res); $i++) {
		foreach($res[$i] as $key => $value) {
		}
		$id = $res[$i]['id_indLei'];
		$dataFull = $res[$i]['data_job'];
		$dataFullEnd = $res[$i]['data_job_end'];
		$color = $res[$i]['color'];
		$title = $res[$i]['desc_indLei'];
		
		$events[] = [
			'id' => $id,
			'title' => $title,
			'color' => $color,
			'start' => $dataFull,
			'end' => $dataFullEnd,
		];
	}
}

echo json_encode($events);
