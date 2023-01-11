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
    <body>
        <section class="mx-3">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mx-3 mt-5">
                <h1 class="f-family-SourceSerifMediumItalic font-s-4">Edite seu Perfil</h1>
                <img src="<?=UPLOADS.$_SESSION['imagem']?>" alt="Foto de Perfil do Usuário" width="200" height="200">

            </div>
        </section>
    </body>
</html>
