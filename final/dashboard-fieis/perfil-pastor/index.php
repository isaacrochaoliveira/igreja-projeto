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
	$email = $res[0]['email_pas'];
	$profissao = $res[0]['profissao_pas'];
	$ministerio = $res[0]['ministerio_pas'];
	$casado = $res[0]['casado_pas'];
	$qunt_tempo_casado = $res[0]['qunt_casado_pas'];
	$qunt_menbros = $res[0]['qunt_menbros_pas'];
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
			<div class="d-flex flex-wrap">
				<div class="d-block">
					<div class="ml-2">
						<p><?="\u{1F5FA} ".$nascionalidade_pas?></p>
					</div>
					<div class="ml-2">
						<p><?="\u{1F3A4} ".$tempo?> Ano(s)</p>
					</div>
					<div class="ml-2">
						<p><?="\u{260E} "?> (62) <?=$telefone?></p>
					</div>
				</div>
				<div class="d-block">
					<div class="ml-2">
						<p><?="\u{1F582} ".$email?></p>
					</div>
					<div class="ml-2">
						<p><?="\u{1F6E0} ".$profissao?></p>
					</div>
					<div class="ml-2">
						<p><?="\u{271D} ".$ministerio?></p>
					</div>
				</div>
				<div class="d-block">
					<div class="ml-2">
						<p><?="\u{2642} ".$casado ?> há <?=$qunt_tempo_casado?> Ano(s)</p>
					</div>
					<div class="ml-2">
						<p><?="\u{1F9E1} ".$qunt_menbros?> Membros</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mt-3 mx-3">
		<div>
			<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i></button>
		</div>
		<?php
			$query = $pdo->query("SELECT * FROM anotacoes_pastor WHERE id_pastor = '$id'");
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			if (count($res) > 0) {

			} else {
				?>
					<div>
						<div class="alert alert-warning" role="alert">
							<span style="font-size: 20px;"><i class="fa-solid fa-exclamation" style="font-size: 36px !important"></i> ATENÇÃO</span>
  							<p style="margin-bottom: 0px; font-size: 17px;">Sem Anotações para lhe mostrar!</p>
						</div>
					</div>
				<?php
			}
		?>
		
	</section>
</body>
</html>

<!--MODAL-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
    			...
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary">Understood</button>
      		</div>
    	</div>
  	</div>
</div>