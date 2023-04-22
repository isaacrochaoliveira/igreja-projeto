<?php

require_once('../conexao.php');

$id_jejum = addslashes($_POST['id_jejum']);
$perfil = $_FILES['capa'];
if (!$perfil['tmp_name'] == null) {
	if ($perfil['size'] > 2097152) {
		die("Tamanho Máxino do arquivo: 2MB");
	}

	if ($perfil['error']) {
		die("Falha no envio de arquivo!");
	}

	$path = "../../assets/images-jejuns/fotos/";
	$arq = uniqid();

	$ext = strtolower(pathinfo($perfil['name'], PATHINFO_EXTENSION));
	if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
		die("Tente as extensões: jpg, png, svg, tiff. <br>Extensão atual: $ext");
	} else {
		$bool = move_uploaded_file($perfil['tmp_name'], $path.$arq.'.'.$ext);
		$name = $arq.'.'.$ext;
		$pdo->query("UPDATE jejuns SET imagem = '$name' WHERE id_jejum = '$id_jejum'");
		echo "Foto Inserida com Sucesso!@#!-$name";
	}
}
