<?php
    require_once('../config.php');
    require_once('../protect.php');
    @session_start();

    $pag = @$_GET["pag"];
    $menu1 = "grupos-de-oracoes";
    $menu2 = "pedidos-de-oracoes";
    $menu3 = "oracoes-especiais";
    $menu4 = "criar-grupo";
    $menu5 = "leitura-individual";
    $menu6 = "leitura-compartilhada";
    $menu7 = "leitura-em-1-ano";
    $menu8 = "principais-temas";
    $menu9 = "pastores";
    $menu10 = "jejum-21-dias";
    $menu11 = "jejum-3-dias";
    $menu12 = "jejum-14-dias";
    $menu13 = "jejum-40-dias";
    $menu14 = "jejum-personalisado";
    $menu15 = 'account';

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= TITLE?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="../assets/styles/dashboard.css">
        <link rel="stylesheet" href="../assets/styles/adminlte.min.css">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark f-family-Lobster" aria-label="Dark offcanvas navbar">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-size: 25px" href="index.php"><?=$_SESSION['nome']?></a>
                <a href="index.php"><img src="<?=IMAGEM."logo-branco.png"?>" style="margin-left: -115px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
                    <div class="offcanvas-header">
                        <img src="<?=UPLOADS.$_SESSION['imagem']?>" alt="Foto de Perfil do Usuário" width="100" height="100" style="border-radius: 50%;">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Orações
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?pag=<?= $menu1 ?>" class="dropdown-item">Grupo de Orações</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu2 ?>" class="dropdown-item">Pedidos de Oração</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu3 ?>" class="dropdown-item">Pedidos Especiais</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu4 ?>" class="dropdown-item">Criar Grupo de Oração</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Bíblia
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?pag=<?= $menu5 ?>" class="dropdown-item">Leitura Bíblica Índividual</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu6 ?>" class="dropdown-item">Leitura Bíblica Compartilhada (Grupos)</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu7 ?>" class="dropdown-item">Leia a Bíblia em 1 ano</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu8 ?>" class="dropdown-item">Temas</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jejuns
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?pag=<?= $menu10 ?>" class="dropdown-item">Jejum de Daniel - 21 Dias</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu11 ?>" class="dropdown-item">Jejum de Ester - 3 Dias</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu12 ?>" class="dropdown-item">Jejum involuntário de Paulo - 14 Dias</a>
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu13 ?>" class="dropdown-item">O jejum do Senhor Jesus no deserto - 40 Dias</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="index.php?pag=<?= $menu14 ?>" class="dropdown-item">Jejum Personalizado!</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?pag=<?= $menu9 ?>" class="nav-link">
                                    Pastores
                                </a>
                            </li>
                            <li>
                                <a href="../logout.php" class="btn btn-danger"><i class="fa-sharp fa-solid fa-door-open"></i> Logout</a>
                                <a href="index.php?pag=<?=$menu15?>" class="btn btn-warning"><i class="fa-solid fa-signal"></i> Visualizar Perfil</a>
                            </li>
                            <div class="f-family-SourceSerifMediumItalic mt-2 bg-light text-dark pt-2" style="font-size: 14px; margin-left: -20px">
                                <ul type="square">
                                    <li class="nav-item">
                                        <p><?="Nome: ". $_SESSION['nome']?></p>
                                    </li>
                                    <li class="nav-item">
                                        <p><?="Idade:". date('Y') - intVal($_SESSION['nasc'])." Anos"?></p>
                                    </li>
                                    <li>
                                        <p><?="Estado Civil: ". $_SESSION['estado_civil']?></p>
                                    </li>
                                    <li>
                                        <p><?="Email: ". $_SESSION['email']?></p>
                                    </li>
                                    <li>
                                        <p><?="Cargo: ". $_SESSION['cargo']?></p>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </body>
    <?php
    if (@$pag == null) {
        @include_once("home.php");
    } else if (@$pag == $menu1) {
        @include_once(@$menu1 . ".php");
    } else if (@$pag == $menu2) {
        @include_once(@$menu2 . ".php");
    } else if (@$pag == $menu3) {
        include_once(@$menu3 . ".php");
    } else if (@$pag == $menu4) {
        @include_once(@$menu4 . ".php");
    } else if (@$pag == $menu5) {
        @include_once(@$menu5 . ".php");
    } else if (@$pag == $menu6) {
        @include_once(@$menu6 . ".php");
    } else if (@$pag == $menu7) {
        @include_once(@$menu7 . ".php");
    } else if (@$pag == $menu8) {
        @include_once(@$menu8 . ".php");
    } else if (@$pag == $menu9) {
        @include_once(@$menu9 . ".php");
    } else if (@$pag == $menu10) {
        @include_once(@$menu10 . ".php");
    } else if (@$pag == $menu11) {
        @include_once(@$menu11 . ".php");
    } else if (@$pag == $menu12) {
        @include_once(@$menu12 . ".php");
    } else if (@$pag == $menu13) {
        @include_once(@$menu13 . ".php");
    } else if (@$pag == $menu14) {
        @include_once(@$menu14 . ".php");
    } else if (@$pag == $menu15) {
        @include_once(@$menu15 . ".php");
    } else if (@$pag == 'minhas-oracoes') {
        @include_once('minhas-oracoes.php');
    }else {
        @include_once("home.php");
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php 
    if (isset($_GET['jointogroup'])) {
        ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('modalJoinIntoGruop'), {
                
            })

            myModal.show();
        </script>
        <?php
    }

    if (isset($_GET['comoparticipar'])) {
        ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('modalRegras'), {

            })
            myModal.show();
        </script>
        <?php
    }
?>
</html>
