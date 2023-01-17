<?php

require_once('../../conexao.php');
@session_start();

$id_grupo = $_POST['id'];
if ($id_grupo == -1) {
	$query = $pdo->query("SELECT pessoas_part FROM grupos_de_oracao WHERE id = 1");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (count($res) > 0) {
		$mais_um = intVal($res[0]['pessoas_part']) + 1;
		$res_upd = $pdo->prepare("UPDATE grupos_de_oracao SET pessoas_part = :mais_um WHERE id = :id");
		$res_upd->bindValue(':mais_um', $mais_um);
		$res_upd->bindValue(':id', 1);
		$res_upd->execute();

		$res_peng = $pdo->prepare("INSERT INTO participando_do_grupo SET id_usuario = :id_user, id_grupo = :id_grupo");
		$res_peng->bindValue(':id_user', $_SESSION['id']);
		$res_peng->bindValue(':id_grupo', 1);
		$res_peng->execute();
		echo "Sucesso!";
	}
} else if ($id_grupo >= 1) {
	$query = $pdo->query("SELECT pessoas_part FOM grupos_de_oracao WHERE id = '$id_grupo'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (count($res) > 0) {
		$mais_um = invVal($res[0]['pessoas_part']) + 1;
		$res_upd = $pdo->prepare("UPDATE grupos_de_oracao SET pessoas_part = :mais_um WHERE id = :id");
		$res_und->bindValue(':mais_um', $mais_um);
		$res_und->bindValue(':id', $id_grupo);
		$res_und->execute();

		$res_peng = $pdo->prepare("INSERT INTO participando_do_grupo SET id_usuario = :id_user, id_grupo = :id_grupo");
		$res_peng->bindValue(':id_user', $_SESSION['id']);
		$res_peng->bindValue(':id_grupo', $id_grupo);
		$res_peng->execute();
		echo "Sucesso!";
	}
}

?>