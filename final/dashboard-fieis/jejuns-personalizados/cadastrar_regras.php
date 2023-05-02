<?php

require_once('../../conexao.php');


$id_jejum = addslashes($_POST['id_jejumCadRegras']);
$_1 = addslashes($_POST['_1']);
$_2 = addslashes($_POST['_2']);
$_3 = addslashes($_POST['_3']);
$_4 = addslashes($_POST['_4']);
$_5 = addslashes($_POST['_5']);
$_6 = addslashes($_POST['_6']);
$_7 = addslashes($_POST['_7']);
$_8 = addslashes($_POST['_8']);
$_9 = addslashes($_POST['_9']);
$_10 = addslashes($_POST['_10']);

if (!(empty($_1))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_1']))) {
		$r_1 = $pdo->prepare("INSERT INTO regras_jejum SET _1 = :_1, _id_regras_jejum = :id_jejum");
		$r_1->bindValue(':_1', $_1);
		$r_1->bindValue(':id_jejum', $id_jejum);
		if ($r_1->execute()) {
			echo 2;
		} else {
			echo "Errado!";
		}
	}
}
if (!(empty($_2))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (isset($res[0]['_1'])) {
		$r_2 = $pdo->prepare("UPDATE regras_jejum SET _2 = :_2 WHERE _id_regras_jejum = :id_jejum");
		$r_2->bindValue(':_2', $_2);
		$r_2->bindValue(':id_jejum', $id_jejum);
		if ($r_2->execute()) {
			echo 3;
		} else {
			echo "Errado!";
		}
	}
}
if (!(empty($_3))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (isset($res[0]['_2'])) {
		$r_3 = $pdo->prepare("UPDATE regras_jejum SET _3 = :_3 WHERE _id_regras_jejum = :id_jejum");
		$r_3->bindValue(':_3', $_3);
		$r_3->bindValue(':id_jejum', $id_jejum);
		if ($r_2->execute()) {
			echo 4;
		} else {
			echo "Errado!";
		}
	}
}
