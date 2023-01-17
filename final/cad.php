<?php
require_once('config.php');
require_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastre-se</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body class="f-family-sourceserif">
        <div class="caixa-login text-left width-90">
            <img src="<?=IMAGEM."logo-branco.png"?>" alt="ChurchNtlH" class="mb-3">
            <form action="cadastrar.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="">
                            <label for="sexo">Sexo</label>
                            <select class="form-select" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="1">Prefiro Outro</option>
                            </select>
                        </div>
                        <div class="d-none">
                            <label for="prefiro">Informe seu sexo</label>
                            <input type="text" name="prefiro" id="prefiro" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="nascimento">Nascimento</label>
                        <input type="date" name="nascimento" id="nascimento" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label for="trab">Trabalho</label>
                        <select class="form-select" name="trab">
                            <option value="S">Atualmente estou trabalhando</option>
                            <option value="N">Atualmente nçao estou trabalhando</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu E-mail" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Informe sua senha" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label for="cargo">Cargo/Função</label>
                        <select class="form-select" name="cargo">
                            <?php
                                $query = $pdo->query("SELECT * FROM cargos");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                if (count($res) > 0) {
                                    for ($i = 0; $i < count($res); $i++) {
                                        foreach ($res[$i] as $key => $value) {
                                        }
                                        $cargos = $res[$i]['cargo'];
                                        $id = $res[$i]['id_cargo']?>
                                        <option value="<?=$id?>"><?=$cargos?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="estado_civil">Estado Civil</label>
                            <select class="form-select" name="estado_civil">
                                <option value="Casado">Casado(a)</option>
                                <option value="Solteiro">Solteiro(a)</option>
                                <option value="Divorciado">Divorciado(a)</option>
                                <option value="Viuvo">Viuvo(a)</option>
                                <option value="Separado">Separado(a)</option>
                                <option value="Namorando">Namorando</option>
                                <option value="Noivo">Noivo(a)</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-4">
                            <input type="time" name="horario_inicio" id="horario_inicio" class="form-control">
                        </div>
                        <div class="col-md-3 mt-4">
                            <input type="time" name="horario_fim" id="horario_fim" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="btn_cad" class="btn btn-success"><i class="fa-solid fa-tree"></i> Cadastrar-se</button><br>
                        <a href="javascript:history.go(-1)" class="text-light">Já tenho uma conta</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
