<?php

require_once('../../conexao.php');
session_start();

$data = addslashes($_POST['data']);
$data_job_end = addslashes($_POST['End']);
$text = addslashes($_POST['text']);
//$colorful = addslashes($_POST['cor']);
$colorful = addslashes($_POST['chooise']);
$id_user = $_SESSION['id'];

$pdo->query("INSERT INTO leitura_individual SET autor_indLei = '$id_user', color = '$colorful', desc_indLei = '$text', data_job = '$data', data_job_end = '$data_job_end'");
echo "Salvo com Sucesso!";

?>
