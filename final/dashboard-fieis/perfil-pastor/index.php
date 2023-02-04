<?php

require_once('../../conexao.php');
@session_start();
$id = addslashes($_GET['view']);

$query = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$perfil = $res[0]['perfil_pas'];
	$nome_pas = $res[0]['nome_pas'];
	$bio_pas = $res[0]['bio_pas'];
	$nascionalidade_pas = $res[0]['nasionalidade_pas'];
	$tempo = $res[0]['tempo_pas'];
	$telefone = $res[0]['telefone_pas'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$nome_pas?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="../../assets/styles/dashboard.css">
    <link rel="stylesheet" href="../../assets/styles/adminlte.min.css">
</head>
<body>
	<div class="bg-dark p-4">
		<a href="<?=URL_BASE."dashboard-fieis/index.php?pag=pastores"?>" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
	</div>
	<section class="d-flex mt-2">
		<div class="w-30porc">
			<img src="<?=IMAGEM."/fotos-pastores/$perfil"?>" width="350" height="350" style="border-radius: 100%;" alt="Foto de Perfil do Pastor">
		</div>
		<div class="m-2 w-75porc" style="word-break: break-all;">
			<h1 class="f-family-LobsterTwoBoldItalic"><?=$nome_pas?></h1>
			<p class="f-family-ComfortaaRegular"><?=$bio_pas?></p>
			<hr>
			<div class="d-block">
				<div>
					<p><?="\u{1F5FA}".$nascionalidade_pas?></p>
				</div>
				<div>
					<p><?="\u{1F3A4}".$tempo?> Ano(s)</p>
				</div>
				<div>
					<p>(62) <?=$telefone?></p>
				</div>
			</div>
		</div>
	</section>
</body>
</html>