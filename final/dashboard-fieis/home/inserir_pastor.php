<?php

require_once("../../conexao.php");

$id_pas = addslashes($_POST['id_pas']);
$nome = addslashes($_POST['nome_pas']);
$email = addslashes($_POST['email_pas']);
$nascionalidade = addslashes($_POST['nascionalidade_pas']);
$tempo = addslashes($_POST['tempo_pas']);
$telefone = addslashes($_POST['telefone_pas']);
$profissao = addslashes($_POST['profissao_pas']);
$ministerio = addslashes($_POST['ministerio_pas']);
$casado = addslashes($_POST['casado_pas']);
$qunt_casado = addslashes($_POST['qunt_casado_pas']);
$qunt_membros = addslashes($_POST['qunt_menbros_pas']);

if ($nome == "") {
    echo "Nome Obrigatório!";
    exit();
}

if ($nascionalidade == "") {
    echo "Nascionalidade Obrigatória";
    exit();
}

if ($id_pas == "") {
    $res = $pdo->prepare("INSERT INTO pastores SET nome_pas = ")
}

?>