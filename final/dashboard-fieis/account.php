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
        <section class="mx-3 mt-3">
            <div class="card" style="width: 20rem;">
                <img src="<?=IMAGEM."images-web/holy-bible.webp"?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Planos de Leitura</h5>
                    <p class="card-text">Participe conosco no nosso plano de leitura anual. Entre quando quizer!</p>
                    <a href="#" class="btn btn-primary">Participar</a>
                </div>
            </div>
        </section>
    </body>
</html>
