k<?php

require_once('../config.php');
require_once('../conexao.php');
require_once('../protect.php');
@session_start();

$pag = "account";

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= TITLE?></title>
    </head>
    <body class="f-family-ComfortaaRegular">
        <section class="mx-3 mt-6">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>4</h3>
                            <p>Minhas Orações</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-praying"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Criar Nova <i class="fa-sharp fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>132</h3>
                            <p>Orações Totais</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-cross"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Visualizar <i class="fa-sharp fa-solid fa-right-long"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>54</h3>
                            <p>Orações - Em Próposito</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Visualizar <i class="fa-sharp fa-solid fa-right-long"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>3</h3>
                            <p>Grupos - Participando</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Visualizar <i class="fa-sharp fa-solid fa-right-long"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>15</h3>
                            <p>Grupos - Totais</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Visualizar <i class="fa-sharp fa-solid fa-right-long"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>1</h3>
                            <p>Grupos - Exclui</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Visualizar <i class="fa-sharp fa-solid fa-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-4">
                <div>
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/NI0FCLkCwQg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="mx-2">
                    <h2>Tempo de Oração</h2>
                    <p>Vós, portanto, orai assim: Pai nosso que estás nos céus, santificado seja o teu nome; venha o teu Reino; seja feita a tua vontade, como no céu, assim também na terra.<br><a href="https://www.bibliaon.com/versiculo/mateus_6_9-13/" target="_blank" rel="autor">Mateus 6:7-15</a></p>
                    <hr>
                    <p style="width: 60%; line-height: 32px;">Tirar um tempo para conversar com <strong><a href="https://www.bibliaonline.com.br/nvi/mt/12" target="_blank" rel="author">NOSSO IRMÃO (MT 12:46-50)</a></strong> é necessário para cada vez mais ter intimidade com ele.</p>
                </div>
            </div>
            <div class="border-left-right mt-5 mb-5">
                <?php
                    $query = $pdo->query("SELECT * FROM citacoes");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) { ?>
                        <div class="row">
                            <?php
                            for ($i = 0; $i < count($res); $i++) {
                                foreach ($res[$i] as $key => $value) {
                                }
                                $author = $res[$i]['author'];
                                $citacao = $res[$i]['citacao'];
                                ?>
                                <div class="card mx-2" style="width: 18rem; margin: 10px 0px">
                                    <div class="card-body">
                                        <h5 class="card-title title-card"><?=$author?></h5>
                                        <p class="card-text text-card"><?=$citacao?></p>
                                        <a href="#" style="font-size: 13px">Guarda anotação em seu perfil</a>
                                  </div>
                                </div>
                                <?php
                            } ?>
                        </div><?php
                    }
                ?>
            </div>
            <div class="mx-3 mt-5">
                <h1 class="font-s-4">Edite seu Perfil</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <img src="<?=UPLOADS.$_SESSION['imagem']?>" alt="Foto de Perfil do Usuário" width="200" height="200" name="target"  id="target">
                        <p><input type="file" name="perfil" id="perfil" onchange="carregarImg()"></p>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" value="<?=$_SESSION['nome']?>" class="form-control">
                        </div>
                        <div class="col-md-3  mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" value="<?=$_SESSION['cpf']?>" class="form-control" disabled>
                        </div>
                        <div class="col-md-3  mb-3">
                            <label for="idade">Idade</label>
                            <input type="text" name="idade" id="idade" class="form-control" disabled value="<?=Date("Y") - intVal($_SESSION['nasc'])?>">
                        </div>
                        <div class="col-md-3  mb-3">
                            <label for="idade">E-mail</label>
                            <input type="email" name="email" "email" class="form-control" value="<?=$_SESSION['email']?>">
                        </div>
                        <div class="col-md-3  mb-3">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" value="<?=$_SESSION['senha']?>" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cargo">Sua Função</label>
                            <select class="form-select" name="cargo">

                                <?php
                                $query = $pdo->query("SELECT * FROM cargos");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                if (count($res) > 0) {
                                    ?>
                                    <option value="<?=$_SESSION['id_cargo']?>" selected><?=$_SESSION['cargo']?></option>
                                    <?php
                                    for ($i = 0; $i < count($res); $i++) {
                                        foreach ($res[$i] as $key => $v) {
                                        }
                                        $cargo = $res[$i]['cargo'];
                                        $id_cargo = $res[$i]['id_cargo'];
                                        if ($_SESSION['cargo'] != $cargo) {
                                            ?>
                                            <option value="<?=$id_cargo?>"><?=$cargo?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="sexo">Sexo</label>
                            <select class="form-select" name="sexo">
                                <?php
                                if ($_SESSION['sexo'] == 'M') {
                                    ?>
                                    <option value="M" selected>Masculino</option>
                                    <option value="F">Femino</option>
                                    <option value="Prefiro Não Responder">Prefiro Não Responder</option>
                                    <?php
                                } else if ($_SESSION['sexo'] == 'F') {
                                    ?>
                                    <option value="M">Masculino</option>
                                    <option value="F" selected>Femino</option>
                                    <option value="Prefiro Não Responder">Prefiro Não Responder</option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femino</option>
                                    <option value="Prefiro Não Responder" selected>Prefiro Não Responder</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="work">Trabalhando</label>
                            <select class="form-select" name="work">
                                <?php
                                    if ($_SESSION['work'] == 'S') {
                                        ?>
                                        <option value="S" selected>Sim, estou trabalhando</option>
                                        <option value="N">Não, estou desempregado</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="S" >Sim, estou trabalhando</option>
                                        <option value="N" selected>Não, estou desempregado</option>
                                        <?php
                                    }
                                ?>

                            </select>
                        </div>
                        <?php
                        if ($_SESSION['work'] == 'S') {
                            ?>
                            <div class="col-md-3">
                                <label for=""horario_inicio>Horário de Chegada</label>
                                <input type="time" class="form-control" name="horario_inicio" value="<?=$_SESSION['horario_inicio']?>">
                            </div>
                            <div class="col-md-3">
                                <label for=""horario_inicio>Horário de Saída</label>
                                <input type="time" class="form-control" name="horario_fim" value="<?=$_SESSION['horario_fim']?>">
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-md-3 mb-3">
                            <label for="estado_civil">Estado Civil: <?=$_SESSION['estado_civil']?></label>
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
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="button" name="btn_salvar_alteracoes" id="btn_salvar_alteracoes" class="btn btn-outline-primary">SALVAR ALTERAÇÔES</button>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>

<script type="text/javascript">
function carregarImg() {

    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_salvar_alteracoes').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "account/update-profile.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem) {
                    alert(mensagem);
                }
            })
        })
    })
</script>
