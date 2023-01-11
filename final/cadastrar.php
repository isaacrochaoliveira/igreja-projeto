<?php

require_once('conexao.php');

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$sexo = addslashes($_POST['sexo']);
$nasc = addslashes($_POST['nascimento']);
$trab = addslashes($_POST['trab']);
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$id_cargo = addslashes($_POST['cargo']);
$estado_civil = addslashes($_POST['estado_civil']);
$horario_inicio = addslashes($_POST['horario_inicio']);
$horario_fim = addslashes($_POST['horario_fim']);

$query = $pdo->query("SELECT * FROM usuarios WHERE cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "Esse CPF já está cadastrado no nosso sistema";
    exit();
}

$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "Esse EMAIL já está cadastrado no nosso sistema";
    exit();
}

$res = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, cpf = :cpf, sexo = :sexo, nasc = :nasc, trabalho = :trab, email = :email, senha = :senha, id_cargo = :cargo, estado_civil = :estado, horario_inicio = :horario_inicio, horario_fim = :horario_fim");
$res->bindValue(':nome', $nome);
$res->bindValue(':cpf', $cpf);
$res->bindValue(':sexo', $sexo);
$res->bindValue(':nasc', $nasc);
$res->bindValue(':trab', $trab);
$res->bindValue(':email', $email);
$res->bindValue(':senha', $senha);
$res->bindValue(':cargo', $id_cargo);
$res->bindValue(':estado', $estado_civil);
$res->bindValue(':horario_inicio', $horario_inicio);
$res->bindValue('horario_fim', $horario_fim);
if ($res->execute()) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $query = $pdo->query("SELECT * FROM usuarios WHERE cpf = '$cpf'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $res[0]['id'];
    $_SESSION['nome'] = $res[0]['nome'];
    $_SESSION['cpf'] = $res[0]['cpf'];
    $_SESSION['email'] = $res[0]['email'];
    $_SESSION['senha'] = $res[0]['senha'];
    $_SESSION['imagem'] = $res[0]['perfil'];
    echo "<script>location.href = 'copy/copy.php'</script>";
} else {
    echo "Erro no cadastramento do Pedido!";
}
?>
