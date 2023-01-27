<?php

require_once('../../conexao.php');
@session_start();
date_default_timezone_set("America/Sao_Paulo");
$id_gruop = addslashes($_POST['id_group']);
$titulo_grupo = addslashes($_POST['titulo_grupo']);
$descrica_do_grupo = addslashes($_POST['descricao_grupo']);
$_r1 = addslashes($_POST['_regras1']);
$_r2 = addslashes($_POST['_regras2']);
$_r3 = addslashes($_POST['_regras3']);
$_r4 = addslashes($_POST['_regras4']);
$_r5 = addslashes($_POST['_regras5']);
$_r6 = addslashes($_POST['_regras6']);
$_r7 = addslashes($_POST['_regras7']);
$_r8 = addslashes($_POST['_regras8']);
$_r9 = addslashes($_POST['_regras9']);
$_r10 = addslashes($_POST['_regras10']);

$res = $pdo->prepare("UPDATE grupos_de_oracao SET title = :title, descricao = :descricao WHERE id_group = :id_group");
$res->bindValue(':id_group', $id_gruop);
$res->bindValue(':title', $titulo_grupo);
$res->bindValue(':descricao', $descrica_do_grupo);
$res->execute();

if (!$_r1 == "") {

	$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras1 = :r1");
	$res_regras->bindValue(':id_grupo', $id_gruop);
	$res_regras->bindValue(':r1', $_r1);

	$res_regras->execute();
}
if (!$_r2 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras2 = :_r2 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r2', $_r2);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras2 = :r2");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r2', $_r2);
	}
	$res_regras->execute();
}
if (!$_r3 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras3 = :_r3 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r3', $_r3);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras3 = :r3");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r3', $_r3);
	}
	$res_regras->execute();
}
if (!$_r4 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras4 = :_r4 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r4', $_r4);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras4 = :r4");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r4', $_r4);
	}
	$res_regras->execute();
}
if (!$_r5 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras5 = :_r5 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r5', $_r5);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras5 = :r5");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r5', $_r5);
	}
	$res_regras->execute();
}
if (!$_r6 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras6 = :_r6 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r6', $_r6);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras6 = :r6");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r6', $_r6);
	}
	$res_regras->execute();
}
if (!$_r7 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras7 = :_r7 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r7', $_r7);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras7 = :r7");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r7', $_r7);
	}
	$res_regras->execute();
}
if (!$_r8 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras8 = :_r8 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r8', $_r8);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras8 = :r8");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r8', $_r8);
	}
	$res_regras->execute();
}
if (!$_r9 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras9 = :_r9 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r9', $_r9);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras9 = :r9");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r9', $_r9);
	}
	$res_regras->execute();
}
if (!$_r10 == "") {
	$query_verifica = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
	$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);
	if (count($res_verifica) > 0) {
		$res_regras = $pdo->prepare("UPDATE regras_do_grupo SET _regras10 = :_r10 WHERE id_grupo = :id_group");
		$res_regras->bindValue(':_r10', $_r10);
		$res_regras->bindValue(':id_group', $id_gruop);
	} else {
		$res_regras = $pdo->prepare("INSERT INTO regras_do_grupo SET id_grupo = :id_grupo, _regras10 = :r10");
		$res_regras->bindValue(':id_grupo', $id_gruop);
		$res_regras->bindValue(':r10', $_r10);
	}
	$res_regras->execute();
}
$query_verifica = $pdo->query("SELECT * FROM grupos_de_oracao WHERE id_group = '$id_gruop'");
$res_verifica = $query_verifica->fetchAll(PDO::FETCH_ASSOC);

$query_verifica_r = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id_gruop'");
$res_verifica_r = $query_verifica_r->fetchAll(PDO::FETCH_ASSOC);
if (count($res_verifica) > 0) {
	if (count($res_verifica_r) > 0) {
		echo "Criado com Sucesso!";
	} else {
		echo "Criado com Sucesso!";
	}
} else {
	echo "Erro ao Cadastrar o Grupo!";
}
