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
    $res = $pdo->prepare("INSERT INTO pastores SET nome_pas = :nome_pas, email_pas = :email_pas, tempo_pas = :tempo_pas, telefone_pas = :telefone_pas, nascionalidade_pas = :nascionalidade_pas, profissao_pas = :profissao_pas, ministerio_pas = :ministerio_pas, casado_pas = :casado_pas, qunt_casado_pas = :qunt_casado_pas, qunt_membros_pas = :qunt_membros_pas, data_cadastro_pas = :data_cadastro_pas, hora_cadastro_pas");
    $res->bindValue(':nome_pas', $nome);
    $res->bindValue(':email_pas', $email);
    $res->bindValue(':tempo_pas', $tempo);
    $res->bindValue(':telefone_pas', $telefone);
    $res->bindValue(':nascionalidade_pas', $nascionalidade);
    $res->bindValue(':profissao_pas', $profissao);
    $res->bindValue(':ministerio_pas', $ministerio);
    $res->bindValue(':casado_pas', $casado);
    $res->bindValue(':qunt_casado_pas', $qunt_casado);
    $res->bindValue(':qunt_membros', $qunt_membros);
} else {
    $res = $pdo->prepare("UPDATE pastores SET nome_pas = :nome_pas, email_pas = :email_pas, tempo_pas = :tempo_pas, telefone_pas = :telefone_pas, nascionalidade_pas = :nascionalidade_pas, profissao_pas = :profissao_pas, ministerio_pas = :ministerio_pas, casado_pas = :casado_pas, qunt_casado_pas = :qunt_casado_pas, qunt_membros_pas = :qunt_membros_pas, data_cadastro_pas = :data_cadastro_pas, hora_cadastro_pas WHERE id_pas = :id_pas");
    $res->bindValue(':id_pas', $id_pas);
    $res->bindValue(':nome_pas', $nome);
    $res->bindValue(':email_pas', $email);
    $res->bindValue(':tempo_pas', $tempo);
    $res->bindValue(':telefone_pas', $telefone);
    $res->bindValue(':nascionalidade_pas', $nascionalidade);
    $res->bindValue(':profissao_pas', $profissao);
    $res->bindValue(':ministerio_pas', $ministerio);
    $res->bindValue(':casado_pas', $casado);
    $res->bindValue(':qunt_casado_pas', $qunt_casado);
    $res->bindValue(':qunt_membros', $qunt_membros);
}

if ($res->execute()) {
    echo "Pastor Cadastro com Sucesso!";
} else {
    echo "Erro na Inserção!";
}

?>