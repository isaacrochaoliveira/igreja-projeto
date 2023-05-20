<?php

require_once('../conexao.php');
require_once('../config.php');
session_start();

$pag = 'leitura-individual';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/dist/index.global.min.js"></script>
<script src="../assets/lang/pt-br.global.js"></script>
<script src="../assets/dist/fullcalendar.js"></script>
<div class="d-flex flex-wrap mt-3 mx-2">
	<div id="calendar" class="w-65porc">

	</div>
	<div class="w-30porc mx-auto">
		<h1 style="font-size: 40px">Faça seu plano de Leitura</h1>
		<hr>
		<p>Adicione o sua Leitura Diária, e acompanhe no calendário</p>
		<form class="bg-light" action="" method="post" id="formBegin">
			<div class="row">
				<div class="col">
					<label for="data">Nos dê a data de Inicio</label>
					<input type="date" name="data" id="data" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="data">Nos dê a data do termino</label>
					<input type="date" name="End" id="End" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="text">Que Livro e capitulo vai ler</label>
					<input type="text" name="text" id="text" class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<label for="">Dê cor as suas anotações</label>
				<?php
					$query = $pdo->query("SELECT * FROM leitura_cores_favoritas WHERE id_userIndLei = '$_SESSEION[id]'");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					if (count($res) > 0) {
						for ($i = 0; $i < count($res); $i++) {
							foreach ($res[$i] as $key => $value) {
							}
							$hexa = $res[$i]['hexa'];
							?>
								<div class="col-md-1">
									<div style="font-size: 26px; background: <?=$hexa?>">
										<i onclick="upCor('<?=$hexa?>')" class="fa-solid fa-square pointer"></i>
									</div>
								</div>
							<?php
						}
					}
				?>
				<div class="col-md-1">
					<div class="text-danger" style="font-size: 26px">
						<i onclick="upCor('red')" class="fa-solid fa-square pointer"></i>
					</div>
				</div>
				<div class="col-md-1">
					<div class="text-success" style="font-size: 26px">
						<i onclick="upCor('green')" class="fa-solid fa-square pointer"></i>
					</div>
				</div>
				<div class="col-md-1">
					<div class="text-primary" style="font-size: 26px">
						<i onclick="upCor('blue')" class="fa-solid fa-square pointer"></i>
					</div>
				</div>
				<div class="col-md-1">
					<div class="text-warning" style="font-size: 26px">
						<i onclick="upCor('yellow')" class="fa-solid fa-square pointer"></i>
					</div>
				</div>
				<div class="col-md-1">
					<div class="text-info" style="font-size: 26px">
						<i onclick="upCor('navy-blue')" class="fa-solid fa-square pointer"></i>
					</div>
				</div>
				<div class="col-md-1">
					<div class="text-dark" style="font-size: 26px">
						<i onclick="upCor('black')" class="fa-solid fa-square pointer"></i>
					</div>
				</div>
				<div class="col-md-3">
					<input type="color" name="cor"  id="cor" class="form-control" onchange="upCor('choose')">
				</div>
			</div>
			<div class="row">
				<div class="d-none" id="divBtnSalvar">
					<button type="button" name="salvarCor" id="salvarCor" class="btn btn-light">Salvar cor</button>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<input type="hidden" name="chooise" id="chooise">
					<button type="button" name="salvarLeitura" id="salvarLeitura" class="btn btn-dark w-100">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="datasJob" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Detalhes</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<form action="" method="post" id="formCalendar">
				<div class="modal-body">
					<div class="d-flex justify-content-around">
						<div>
							<img targer="Foto de Perfil do Usuário" id="perfil" width="150" height="150"/>
						</div>
						<div>
							<p>Índice: <span id="indice"></span></p>
							<p>Título: <span id="title"></span></p>
							<p>Início: <span id="start"></span></p>
							<p>Fim: <span id="end"></span></p>
							<div id="bg-color-jobs">
								<br>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id_jobs" name="id_jobs"/>
					<button id="btnCarregarDetalhes"></button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar ao Calendário</button>
				</div>
			</form>
    	</div>
  	</div>
</div>

<script type="text/javascript">
	function upCor(option) {
		if (option === 'red') {
			document.getElementById('chooise').value = '#DC3545';
			document.getElementById('salvarLeitura').style.background = '#DC3545';
		}
		if (option === 'green') {
			document.getElementById('chooise').value = '#28A745';
			document.getElementById('salvarLeitura').style.background = '#28A745';
		}
		if (option === 'blue') {
			document.getElementById('chooise').value = '#007BFF';
			document.getElementById('salvarLeitura').style.background = '#007BFF';
		}
		if (option === 'yellow') {
			document.getElementById('chooise').value = '#FFC107';
			document.getElementById('salvarLeitura').style.background = '#FFC107';
		}
		if (option === 'navy-blue') {
			document.getElementById('chooise').value = '#17A2B8';
			document.getElementById('salvarLeitura').style.background = '#17A2B8';
		}
		if (option === 'black') {
			document.getElementById('chooise').value = '#343A40';
			document.getElementById('salvarLeitura').style.background = '#343A40';
		}
		if (option === 'choose') {
			document.getElementById('chooise').value = 'none';
			var color = document.getElementById('cor').value;
			$('#divBtnSalvar').removeClass();
			$('#divBtnSalvar').addClass('col-md-4');
			document.getElementById('salvarLeitura').style.background = color;
		}
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#salvarLeitura').click(function(event) {
			event.preventDefault();
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/salvar.php',
				method: 'post',
				data: $('#formBegin').serialize(),
				success: function(msg) {
					if ((msg == "Salvo com Sucesso!")) {
						window.location = 'index.php?pag=leitura-individual';
					} else {
						alert(msg);
					}
				}
			})
		})
	})
</script>

<script>
	$(document).ready(function() {
		$('#btnCarregarDetalhes').click(function(event) {
			event.preventDefault();
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/informacoes',
				method: 'post',
				data: $('#formCalendar').serialize(),
				success: function(msg) {
					let array = msg.split("!@#");
					$('#perfil').attr('src', '../assets/img/fotos/'+array[0]);
					$('#title').text(array[1]);
					$('#start').text(array[2]);
					$('#end').text(array[3]);
					$('#indice').text(array[5]);
					document.getElementById('bg-color-jobs').style.background = array[4];
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#salvarCor').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + ''
			})
		})
	})
</script>
