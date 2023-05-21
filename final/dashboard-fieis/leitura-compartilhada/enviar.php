<?php

require_once('../../conexao.php');

$grupo = addslashes($_POST['nome_grupo']);
$plano = addslashes($_POST['plano_de_leitura']);
$ativo = addslashes($_POST['ativoLeitura']);
$data_lancamento = addslashes($_POST['data_de_lancamento']);

?>