<?php

require_once('../../conexao.php');
session_start();

$data = addslashes($_POST['data']);
$text = addslashes($_POST['text']);
$id_user = $_SESSION['id'];

$pdo->query("INSERT INTO leitura_individual SET autor_indLei = '$id_user', desc_indLei = '$text', data_job = '$data'");
echo "Salvo com Sucesso!";

?>
