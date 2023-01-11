<?php

require_once('../config.php');
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
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>15</h3>
                            <p>Grupos - Totais</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Visualizar <i class="fa-sharp fa-solid fa-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mx-3 mt-5">
                <h1 class="font-s-4">Edite seu Perfil</h1>
                <img src="<?=UPLOADS.$_SESSION['imagem']?>" alt="Foto de Perfil do Usuário" width="200" height="200">

            </div>
        </section>
    </body>
</html>
