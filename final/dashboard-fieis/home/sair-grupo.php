<?php

require_once('../../conexao.php');
@session_start();

$id = $_POST['id'];

$query = $pdo->query("SELECT pessoas_part FROM grupos_de_oracao WHERE id = '$id''");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$mais_um = intVal($res[0]['pessoas_part']) - 1;
	$res_upd = $pdo->prepare("UPDATE grupos_de_oracao SET pessoas_part = :mais_um WHERE id = :id");
	$res_upd->bindValue(':mais_um', $mais_um);
	$res_upd->bindValue(':id', $id);
	$res_upd->execute();

	$pdo->query("DELETE FROM participando_do_grupo WHERE id_usuario = '$_SESSION[id]' AND id_grupo = '$id'");

	echo "Sucesso!";
}

?>