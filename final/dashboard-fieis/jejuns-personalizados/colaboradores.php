<?php

require_once('../../conexao.php');

$id_jejum = addslashes($_POST['id_jejum']);

$query = $pdo->query("SELECT * FROM colaborando_jejum as cl JOIN usuarios as u ON cl.id_colaborando = u.id WHERE id_colaborando_jejum = '$id_jejum'");
$colab = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($colab) > 0) {
	for ($i = 0; $i < count($colab); $i++)) {
		foreach ($colab[$i] as $key => $value) {
		}
		
	}
}