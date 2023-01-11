<?php

require_once('../config.php');
require_once('../conexao.php');
require_once('../protect.php');
@session_start();

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
            <div style="border: 2px solid black">
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
                                        <h5 class="card-title"><?=$author?></h5>
                                        <p class="card-text"><?=$citacao?></p>
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
                <img src="<?=UPLOADS.$_SESSION['imagem']?>" alt="Foto de Perfil do Usuário" width="200" height="200">

            </div>
        </section>
    </body>
</html>
