<?php

require_once("../../../conexao.php");
@session_start();

$id_insersor = $_SESSION['id'];
$id_pas = addslashes($_POST['id_pas']);
$bio_pas = addslashes($_POST['bio_pas']);
$nome = addslashes($_POST['nome_pas']);
$email = addslashes($_POST['email_pas']);
$nascionalidade = addslashes($_POST['nascionalidade_pas']);
$tempo = addslashes($_POST['tempo_pas']);
$telefone = addslashes($_POST['telefone_pas']);
$profissao = addslashes($_POST['profissao_pas']);
$ministerio = addslashes($_POST['miniterio_pas']);
$casado = addslashes($_POST['casado_pas']);
$qunt_casado = addslashes($_POST['qunt_casado_pas']);
$qunt_membros = addslashes($_POST['qunt_menbros_pas']);
$escolha = addslashes($_POST['escolha']);

if ($nome == "") {
    echo "Nome Obrigatório!";
    exit();
}

if ($nascionalidade == "") {
    echo "Nascionalidade Obrigatória";
    exit();
}


date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d');
$agora = date('H:i:s');
if ($escolha == 'view') {
    if ($id_pas == "") {
        $res = $pdo->prepare("INSERT INTO pastores SET id_insersor = :id_insersor, perfil_pas = :perfil_pas, nome_pas = :nome_pas, bio_pas = :bio_pas, email_pas = :email_pas, tempo_pas = :tempo_pas, telefone_pas = :telefone_pas, nasionalidade_pas = :nascionalidade_pas, profissao_pas = :profissao_pas, ministerio_pas = :ministerio_pas, casado_pas = :casado_pas, qunt_casado_pas = :qunt_casado_pas, qunt_menbros_pas = :qunt_membros_pas, data_cadastro_pas = :data_cadastro_pas, hora_cadastro_pas = :hora_cadastro_pas");
        $res->bindValue(':id_insersor', $id_insersor);
        $res->bindValue(':nome_pas', $nome);
        $res->bindValue(':perfil_pas', "sem-foto.jpg");
        $res->bindValue(':bio_pas', $bio_pas);
        $res->bindValue(':email_pas', $email);
        $res->bindValue(':tempo_pas', $tempo);
        $res->bindValue(':telefone_pas', $telefone);
        $res->bindValue(':nascionalidade_pas', $nascionalidade);
        $res->bindValue(':profissao_pas', $profissao);
        $res->bindValue(':ministerio_pas', $ministerio);
        $res->bindValue(':casado_pas', $casado);
        $res->bindValue(':qunt_casado_pas', $qunt_casado);
        $res->bindValue(':qunt_membros_pas', $qunt_membros);
        $res->bindValue(':data_cadastro_pas', $hoje);
        $res->bindValue(':hora_cadastro_pas', $agora);
    } else {
        $res = $pdo->prepare("UPDATE pastores SET nome_pas = :nome_pas, bio_pas = :bio_pas, email_pas = :email_pas, tempo_pas = :tempo_pas, telefone_pas = :telefone_pas, nasionalidade_pas = :nascionalidade_pas, profissao_pas = :profissao_pas, ministerio_pas = :ministerio_pas, casado_pas = :casado_pas, qunt_casado_pas = :qunt_casado_pas, qunt_menbros_pas = :qunt_membros_pas, data_cadastro_pas = :data_cadastro_pas, hora_cadastro_pas = :hora_cadastro_pas WHERE id_pas = :id_pas");
        $res->bindValue(':id_pas', $id_pas);
        $res->bindValue(':nome_pas', $nome);
        $res->bindValue(':bio_pas', $bio_pas);
        $res->bindValue(':email_pas', $email);
        $res->bindValue(':tempo_pas', $tempo);
        $res->bindValue(':telefone_pas', $telefone);
        $res->bindValue(':nascionalidade_pas', $nascionalidade);
        $res->bindValue(':profissao_pas', $profissao);
        $res->bindValue(':ministerio_pas', $ministerio);
        $res->bindValue(':casado_pas', $casado);
        $res->bindValue(':qunt_casado_pas', $qunt_casado);
        $res->bindValue(':qunt_membros_pas', $qunt_membros);
        $res->bindValue(':data_cadastro_pas', $hoje);
        $res->bindValue(':hora_cadastro_pas', $agora);
    }

    if ($res->execute()) {
        echo "$id_pas";
    } else {
        echo "Erro na Inserção!";
    }
} else {
    if ($escolha == 'view_pas') {
        if ($id_pas == "") {
            $res = $pdo->prepare("INSERT INTO pastores SET id_insersor = :id_insersor, perfil_pas = :perfil_pas, nome_pas = :nome_pas, bio_pas = :bio_pas, email_pas = :email_pas, tempo_pas = :tempo_pas, telefone_pas = :telefone_pas, nasionalidade_pas = :nascionalidade_pas, profissao_pas = :profissao_pas, ministerio_pas = :ministerio_pas, casado_pas = :casado_pas, qunt_casado_pas = :qunt_casado_pas, qunt_menbros_pas = :qunt_membros_pas, data_cadastro_pas = :data_cadastro_pas, hora_cadastro_pas = :hora_cadastro_pas");
            $res->bindValue(':id_insersor', $id_insersor);
            $res->bindValue(':nome_pas', $nome);
            $res->bindValue(':perfil_pas', "sem-foto.jpg");
            $res->bindValue(':bio_pas', $bio_pas);
            $res->bindValue(':email_pas', $email);
            $res->bindValue(':tempo_pas', $tempo);
            $res->bindValue(':telefone_pas', $telefone);
            $res->bindValue(':nascionalidade_pas', $nascionalidade);
            $res->bindValue(':profissao_pas', $profissao);
            $res->bindValue(':ministerio_pas', $ministerio);
            $res->bindValue(':casado_pas', $casado);
            $res->bindValue(':qunt_casado_pas', $qunt_casado);
            $res->bindValue(':qunt_membros_pas', $qunt_membros);
            $res->bindValue(':data_cadastro_pas', $hoje);
            $res->bindValue(':hora_cadastro_pas', $agora);
        } else {
            $res = $pdo->prepare("UPDATE pastoras SET nome_pas_ras = :nome_pas_ras, bio_pas_ras = :bio_pas_ras, email_pas_ras = :email_pas_ras, tempo_pas_ras = :tempo_pas_ras, telefone_pas_ras = :telefone_pas_ras, nascionalidade_pas_ras = :nascionalidade_pas_ras, profissao_pas_ras = :profissao_pas_ras, ministerio_pas_ras = :ministerio_pas_ras, casado_pas_ras = :casado_pas_ras, qunt_casado_pas_ras = :qunt_casado_pas_ras, qunt_menbros_pas_ras = :qunt_membros_pas_ras, data_cadastro_pas_ras = :data_cadastro_pas_ras, hora_cadastro_pas_ras = :hora_cadastro_pas_ras WHERE id_pas_ras = :id_pas_ras");
            $res->bindValue(':id_pas_ras', $id_pas);
            $res->bindValue(':nome_pas_ras', $nome);
            $res->bindValue(':bio_pas_ras', $bio_pas);
            $res->bindValue(':email_pas_ras', $email);
            $res->bindValue(':tempo_pas_ras', $tempo);
            $res->bindValue(':telefone_pas_ras', $telefone);
            $res->bindValue(':nascionalidade_pas_ras', $nascionalidade);
            $res->bindValue(':profissao_pas_ras', $profissao);
            $res->bindValue(':ministerio_pas_ras', $ministerio);
            $res->bindValue(':casado_pas_ras', $casado);
            $res->bindValue(':qunt_casado_pas_ras', $qunt_casado);
            $res->bindValue(':qunt_membros_pas_ras', $qunt_membros);
            $res->bindValue(':data_cadastro_pas_ras', $hoje);
            $res->bindValue(':hora_cadastro_pas_ras', $agora);
        }

        if ($res->execute()) {
            echo "$id_pas";
        } else {
            echo "Erro na Inserção!";
        }
    }
}

?>
