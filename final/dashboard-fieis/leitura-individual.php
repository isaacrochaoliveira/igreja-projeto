<?php

require_once('../config.php');

$pag = 'leitura-individual';

?>
<link rel="stylesheet" href="../assets/styles/calendar.css">
<link rel="stylesheet" href="../assets/styles/demo.css">
<script type="text/javascript" src="<?= JS ?>/calendar.js"></script>
<div class="d-flex flex-wrap mt-3 mx-2">
	<div id="caleandar" class="w-65porc">

	</div>
	<div class="w-25">
		<h1 style="font-size: 40px">Faça seu plano de Leitura</h1>
		<hr>
		<p>Adicione o sua Leitura Diária, e acompanhe no calendário</p>
		<form class="bg-light" action="" method="post">
			<div class="row">
				<div class="col">
					<label for="data">Nos dê a data da leitura</label>
					<input type="date" name="data" value="data" class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<label for="">Dê cor as suas anotações</label>
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
			<div class="row mt-3">
				<div class="col">
					<button type="button" name="salvarLeitura" id="salvarLeitura" class="btn btn-dark w-100">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var events = [{
			'Date': new Date(2023, 4, 5),
			'Title': 'Doctor appointment at 3:25pm.'
		},
		{
			'Date': new Date(2016, 6, 18),
			'Title': 'New Garfield movie comes out!',
			'Link': 'https://garfield.com'
		},
		{
			'Date': new Date(2016, 6, 27),
			'Title': '25 year anniversary',
			'Link': 'https://www.google.com.au/#q=anniversary+gifts'
		},
	];
	var settings = {
		Color: '#000', //(string - color) font color of whole calendar.
		LinkColor: '#333', //(string - color) font color of event titles.
		NavShow: true, //(bool) show navigation arrows.
		NavVertical: false, //(bool) show previous and coming months.
		NavLocation: '#caleandar', //(string - element) where to display navigation, if not in default position.
		DateTimeShow: true, //(bool) show current date.
		DateTimeFormat: 'mmm, yyyy', //(string - dateformat) format previously mentioned date is shown in.
		DatetimeLocation: '', //(string - element) where to display previously mentioned date, if not in default position.
	};
	var element = document.getElementById('caleandar');
	caleandar(element, events, settings);
</script>

<script type="text/javascript">
	function upCor(option) {
		if (option === 'red') {
			document.getElementById('salvarLeitura').style.background = '#DC3545';
		}
		if (option === 'green') {
			document.getElementById('salvarLeitura').style.background = '#28A745';
		}
		if (option === 'blue') {
			document.getElementById('salvarLeitura').style.background = '#007BFF';
		}
		if (option === 'yellow') {
			document.getElementById('salvarLeitura').style.background = '#FFC107';
		}
		if (option === 'navy-blue') {
			document.getElementById('salvarLeitura').style.background = '#17A2B8';
		}
		if (option === 'black') {
			document.getElementById('salvarLeitura').style.background = '#343A40';
		}
		if (option === 'choose') {
			var color = document.getElementById('cor').value;
			document.getElementById('salvarLeitura').style.background = color;
		}
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#salvarLeitura').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/salvar.php',
				method: 'post',
				data: $('form').serialize(),
				success: function(msg) {
					if (msg == "Salvo com Sucesso") {
						window.location = 'index.php?pag=leitua-individual';
					} else {
						alert(msg);
					}
				}
			})
		})
	})
</script>
