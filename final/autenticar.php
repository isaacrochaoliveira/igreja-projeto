<?php

require_once('conexao.php');

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

if (!(empty($email) && empty($senha))) {
    $query = $pdo->query("SELECT * FROM usuarios WHERE (email = '$email' or cpf = '$email') AND senha = '$senha'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($res) > 0) {

        $query = $pdo->query("SELECT * FROM usuarios JOIN cargos WHERE usuarios.id_cargo = cargos.id_cargo AND (email = '$email' or cpf = '$email') AND senha = '$senha'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $res[0]['id'];
        $_SESSION['nome'] = $res[0]['nome'];
        $_SESSION['email'] = $res[0]['email'];
        $_SESSION['senha'] = $res[0]['senha'];
        $_SESSION['cpf'] = $res[0]['cpf'];
        $_SESSION['imagem'] = $res[0]['perfil'];
        $_SESSION['nasc'] = $res[0]['nasc'];
        $_SESSION['estado_civil'] = $res[0]['estado_civil'];
        $_SESSION['cargo'] = $res[0]['cargo'];


        echo "<script>location.href = 'dashboard-fieis/index.php'</script>";
    } else {
        echo "<script>window.alert('Email/CPF e/ou Senha Incorretos!')</script>";
        echo "<script>location.href = 'index.php'</script>";
    }
} else {
    echo "<script>window.alert('Preencha o formulário para iniciar sua sessão')</script>";
    echo "<script>location.href = 'index.php'</script>";
}

?>
