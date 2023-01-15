<?php

require_once('../../conexao.php');
@session_start();

$titulo = addslashes($_POST['titulo']);
$descricao = addslashes($_POST['desc']);
$categorias1 = addslashes($_POST['cat1']);
$categorias2 = addslashes($_POST['cat2']);
$categorias3 = addslashes($_POST['cat3']);
$categorias4 = addslashes($_POST['cat4']);


$res = $pdo->prepare("INSERT INTO oracao SET id_criador = :id_criador, titulo = :titulo, descricao = :descricao, orando = :orando");
$res->bindValue(':id_criador', $_SESSION['id']);
$res->bindValue(':titulo', $titulo);
$res->bindValue(':descricao', $descricao);
$res->bindValue(':orando', 0);
if ($res->execute()) {
	$query = $pdo->query("SELECT * FROM oracao ORDER BY id_pray DESC");
	$res_ = $query->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_) > 0) {
		$id_oracao = $res_[0]['id_pray'];
		if (!empty($categorias1)) {
			$res_cat = $pdo->prepare("INSERT INTO oracao_relacionada_com_a_categoria SET id_oracao = :id_oracao, id_categoria = :id_cat");
			$res_cat->bindValue(':id_oracao', $id_oracao);
			$res_cat->bindValue(':id_cat', $categorias1);
			$res_cat->execute();
		} 
		if (!empty($categorias2)) {
			$res_cat = $pdo->prepare("INSERT INTO oracao_relacionada_com_a_categoria SET id_oracao = :id_oracao, id_categoria = :id_cat");
			$res_cat->bindValue(':id_oracao', $id_oracao);
			$res_cat->bindValue(':id_cat', $categorias2);
			$res_cat->execute();
		}
		if (!empty($categorias3)) {
			$res_cat = $pdo->prepare("INSERT INTO oracao_relacionada_com_a_categoria SET id_oracao = :id_oracao, id_categoria = :id_cat");
			$res_cat->bindValue(':id_oracao', $id_oracao);
			$res_cat->bindValue(':id_cat', $categorias3);
			$res_cat->execute();
		}
		if (!empty($categorias4)) {
			$res_cat = $pdo->prepare("INSERT INTO oracao_relacionada_com_a_categoria SET id_oracao = :id_oracao, id_categoria = :id_cat");
			$res_cat->bindValue(':id_oracao', $id_oracao);
			$res_cat->bindValue(':id_cat', $categorias4);
			$res_cat->execute();
		}
	}
	echo "Oração inserida com Sucesso! Vamos vincular a sua foto com a oração.";
} else {
	echo "ERRO! Tente novamente mais tarde.";
}
