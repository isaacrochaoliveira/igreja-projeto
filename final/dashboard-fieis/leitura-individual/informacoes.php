<?php

require_once('../../conexao.php');
$id_indLei = addslashes($_POST['id_jobs']);

$query = $pdo->query("SELECT * FROM leitura_individual as li JOIN usuarios as u ON li.autor_indLei = u.id WHERE id_indLei = '$id_indLei'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$perfil = $res[0]['perfil'];
	$title = $res[0]['desc_indLei'];
	$start = $res[0]['data_job'];
	$end = $res[0]['data_job_end'];
	$cor = $res[0]['color'];
}

$start = implode('/', array_reverse(explode('-', $start)));
$end = implode('/', array_reverse(explode('-', $end)));


echo "$perfil!@#$title!@#$start!@#$end!@#$cor!@#$id_indLei";

?>
