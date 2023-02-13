<?php

require_once('../../conexao.php');
@session_start();
$pag = "index";

if (isset($_GET['view'])) {
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
} else if (isset($_GET['view_pas'])) {
	$id = addslashes($_GET['view_pas']);
	$query = $pdo->query("SELECT * FROM pastoras WHERE id_pas_ras = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (count($res) > 0) {
		$perfil = $res[0]['perfil_pas_ras'];
		$nome_pas = $res[0]['nome_pas_ras'];
		$bio_pas = $res[0]['bio_pas_ras'];
		$nascionalidade_pas = $res[0]['nascionalidade_pas_ras'];
		$tempo = $res[0]['tempo_pas_ras'];
		$telefone = $res[0]['telefone_pas_ras'];
		$email = $res[0]['email_pas_ras'];
		$profissao = $res[0]['profissao_pas_ras'];
		$ministerio = $res[0]['ministerio_pas_ras'];
		$casado = $res[0]['casado_pas_ras'];
		$qunt_tempo_casado = $res[0]['qunt_casado_pas_ras'];
		$qunt_menbros = $res[0]['qunt_menbros_pas_ras'];
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $nome_pas ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="../../assets/styles/dashboard.css">
	<link rel="stylesheet" href="../../assets/styles/adminlte.min.css">
</head>

<body>
	<div class="bg-dark p-4">
		<a href="<?= URL_BASE . "dashboard-fieis/index.php?pag=pastores" ?>" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
	</div>
	<section class="d-flex mt-2">
		<div class="w-30porc">
			<img src="<?= IMAGEM . "/fotos-pastores/$perfil" ?>" width="350" height="350" style="border-radius: 100%;" alt="Foto de Perfil do Pastor">
		</div>
		<div class="m-2 w-75porc" style="word-break: break-all;">
			<h1 class="f-family-LobsterTwoBoldItalic"><?= $nome_pas ?></h1>
			<p class="f-family-ComfortaaRegular"><?= $bio_pas ?></p>
			<hr>
			<div class="d-flex flex-wrap">
				<div class="d-block">
					<div class="ml-2">
						<p><?= "\u{1F5FA} " . $nascionalidade_pas ?></p>
					</div>
					<div class="ml-2">
						<p><?= "\u{1F3A4} " . $tempo ?> Ano(s)</p>
					</div>
					<div class="ml-2">
						<p><?= "\u{260E} " ?> (62) <?= $telefone ?></p>
					</div>
				</div>
				<div class="d-block">
					<div class="ml-2">
						<p><?= "\u{1F582} " . $email ?></p>
					</div>
					<div class="ml-2">
						<p><?= "\u{1F6E0} " . $profissao ?></p>
					</div>
					<div class="ml-2">
						<p><?= "\u{271D} " . $ministerio ?></p>
					</div>
				</div>
				<div class="d-block">
					<div class="ml-2">
						<p><?= "\u{2642} " . $casado ?> há <?= $qunt_tempo_casado ?> Ano(s)</p>
					</div>
					<div class="ml-2">
						<p><?= "\u{1F9E1} " . $qunt_menbros ?> Membros</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mt-3 mx-3">
		<div>
			<?php
				if (isset($_GET['view'])) {
					$query_ver = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$id' AND id_insersor = '$_SESSION[id]'");
				} else if (isset($_GET['view_pas'])) {
					$query_ver = $pdo->query("SELECT * FROM pastoras WHERE id_pas_ras = '$id' AND id_insersor_pas = '$_SESSION[id]'");
				}
				$res_ver = $query_ver->fetchAll(PDO::FETCH_ASSOC);
				if (count($res_ver) > 0) {
					?>
						<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalCriarAnotacao"><i class="fa-solid fa-plus"></i></button>
						<button type="button" data-bs-toggle="modal" data-bs-target="#ModalUploadFotoPerfilPastor" class="btn btn-outline-secondary mb-2"><i class="fa-solid fa-upload"></i></button>
						<button type="button" data-bs-toggle="modal" data-bs-target="#ModalCadPastores" class="btn btn-danger mb-2"><i class="fa-solid fa-pen"></i></button>
					<?php
				}
			?>
		</div>
		<?php
		if (isset($_GET['view'])) {
			$query = $pdo->query("SELECT * FROM anotacoes_pastor WHERE id_pastor = '$id'");
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			if (count($res) > 0) {
				?>
				<diV class="d-flex flex-wrap mx-1">
					<?php
					for ($i = 0; $i < count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
						$anotacao = $res[$i]['texto_anotacao'];
						$data = $res[$i]['data_anotacao'];
						$hora = $res[$i]['hora_anotacao'];
						$data = implode('/', array_reverse(explode('-', $data)));

						?>
							<div class="card" style="width: 24rem;">
								<div class="card-body">
									<h6><?=$data?> às <?=$hora?></h6>
									<p class="card-text"><?=$anotacao?></p>
								</div>
							</div>
						<?php
					}
					?>
				</div>
				<?php
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
		} else if (isset($_GET['view_pas'])) {
			$query = $pdo->query("SELECT * FROM anotacoes_pastora WHERE id_pastora = '$id'");
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			if (count($res) > 0) {
				?>
				<diV class="d-flex flex-wrap mx-1">
					<?php
					for ($i = 0; $i < count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
						$anotacao = $res[$i]['texto_anotacao_pastora'];
						$data = $res[$i]['data_anotacao_pastora'];
						$hora = $res[$i]['hora_anotacao_pastora'];
						$data = implode('/', array_reverse(explode('-', $data)));
						?>
							<div class="card mt-3" style="width: 24rem;">
								<div class="card-body">
									<h6><?=$data?> às <?=$hora?></h6>
									<p class="card-text"><?=$anotacao?></p>
								</div>
							</div>
						<?php
					}
					?>
				</div>
				<?php
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
		}
		?>
	</section>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--MODAL-->
<div class="modal fade" id="ModalCriarAnotacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Anotações do Pastor/Pastoras</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<div id="Mensagem" class="ml-2">

				</div>
				<?php
				if (isset($_GET['view'])) {
					$view = addslashes($_GET['view']);
				} else if (isset($_GET['view_pas'])) {
					$view_pas = addslashes($_GET['view_pas']);
				}
				?>
			</div>
			<form action="" method="POST" id="FormAnotacaoPastor">
				<div class="modal-body">
					<h5>Criar Anotação</h5>
					<textarea cols="05" rows="05" placeholder="Digite Aqui..." class="form-control" name="anotacao" id="anotacao"></textarea>
				</div>
				<div class="modal-footer">
					<?php
						if (!(isset($_get['view']))) {
							?>
								<input type="hidden" name="escolha" value="view_pas">
							<?php
						} else {
							?>
								<input type="hidden" name="escolha" value="view">
							<?php
						}
					?>
					<input type="hidden" name="view" value="<?=isset($view) ? $view : $view_pas ?>">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary" name="CadastrarAnotacaoPastor" id="CadastrarAnotacaoPastor">Criar Anotação</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalUploadFotoPerfilPastor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog">
   		<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Foto de Perfil</h1>
    			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<?php
					if (isset($_GET['view'])) {
						$id_pa = addslashes($_GET['view']);
						$query = $pdo->query("SELECT * FROM pastores WHERE id_pas =  '$id_pa'");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						if (count($res) > 0) {
							$imagem = $res[0]['perfil_pas'];
						}
					} else {
						if (isset($_GET['view_pas'])) {
							$id_pa = addslashes($_GET['view_pas']);
							$query = $pdo->query("SELECT * FROM pastoras WHERE id_pas_ras =  '$id_pa'");
							$res = $query->fetchAll(PDO::FETCH_ASSOC);
							if (count($res) > 0) {
								$imagem = $res[0]['perfil_pas_ras'];
							}
						}
					}

				?>
      		</div>
      		<form action="<?=URL_BASE."dashboard-fieis/perfil-pastor/index/foto-perfil.php"?>" method="POST" enctype="multipart/form-data">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col text-center">
							<div class="alert alert-warning" role="alert">
								<span style="font-size: 20px;"><i class="fa-solid fa-exclamation" style="font-size: 36px !important"></i> ATENÇÃO</span>
								<p style="margin-bottom: 0px; font-size: 17px;">Tamanho recomendado: 500x500</p>
							</div>
	      					<img src="<?=IMAGEM."fotos-pastores/".$imagem?>" alt="Foto de Perfil do Pastor" width="200" id="target" name="target">
      						<input type="file" name="perfil_pas" class="form-control mt-2" onchange="carregarImg()">
	      				</div>
	      			</div>
	      		</div>
	      		<div class="modal-footer">
					<?php
						if (isset($_GET['view'])) {
							?>
								<input type="hidden" name="escolha" value="view">
							<?php
						} else if (isset($_GET['view_pas'])) {
							?>
								<input type="hidden" name="escolha" value="view_pas">
							<?php
						}
					?>
	      			<input type="hidden" name="id_pas" value="<?=$id_pa?>">
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
	        		<button type="submit" class="btn btn-primary">Salvar</button>
	      		</div>
      		</form>
		</div>
  	</div>
</div>

<div class="modal" id="ModalCadPastores" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php
					if (isset($_GET['view'])) {
						$query_pas = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$id'");
						$res_pas = $query_pas->fetchAll(PDO::FETCH_ASSOC);
						if (count($res_pas) > 0) {
							$nome = $res_pas[0]['nome_pas'];
							$bio = $res[0]['bio_pas'];
							$email = $res_pas[0]['email_pas'];
							$nascionalidade = $res_pas[0]['nasionalidade_pas'];
							$tempo_pas = $res_pas[0]['tempo_pas'];
							$telefone_pas = $res_pas[0]['telefone_pas'];
							$profissao = $res_pas[0]['profissao_pas'];
							$ministerio = $res_pas[0]['ministerio_pas'];
							$casado_pas = $res_pas[0]['casado_pas'];
							$qunt_tempo_casado = $res_pas[0]['qunt_casado_pas'];
							$qunt_menbros = $res_pas[0]['qunt_menbros_pas'];
						}
					} else {
						if (isset($_GET['view_pas'])) {
							$query_pas = $pdo->query("SELECT * FROM pastoras WHERE id_pas_ras = '$id'");
							$res_pas = $query_pas->fetchAll(PDO::FETCH_ASSOC);
							if (count($res_pas) > 0) {
								$nome = $res_pas[0]['nome_pas_ras'];
								$bio = $res_pas[0]['bio_pas_ras'];
								$email = $res_pas[0]['email_pas_ras'];
								$nascionalidade = $res_pas[0]['nascionalidade_pas_ras'];
								$tempo_pas = $res_pas[0]['tempo_pas_ras'];
								$telefone_pas = $res_pas[0]['telefone_pas_ras'];
								$profissao = $res_pas[0]['profissao_pas_ras'];
								$ministerio = $res_pas[0]['ministerio_pas_ras'];
								$casado_pas = $res_pas[0]['casado_pas_ras'];
								$qunt_tempo_casado = $res_pas[0]['qunt_casado_pas_ras'];
								$qunt_menbros = $res_pas[0]['qunt_menbros_pas_ras'];
							}
						}
					}
                ?>
            </div>
            <form action="" method="POST" id="FormCadastrarPastor">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome_pas">Nome</label>
                            <input type="text" name="nome_pas" id="nome_pas" class="form-control" placeholder="Nome do Pastor" value="<?=@$nome?>">
                        </div>
                        <div class="col-md-6">
                            <label for="email_pas">E-mail</label>
                            <input type="email" name="email_pas" id="email_pas" class="form-control" placeholder="Email do Pastor" value="<?=@$email?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="nascionalidade_pas">País de Origem</label>
                            <select class="form-select" name="nascionalidade_pas">
                                <?php
                                    $query_pas = $pdo->query("SELECT * FROM country order by nicename desc;");
                                    $res_pas = $query_pas->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res_pas) > 0) {
                                        for ($i = 0; $i < count($res_pas); $i++) {
                                            foreach ($res_as[$i] as $key => $value) {
                                            }
                                            $nicename = $res_pas[$i]['nicename'];
                                            $iso = $res_pas[$i]['iso'];
                                            if ($nascionalidade == $nicename) {
                                                ?>
                                                    <option value="<?=$nicename?>" selected><?=$iso?> - <?=$nicename?></option>
                                                <?php
                                            } else {
                                                ?>
                                                    <option value="<?=$nicename?>"><?=$iso?> - <?=$nicename?></option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tempo_pas">Tempo de Pastoreio</label>
                            <input type="number" name="tempo_pas" id="tempo_pas" class="form-control" placeholder="Tempo" value="<?=@$tempo_pas?>">
                        </div>
                        <div class="col-md-2">
                            <label for="telefone_pas">Telefone</label>
                            <input type="number" name="telefone_pas" id="telefone_pas" class="form-control" placeholder="Telefone do Pastor" value="<?=@$telefone_pas?>">
                        </div>
                        <div class="col-md-3">
                            <label for="profissao_pas">Profeissão</label>
                            <input type="text" name="profissao_pas" id="profissao_pas" class="form-control" placeholder="Profissão" value="<?=@$profissao?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="miniterio_pas">Seu Ministério</label>
                            <input type="text" name="miniterio_pas" id="miniterio_pas" class="form-control" placeholder="Seu Ministério" value="<?=@$ministerio?>">
                        </div>
                        <div class="col-md-3">
                            <label for="casado_pas">Estado Civil</label>
                            <input type="text" name="casado_pas" id="casado_pas" class="form-control" placeholder="Estado Civil" value="<?=@$casado_pas?>">
                        </div>
                        <div class="col-md-2">
                            <label for="qunt_casado_pas">Quanto Temp</label>
                            <input type="number" name="qunt_casado_pas" id="qunt_casado_pas" class="form-control" value="<?=@$qunt_tempo_casado?>">
                        </div>
                        <div class="col-md-3">
                            <label for="qunt_menbros_pas">Qtda de Membros</label>
                            <input type="number" name="qunt_menbros_pas" id="qunt_menbros_pas" class="form-control" value="<?=@$qunt_menbros?>">
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col mt-2">
                    		<textarea cols="5" rows="5" class="form-control" placeholder="SUA BIO (BIOGRAFIA)" name="bio_pas"><?=$bio?></textarea>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
					<?php
						if (isset($_GET['view'])) {
							?>
								<input type="hidden" name="escolha" value="view">
							<?php
						} else {
							if (isset($_GET['view_pas'])) {
								?>
									<input type="hidden" name="escolha" value="view_pas">
								<?php
							}
						}
					?>
                    <input type="hidden" name="id_pas" id="id_pas" value="<?=isset($_GET['view']) ? $_GET['view'] : $_GET['view_pas'] ?>">
                    <a href="index.php#pastoresTables" class="btn btn-secondary">Fechar</a>
                    <button type="button" class="btn btn-primary" name="btn_btnCadastrarPastor" id="btn_btnCadastrarPastor">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
function carregarImg() {

    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#CadastrarAnotacaoPastor').click(function() {
			var pag = "<?=$pag?>";
			<?php
			if (isset($_GET['view'])) {
				$view = "view";
			} else if (isset($_GET['view_pas'])) {
				$view = "view_pas";
			}
			?>
			var view = "<?=$view?>";
			$.ajax({
				url: pag + '/inserir_anotacao.php',
				method: "POST",
				data: $('#FormAnotacaoPastor').serialize(),
				dataType: 'text',
				beforeSend: function() {
					$('#Mensagem').html("Processando...");
				},
				success: function(msg) {
					if ($.isNumeric(msg)) {
						window.location = 'index.php?'+view+'='+msg;
					} else {
						alert(msg);
					}
				}
			})
		})
	})
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn_btnCadastrarPastor').click(function() {
            var pag = "<?=$pag?>";
			<?php
			if (isset($_GET['view'])) {
				$view = "view";
			} else if (isset($_GET['view_pas'])) {
				$view = "view_pas";
			}
			?>
			var view = "<?=$view?>";
            $.ajax({
                url: pag + '/inserir_pastor.php',
                method: 'post',
                data: $('#FormCadastrarPastor').serialize(),
                dataType: 'text',
                success: function(msg) {
                    if ($.isNumeric(msg)) {
                        window.location = 'index.php?'+view+'='+msg;
                    } else {
                        alert(msg);
                    }
                }
            })
        })
    })
</script>
