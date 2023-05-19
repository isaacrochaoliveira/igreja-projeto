<?php

require_once('../conexao.php');
require_once('../config.php');
session_start();

$pag = 'leitura-individual';

?>
<script src="../assets/dist/index.global.min.js"></script>
<script src="../assets/lang/pt-br.global.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      //initialDate: '2023-05-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
	  events: 'leitura-individual/datas.php',
      /*events: [
        {
          title: 'All Day Event',
          start: '2023-01-01'
        },
        {
          title: 'Long Event',
          start: '2023-01-07',
          end: '2023-01-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-01-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-01-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2023-01-11',
          end: '2023-01-13'
        },
        {
          title: 'Meeting',
          start: '2023-01-12T10:30:00',
          end: '2023-01-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2023-01-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2023-01-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2023-01-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2023-01-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2023-01-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2023-01-28'
        }
      ]*/
    });

    calendar.render();
  });
</script>
<div class="d-flex flex-wrap mt-3 mx-2">
	<div id="calendar" class="w-65porc">
	
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
			<div class="row">
				<div class="col">
					<label for="text">Que Livro e capitulo vai ler</label>
					<input type="text" name="text" id="text" class="form-control">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#salvarLeitura').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/salvar.php',
				method: 'post',
				data: $('form').serialize(),
				success: function(msg) {
					if (msg == "Salvo com Sucesso!") {
						window.location = 'index.php?pag=leitua-individual';
					} else {
						alert(msg);
					}
				}
			})
		})
	})
</script>
