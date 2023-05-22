<?php

require_once('../../conexao.php');
session_start();

$id_user = $_SESSION['id'];
$grupo = addslashes($_POST['nome_grupo']);
$plano = addslashes($_POST['plano_de_leitura']);
$ativo = addslashes($_POST['ativoLeitura']);
$data_lancamento = addslashes($_POST['data_de_lancamento']);
$today = Date('Y-m-d');
$rightnow = Date('G:i:s');

if ($grupo == "") {
    echo "Nome Obrigatório!";
    exit();
}

if ($plano == "") {
    echo "Plano de Devocional Obrigatório";;
    exit();
}

if ($ativo == "N") {
    if ($data_lancamento == "") {
        echo "Insira a data de lançamento";
        exit();
    }
}

$query = $pdo->query("INSERT INTO leitura_compartilhada SET id_autorLeiCom = '$id_user', nome_LeiCom = '$grupo', plano_LeiCom = '$plano', ativo_LeiCom = '$ativo', part_indLei = '$data_lancamento', data_LeiCom = '$today', hora_LeiCom = '$rightnow'");
echo "ENVIADO";
?>
