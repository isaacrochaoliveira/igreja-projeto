<?php

require_once('../../conexao.php');

$data = addslashes($_POST['data']);
$data_array = explode('-', $data);
$dia = $data_array[0];

$pdo->query("ALTER TABLE leitura_individual ADD '$dia' date;");

echo "Salvo com Sucesso!";

?>
