<?php

require_once('../../conexao.php');
@session_start();


$nome = addslashes($_POST['nome']);
$sexo = addslashes($_POST['sexo']);
$trab = addslashes($_POST['work']);
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$id_cargo = addslashes($_POST['cargo']);
$estado_civil = addslashes($_POST['estado_civil']);
$horario_inicio = addslashes($_POST['horario_inicio']);
$horario_fim = addslashes($_POST['horario_fim']);

$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if (!$res[0]['id'] == $_SESSION['id']) {
        echo "Esse EMAIL já está cadastrado no nosso sistema";
        exit();
    }
}

$res = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, sexo = :sexo, nasc = :nasc, trabalho = :trab, email = :email, senha = :senha, id_cargo = :cargo, estado_civil = :estado, horario_inicio = :horario_inicio, horario_fim = :horario_fim WHERE id = '$_SESSION[id]'");
$res->bindValue(':nome', $nome);
$res->bindValue(':cpf', $_SESSION['cpf']);
$res->bindValue(':sexo', $sexo);
$res->bindValue(':nasc', $_SESSION['nasc']);
$res->bindValue(':trab', $trab);
$res->bindValue(':email', $email);
$res->bindValue(':senha', $senha);
$res->bindValue(':cargo', $id_cargo);
$res->bindValue(':estado', $estado_civil);
$res->bindValue(':horario_inicio', $horario_inicio);
$res->bindValue(':horario_fim', $horario_fim);
if ($res->execute()) {
    echo "Perfil Atualizado com Sucesso!";
} else {
    echo "Erro ao atualizar seu Perfil";
}


?>
