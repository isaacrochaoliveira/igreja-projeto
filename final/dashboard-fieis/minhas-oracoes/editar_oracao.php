<?php

require_once('../../conexao.php');
@session_start();

$id = addslashes($_POST['id_oracao_edit_id']);
$titulo = addslashes($_POST['titulo']);
$descricao = addslashes($_POST['desc']);
$categorias1 = addslashes($_POST['cat1']);
$categorias2 = addslashes($_POST['cat2']);
$categorias3 = addslashes($_POST['cat3']);
$categorias4 = addslashes($_POST['cat4']);
$cat1 = addslashes($_POST['cat1_at']);
$cat2 = addslashes($_POST['cat2_at']);
$cat3 = addslashes($_POST['cat3_at']);
$cat4 = addslashes($_POST['cat4_at']);

$res = $pdo->prepare("UPDATE oracao SET titulo = :titulo, descricao = :descricao, orando = :orando WHERE id_pray = :id");
$res->bindValue(':id', $id);
$res->bindValue(':titulo', $titulo);
$res->bindValue(':descricao', $descricao);
$res->bindValue(':orando', 0);
if ($res->execute()) {
	$query = $pdo->query("SELECT * FROM oracao ORDER BY id_pray DESC");
	$res_ = $query->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_) > 0) {
		$id_oracao = $res_[0]['id_pray'];
		if (!empty($categorias1)) {
			if (!($categorias1 == $cat1)) {
				$res_cat = $pdo->prepare("UPDATE oracao_relacionada_com_a_categoria SET id_categoria = :id_cat WHERE id_oracao = :id_oracao AND id_categoria = :id_cat_ant");
				$res_cat->bindValue(':id_oracao', $id_oracao);
				$res_cat->bindValue(':id_cat_ant', $cat1);
				$res_cat->bindValue(':id_cat', $categorias1);
				$res_cat->execute();
			}
		} 
		if (!empty($categorias2)) {
			if (!($categorias2 == $cat2)) {
				$res_cat = $pdo->prepare("UPDATE oracao_relacionada_com_a_categoria SET id_categoria = :id_cat WHERE id_oracao = :id_oracao AND id_categoria = :id_cat_ant");
				$res_cat->bindValue(':id_oracao', $id_oracao);
				$res_cat->bindValue(':id_cat_ant', $cat2);
				$res_cat->bindValue(':id_cat', $categorias2);
				$res_cat->execute();
			}
		}
		if (!empty($categorias3)) {
			if (!($categorias3 == $cat3)) {
				$res_cat = $pdo->prepare("UPDATE oracao_relacionada_com_a_categoria SET id_categoria = :id_cat WHERE id_oracao = :id_oracao AND id_categoria = :id_cat_ant");
				$res_cat->bindValue(':id_oracao', $id_oracao);
				$res_cat->bindValue(':id_cat_ant', $cat3);
				$res_cat->bindValue(':id_cat', $categorias3);
				$res_cat->execute();
			}
		}
		if (!empty($categorias4)) {
			if (!($categorias4 == $cat4)) {
				$res_cat = $pdo->prepare("UPDATE oracao_relacionada_com_a_categoria SET id_categoria = :id_cat WHERE id_oracao = :id_oracao AND id_categoria = :id_cat_ant");
				$res_cat->bindValue(':id_oracao', $id_oracao);
				$res_cat->bindValue(':id_cat_ant', $cat4);
				$res_cat->bindValue(':id_cat', $categorias4);
				$res_cat->execute();
			}
		}
	}
	echo "Oração Atualizada com Sucesso!";
} else {
	echo "ERRO! Tente novamente mais tarde.";
}
