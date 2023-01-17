<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=TITLE?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body>
        <div class="caixa-login">
            <div class="caixa-login-brand">
                <h1>Projeto Final</h1>
                <img src="assets/img/logo-branco.png" alt="Logo ChurchNtlH">
            </div>
            <div class="caixa-login-form">
                <form action="autenticar.php" method="POST">
                    <label for="senha" style="margin-top: 30px">E-mail ou CPF</label>
                    <input type="text" name="email" id="email" placeholder="E-mail ou CPF" class="form-control">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Sua Senha" class="form-control">
                    <div>
                        <button type="submit" name="button" class="btn btn-primary w-100"><i class="fa-solid fa-left-long"></i> Iniciar Sessão</button>
                        <p><a href="cad.php" name="button" class="btn btn-warning w-100">Cadastre-se Gratuitamente</a></p>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
