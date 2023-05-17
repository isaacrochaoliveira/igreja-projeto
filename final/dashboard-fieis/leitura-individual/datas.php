<script>
	let res = []
</script>
<?php

require_once('../../conexao.php');
$id_user = addslashes($_POST['id_usuario']);
$array = [];

$query = $pdo->query("SELECT * FROM leitura_individual WHERE autor_indLei = '$id_user'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
	for ($i = 0; $i < count($res); $i++) {
		foreach($res[$i] as $key => $value) {
		}
		$dataFull = explode('-', $res[$i]['data_job']);
		$month = intVal($dataFull[1] - 1);
		$year = intVal($dataFull[2]);
		$day = intVal($dataFull[0]);
		$title = $res[$i]['desc_indLei'];
		array_push($array, $year, $month, $day, $title);
		?>
			<script>
				var year = <?=$year?>;
				var month = <?=$month?>;
				var day = <?=$day?>;
				res.push(year);
				res.push(month);
				res.push(day);
				console.log(res);		
			</script>
		<?php
	}
}
exit();
print_r($array);