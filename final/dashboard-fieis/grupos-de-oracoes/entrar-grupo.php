<?php

require_once('../../conexao.php');
@session_start();

$id_grupo = $_POST['id'];
$query = $pdo->query("SELECT * FROM grupos_de_oracao WHERE id_group = '$id_grupo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$mais_um = intVal($res[0]['pessoas_part']) + 1;
	$res_upd = $pdo->prepare("UPDATE grupos_de_oracao SET pessoas_part = :mais_um WHERE id_group = :id");
	$res_upd->bindValue(':mais_um', $mais_um);
	$res_upd->bindValue(':id', $id_grupo);
	$res_upd->execute();


	$res_peng = $pdo->prepare("INSERT INTO participando_do_grupo SET id_usuario = :id_user, id_grupo = :id_grupo");
	$res_peng->bindValue(':id_user', $_SESSION['id']);
	$res_peng->bindValue(':id_grupo', $id_grupo);
	$res_peng->execute();

	echo "Sucesso!";
}

?>