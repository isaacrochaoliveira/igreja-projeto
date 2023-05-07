<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
@session_start();

$pag = 'jejuns-personalizados';
$pagina = 'jejuns_personalizados';

?>

<style>
	.disabled {
		pointer-events: none;
		cursor: none;
		background: lightgray;
		/*text-indent: -9999px;*/
	}
</style>

<div class="d-flex flex-wrap mx-3 py-3">
	<?php
	$query = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$_SESSION[id]'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (count($res) > 0) {
		for ($i = 0; $i < count($res); $i++) {
			foreach ($res[$i] as $key => $value) {
			}
			$id_jejum = $res[$i]['id_jejum'];
			$title = $res[$i]['jejum'];
			$desc = $res[$i]['descricao_jejum'];
			$capa = $res[$i]['imagem'];

			if ($capa == "") {
				$capa = "sem-foto.jpg";
			}
	?>
			<div class="card mx-2" style="width: 18rem;">
				<img src="<?= IMAGEM . "/images-jejuns/$capa" ?>" class="card-img-top" alt="Foto de Perfil do Jejum" width="250" height="250">
				<div class="card-body">
					<h5 class="card-title"><?= $title ?></h5>
					<p class="card-text"><?= $desc ?></p>
					<div class="d-flex mx-1">
						<button type="button" class="btn btn-primary" title="Upload de Imagem" onclick="modalCapa(<?= $id_jejum ?>)"><i class="fa-solid fa-cloud-arrow-up" style="color: #fff;"></i></button>
						<button type="button" class="btn btn-danger ml-2" title="Ver Informações adicionais" onclick="modalInformation(<?= $id_jejum ?>)"><i class="fa-solid fa-file-zipper"></i></button>
						<a href="index.php?pag=<?= $pagina ?>&id_colab=<?= $id_jejum ?>" class="btn btn-dark ml-2" title="Ver Colaboradores"><i class="fa-solid fa-people-group"></i></a>
						<a href="index.php?pag=<?= $pagina ?>&id_part=<?= $id_jejum ?>" class="btn btn-dark ml-2" title="Ver Participantes"><i class="fa-sharp fa-solid fa-people-arrows"></i></a>
					</div>
				</div>
			</div>
		<?php
		}
	} else {
		?>
		<div class="alert alert-danger w-100" role="alert">
			<div class="d-flex justify-content-center">
				<div style="font-size: 32px;">
					<i class="fa-solid fa-exclamation"></i>
				</div>
				<div class="ml-3 mt-3">
					<p>Você não tem jejuns cadastrados!</p>
					<a href="index.php?pag=jejum-personalisado" class="btn btn-light w-100">
						VOLTAR
					</a>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>

<!-- MODALS -->
<div class="modal fade" id="modalCapa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Sua capa do Jejum</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-edit-photo" method="POST" action="" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="text-center">
						<img src="<?= IMAGEM . '/images-jejuns/sem-foto.jpg' ?>" name="target" width="250" id="target" class="text-center" alt="Coloaqui sua foto de Perfil aqui">
					</div>
					<div class="text-center mt-3">
						<input type="file" name="capa" id="capa" onchange="carregarImg()">
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_jejum" id="id_jejum">
					<button type="button" name="btnfecharmodalphoto" id="btnfecharmodalphoto" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
					<button type="submit" name="btnfotocapa" id="btnfotocapa" class="btn btn-primary">Upload</button>
					<?php
					if (isset($_FILES['capa'])) {
						$perfil = $_FILES['capa'];
						$id_jejum = addslashes($_POST['id_jejum']);
						if (!$perfil['tmp_name'] == null) {
							if ($perfil['size'] > 2097152) {
								die("Tamanho Máxino do arquivo: 2MB");
							}

							if ($perfil['error']) {
								die("Falha no envio de arquivo!");
							}

							$path = "../assets/img/images-jejuns/";
							$arq = uniqid();

							$ext = strtolower(pathinfo($perfil['name'], PATHINFO_EXTENSION));
							if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
								die("Tente as extensões: jpg, png, svg, tiff. <br>Extensão atual: $ext");
							} else {
								$bool = move_uploaded_file($perfil['tmp_name'], $path . $arq . '.' . $ext);
								$name = $arq . '.' . $ext;
								$pdo->query("UPDATE jejuns SET imagem = '$name' WHERE id_jejum = '$id_jejum'");
								echo "<script>location.href='index.php?pag=jejuns_personalizados'</script>";
							}
						} else {
							"Erro!";
						}
					}
					?>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalColab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Sua capa do Jejum</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<?php
				$id = addslashes($_GET['id_colab']);
				$query = $pdo->query("SELECT * FROM colaborando_jejum as cl JOIN usuarios as u ON cl.id_colaborando = u.id WHERE id_colaborando_jejum = '$id'");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				?>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Foto</th>
							<th scope="col">Nome</th>
							<th scope="col">Email</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (count($res) > 0) {
							for ($i = 0; $i < count($res); $i++) {
								foreach ($res[$i] as $key => $value) {
								}
								$nome = $res[$i]['nome'];
								$email = $res[$i]['email'];
								$foto = $res[$i]['perfil'];
						?>
								<tr>
									<td><img src="<?= IMAGEM . "/fotos/$foto" ?>" alt="Foto de Perfil" width="70" height="70"></td>
									<td><?= $nome ?></td>
									<td><?= $email ?></td>
								</tr>
							<?php
							}
						} else {
							?>
							<div class="d-flex alert alert-primary" role="alert">
								<div style="font-size: 32px;">
									<i class="fa-solid fa-exclamation"></i>
								</div>
								<div class="ml-3 mt-3">
									Sem Colaboradores!
								</div>
							</div>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id_jejum" id="id_jejum">
				<button type="button" name="btnfecharmodalphoto" id="btnfecharmodalphoto" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
				<button type="submit" name="btnfotocapa" id="btnfotocapa" class="btn btn-primary">Upload</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalParticipacaoJejum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Participando do Jejum</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<?php
				$id = addslashes($_GET['id_part']);
				$query = $pdo->query("SELECT * FROM participando_do_jejum as cl JOIN usuarios as u ON cl.id_participante = u.id WHERE id_jejum_part = '$id'");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				?>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Foto</th>
							<th scope="col">Nome</th>
							<th scope="col">Email</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (count($res) > 0) {
							for ($i = 0; $i < count($res); $i++) {
								foreach ($res[$i] as $key => $value) {
								}
								$nome = $res[$i]['nome'];
								$email = $res[$i]['email'];
								$foto = $res[$i]['perfil'];
						?>
								<tr>
									<td><img src="<?= IMAGEM . "/fotos/$foto" ?>" alt="Foto de Perfil" width="70" height="70"></td>
									<td><?= $nome ?></td>
									<td><?= $email ?></td>
								</tr>
							<?php
							}
						} else {
							?>
							<div class="d-flex alert alert-primary" role="alert">
								<div style="font-size: 32px;">
									<i class="fa-solid fa-exclamation"></i>
								</div>
								<div class="ml-3 mt-3">
									Sem Colaboradores!
								</div>
							</div>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id_jejum" id="id_jejum">
				<button type="button" name="btnfecharmodalphoto" id="btnfecharmodalphoto" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalDetalhesHTML" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel"><span id="titulo_jejum_d"></span> - <span id="criador"></span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="" method="post" id="formdescricao">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-3" id="nomepas">
							<label for="pastor/a">Pastor(a)</label>
							<input type="text" name="pastor_a" id="pastor_a">
						</div>
						<div class="d-none" id="chopas">
							<label for="pastor">Pastor</label>
							<select class="form-select" name="pastor" id="pastor">
								<option value="">SELECIONE O PASTOR</option>
								<?php
								$query = $pdo->query("SELECT * FROM pastores;");
								$res = $query->fetchAll(PDO::FETCH_ASSOC);
								if (count($res) > 0) {
									for ($i = 0; $i < count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
										$id = $res[$i]['id_pas'];
										$nome = $res[$i]['nome_pas'];
								?>
										<option value="<?= $id ?>"><?= $nome ?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="d-none" id="choras">
							<label for="pastor">Pastora</label>
							<select class="form-select" name="pastora" id="pastora">
								<option value="">SELECIONE O PASTORA</option>
								<?php
								$query = $pdo->query("SELECT * FROM pastoras;");
								$res = $query->fetchAll(PDO::FETCH_ASSOC);
								if (count($res) > 0) {
									for ($i = 0; $i < count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
										$id = $res[$i]['id_pas_ras'];
										$nome = $res[$i]['nome_pas_ras'];
								?>
										<option value="<?= $id ?>"><?= $nome ?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-3">
							<label for="desc">Descrição</label>
							<input type="text" name="desc" id="desc">
						</div>
						<div class="col-md-3">
							<label for="vers_base">Versículo Base</label>
							<input type="text" name="vers_base" id="vers_base">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							<label for="colab">Colaboradore(s)</label>
							<input type="number" name="colab" id="colab" />
						</div>
						<div class="col-md-3">
							<label for="parti">Comprometidas</label>
							<input type="number" name="parti" id="parti" />
						</div>
						<div class="col-md-3">
							<label for="data">Data</label>
							<input type="date" name="data" id="data">
						</div>
						<div class="col-md-3">
							<label for="hora">Hora</label>
							<input type="time" name="hour" id="hour" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id_jejum_d" name="id_jejum_d" class="form-control">
					<a href="#" class="mr-2" style="text-decoration: underline; color: blue" onclick="regras(<?= $id_jejum ?>)">Editar Regras</a>
					<button type="button" name="btnEditar" id="btnEditar" class="btn btn-primary">Editar Informações</button>
					<button type="button" name="btnSalvar" id="btnSalvar" class="d-none">Salvar Informações</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" id="modalRegras" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Regras do Jejum - <span id="titulo_jejum_regras"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="" emthod="post" id="form-edit">
				<div class="modal-body">
					<div id="semRegras" class="d-none">
						<div class="d-flex alert alert-danger" role="alert">
							<div style="font-size: 32px;">
								<i class="fa-solid fa-exclamation"></i>
							</div>
							<div class="ml-3 mt-3">
								Nenhuma regra cadastrada!
							</div>
						</div>
					</div>
					<form action="" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_1" id="_1" class="form-control disabled" placeholder="1º Regra">
									<label for="_1">1º Regras</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_2" id="_2" class="form-control disabled" placeholder="2º Regra">
									<label for="_2">2º Regra</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_3" id="_3" class="form-control disabled" placeholder="3º Regra">
									<label for="_3">3º Regra</label>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_4" id="_4" placeholder="4º Regra" class="form-control disabled">
									<label for="_4">4º Regra</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_5" id="_5" placeholder="5º Regra" class="form-control disabled">
									<label for="_5">5º Regras</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_6" id="_6" placeholder="6º Regra" class="form-control disabled">
									<label for="_6">6º Regra</label>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_7" id="_7" placeholder="7º Regra" class="form-control disabled">
									<label for="_7">7º Regra</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_8" id="_8" placeholder="8º Regra" class="form-control disabled">
									<label for="_8">8º Regra</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_9" id="_9" placeholder="9º Regra" class="form-control disabled">
									<label for="_9">9º Regra</label>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-4">
								<div class="form-floating">
									<input type="text" name="_10" id="_10" placeholder="10º Regra" class="form-control disabled">
									<label for="_10">10º Regra</label>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id_jejumRegras">
					<div id="divregrasmodalfootererrado" class="d-none">
						<button name="cadRegrasJejunsId" id="cadRegrasJejunsId" class="btn btn-light">Cadastrar Regras</button>
					</div>
					<div id="divregrasmodalfootercerto">
						<button type="button" name="btnFecharModalRegras" id="btnFecharModalRegras" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
						<div class="d-block mt-1" id="div-btnbtnedit">
							<button type="button" class="btn btn-primary" name="btn-btnEditRegras" id="btn-btnEditRegras">Editar Regras</button>
						</div>
						<div class="d-none" id="div-btnbtnSaveAs">
							<button type="button" class="btn btn-primary" name="btn-btnSaveRegras" id="btn-btnSaveRegras">Salvar Regras</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" id="modalCadastrarRegras" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Regras do Jejum - <span id="titulo_jejum_regras"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="formRegrasCad" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-floating" id="div-formfloating1">
								<textarea name="_1" id="_1" cols="40" rows="10" class="form-control" placeholder="1º Regra"></textarea>
								<label for="_1">1º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating2">
								<textarea name="_2" id="_2" cols="40" rows="10" class="form-control" placeholder="2º Regra"></textarea>
								<label for="_2">2º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating3">
								<textarea name="_3" id="_3" cols="40" rows="10" class="form-control" placeholder="3º Regra"></textarea>
								<label for="_3">3º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating4">
								<textarea name="_4" id="_4" cols="40" rows="10" class="form-control" placeholder="4º Regra"></textarea>
								<label for="_4">4º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating5">
								<textarea name="_5" id="_5" cols="40" rows="10" class="form-control" placeholder="5º Regra"></textarea>
								<label for="_5">5º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating6">
								<textarea name="_6" id="_6" cols="40" rows="10" class="form-control" placeholder="6º Regra"></textarea>
								<label for="_6">6º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating7">
								<textarea name="_7" id="_7" cols="40" rows="10" class="form-control" placeholder="7º Regra"></textarea>
								<label for="_7">7º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating8">
								<textarea name="_8" id="_8" cols="40" rows="10" class="form-control" placeholder="8º Regra"></textarea>
								<label for="_8">8º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating9">
								<textarea name="_9" id="_9" cols="40" rows="10" class="form-control" placeholder="9º Regra"></textarea>
								<label for="_9">9º Regra</label>
							</div>
							<div class="d-none" id="div-formfloating10">
								<textarea name="_10" id="_10" cols="40" rows="10" class="form-control" placeholder="10º Regra"></textarea>
								<label for="_10">10º Regra</label>
							</div>
						</div>
					</div>
				</div>
				<div class="ml-3" id="div-btnsuccess1">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 2/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess2">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 3/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess3">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 4/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess4">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 5/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess5">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 6/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess6">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 7/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess7">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 8/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess8">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 9/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess9">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-success" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar 10/10</button>
				</div>
				<div class="d-none" id="div-btnsuccess10">
					<button type="button" onclick="cadRegrasFunction()" class="btn btn-secondary" name="btn-btnsuccess1r" id="btn-btnsuccess1r">Cadastrar E Voltar</button>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_jejumCadRegras" id="id_jejumCadRegras">
					<div>
						<button type="button" name="btnFecharModalCadRegras" id="btnFecharModalCadRegras" class="d-none" data-bs-dismiss="modal">Voltar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#btn-btnEditRegras').click(function() {
			$('#_1').removeClass();
			$('#_2').removeClass();
			$('#_3').removeClass();
			$('#_4').removeClass();
			$('#_5').removeClass();
			$('#_6').removeClass();
			$('#_7').removeClass();
			$('#_8').removeClass();
			$('#_9').removeClass();
			$('#_10').removeClass();
			$('#div-btnbtnedit').removeClass();
			$('#div-btnbtnSaveAs').removeClass();

			$('#_1').addClass('form-control');
			$('#_2').addClass('form-control');
			$('#_3').addClass('form-control');
			$('#_4').addClass('form-control');
			$('#_5').addClass('form-control');
			$('#_6').addClass('form-control');
			$('#_7').addClass('form-control');
			$('#_8').addClass('form-control');
			$('#_9').addClass('form-control');
			$('#_10').addClass('form-control');
			$('#div-btnbtnedit').addClass('d-none');
			$('#div-btnbtnSaveAs').addClass('d-block mt-1');
		}) 
	})
</script>
<script>
	$(document).ready(function() {
		$('#btn-btnSaveRegras').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/cadastrar_regras.php',
				method: 'post',
				data: $('#form-edit').serialize(),
				dataType: 'text',
				success: function(res) {
					let array = res.split('!@#');
					$('#_1').val(array[0]);
					$('#_2').val(array[1]);
					$('#_3').val(array[2]);
					$('#_4').val(array[3]);
					$('#_5').val(array[4]);
					$('#_6').val(array[5]);
					$('#_7').val(array[6]);
					$('#_8').val(array[7]);
					$('#_9').val(array[8]);
					$('#_10').val(array[9]);
				}
			})
		}) 
	})
</script>
<script>
	function regras(id_jejum) {
		$(document).ready(function() {
			var pag = "<?= $pag ?>";
			$.ajax({
				url: pag + '/regras.php',
				method: 'post',
				data: {
					id_jejum
				},
				dataType: 'text',
				success: function(result) {
					let array = result.split('!@#');
					if (array == "Algo deu errado") {
						$('#semRegras').removeClass();
						$('#divregrasmodalfootererrado').removeClass();
						$('#divregrasmodalfootercerto').addClass('d-none');
						$('#divregrasmodalfootererrado').addClass('d-block');
						$('#semRegras').addClass('d-block');
					} else {
						$('#titulo_jejum_regras').html(array[0]);
						$('#_1').val(array[1]);
						$('#_2').val(array[2]);
						$('#_3').val(array[3]);
						$('#_4').val(array[4]);
						$('#_5').val(array[5]);
						$('#_6').val(array[6]);
						$('#_7').val(array[7]);
						$('#_8').val(array[8]);
						$('#_9').val(array[9]);
						$('#_10').val(array[10]);
					}
					$('#id_jejumRegras').val(id_jejum);
					$('#modalRegras').modal('show');
				}
			})
		})
	}
</script>
<script>
	function cadRegrasFunction() {
		$(document).ready(function() {
			var pag = "<?= $pag ?>";
			$.ajax({
				url: pag + '/cadastrar_regras.php',
				method: 'post',
				data: $('#formRegrasCad').serialize(),
				dataType: 'text',
				success: function(retorno) {
					if ($.isNumeric(retorno)) {
						if (retorno < 11) {
							let miss = retorno - 1;
							// Textarea - Regras 1 - Disabilitado
							$('#div-formfloating' + miss).removeClass();
							$('#div-formfloating' + miss).addClass('form-floating disabled');
							// Botão cadastrar retorno-1/10 - Disabilitado 
							$('#div-btnsuccess' + miss).removeClass();
							$('#div-btnsuccess' + miss).addClass('d-none');
							// Textarea - Regras 2 _ Habilitado
							$('#div-formfloating' + retorno).removeClass();
							$('#div-formfloating' + retorno).addClass('form-floating mt-2');
							// Botão Cdastrar retorno/10 - Habilitado
							$('#div-btnsuccess' + retorno).removeClass();
							$('#div-btnsuccess' + retorno).addClass('d-block ml-3');
						} else {
							id_jejum = $('#id_jejumCadRegras').val();
							$('#btnFecharModalCadRegras').click();
							regras(id_jejum);
						}
					} else {
						alert(retorno);
					}
				}
			})
		})
	}
</script>
<script>
	$(document).ready(function() {
		$('#cadRegrasJejunsId').click(function() {
			let id_jejum = document.getElementById('id_jejumRegras').value;
			$('#id_jejumCadRegras').val(id_jejum);
			$('#btnFecharModalRegras').click();
			$('#modalCadastrarRegras').modal('show');
		})
	})
</script>
<script type="text/javascript">
	function modalCapa(id_jejum) {
		$(document).ready(function() {
			document.getElementById('id_jejum').value = id_jejum;
			$('#modalCapa').modal('show');
		})
	}
</script>

<script type="text/javascript">
	function carregarImg() {

		var target = document.getElementById('target');
		var file = document.querySelector("input[type=file]").files[0];
		var reader = new FileReader();

		reader.onloadend = function() {
			target.src = reader.result;
		};

		if (file) {
			reader.readAsDataURL(file);

		} else {
			target.src = "";
		}
	}
</script>

<script>
	function modalInformation(id_jejum) {
		$(document).ready(function() {
			var pag = "<?= $pag ?>";
			$.ajax({
				url: pag + '/detalhes.php',
				method: 'post',
				data: {
					id_jejum
				},
				success: function(result) {
					let array = result.split('@!#');
					$('#criador').html(array[1]);
					$('#pastor_a').val(array[2]);
					$('#titulo_jejum_d').html(array[3]);
					$('#desc').val(array[[4]]);
					$('#vers_base').val(array[5]);
					$('#colab').val(array[6]);
					$('#parti').val(array[7]);
					$('#data').val(array[8]);
					$('#hour').val(array[9]);

					$('#pastor_a').addClass('form-control disabled');
					$('#desc').addClass('form-control disabled')
					$('#vers_base').addClass('form-control disabled');
					$('#colab').addClass('form-control disabled');
					$('#parti').addClass('form-control disabled');
					$('#data').addClass('form-control disabled');
					$('#hour').addClass('form-control disabled')

					document.getElementById('id_jejum_d').value = id_jejum;

					$('#modalDetalhesHTML').modal('show');
				}
			})
		})
	}
</script>

<script>
	$(document).ready(function() {
		$('#btnEditar').click(function() {
			$('#btnEditar').removeClass();
			$('#btnEditar').addClass('d-none');
			$('#btnSalvar').removeClass();
			$('#btnSalvar').addClass('btn btn-success d-block')
			$('#pastor_a').removeClass();
			$('#desc').removeClass();
			$('#vers_base').removeClass();

			$('#nomepas').addClass('d-none');

			$('#chopas').removeClass();
			$('#chopas').addClass('col-md-3');
			$('#choras').removeClass();
			$('#choras').addClass('col-md-3');

			$('#desc').addClass('form-control')
			$('#vers_base').addClass('form-control');
		})
	})
</script>
<script>
	$(document).ready(function() {
		$('#btnSalvar').click(function() {
			var pag = "<?= $pag ?>";
			$.ajax({
				url: pag + '/edit.php',
				method: 'post',
				data: $('#formdescricao').serialize(),
				dataType: 'text',
				success: function(result) {
					let array = result.split('$@#');
					if (array[0] == "Editado com Sucesso!") {
						// Removendo a Classe dos componentes que quero retornar a tela
						$('#pastor_a').removeClass();
						$('#desc').removeClass();
						$('#vers_base').removeClass();
						$('#chopas').removeClass();
						$('#choras').removeClass();

						// Removendo elementos da tela
						$('#chopas').addClass('d-none');
						$('#choras').addClass('d-none');

						// Mudando o valor dos inputs a serem mostrados
						$('#pastor_a').val(array[1]);
						$('#desc').val(array[2]);
						$('#vers_base').val(array[3]);

						// Colocando Elementos na tela 
						$('#nomepas').addClass('d-block');
						$('#pastor_a').addClass('form-control disabled');
						$('#desc').addClass('form-control disabled')
						$('#vers_base').addClass('form-control disabled');
					} else {
						alert(array);
					}
				}
			})
		})
	})
</script>