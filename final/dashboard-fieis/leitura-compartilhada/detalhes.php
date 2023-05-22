<?php

require_once('../../conexao.php');

$id = addslashes($_POST['id']);

$query = $pdo->query("SELECT * FROM leitura_compartilhada as lc JOIN usuarios as u ON lc.id_autorLeiCom = u.id WHERE id_leiCom = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $grupo = $res[0]['nome_LeiCom'];
    $plano = $res[0]['plano_LeiCom'];
    $ativo = $res[0]['ativo_LeiCom'];
    $criado = $res[0]['data_LeiCom'];
    $membros = $res[0]['part_indLei'];
    $hora_criado = $res[0]['hora_LeiCom'];
    $lancamento = $res[0]['data_de_lancamento'];
    $criador = $res[0]['nome'];
    $nasc = $res[0]['nasc'];
    $perfil = $res[0]['perfil'];

    if ($ativo == "N") {
        $ativo = "Não Publicado!";
    } else {
        if ($ativo == "A") {
            $ativo = "Publicado";
        } else {
            if ($ativo == "S") {
                $ativo = "Suspenso";
            }
        }
    }
}

echo "Modal!$grupo!$plano!$ativo!$criado!$membros!$hora_criado!$lancamento!$criador!$nasc!$nasc!$perfil";

?>
