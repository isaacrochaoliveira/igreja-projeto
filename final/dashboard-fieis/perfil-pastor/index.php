<?php

require_once('../../conexao.php');
@session_start();
$id = addslashes($_GET['view']);

$query = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	$perfil = $res[0]['perfil_pas'];
}

?>

<div >
	<a href="<?=URL_BASE."dashboard-fieis/index.php?pag=pastores"?>"><i class="fa-solid fa-square-left"></i> Voltar</a>
</div>

<section>
	<img src="<?=IMAGEM."/fotos-pastores/$perfil"?>" class="card-img-top" width="350" height="350" style="border-radius: 100%;" alt="Foto de Perfil do Pastor">
</section>