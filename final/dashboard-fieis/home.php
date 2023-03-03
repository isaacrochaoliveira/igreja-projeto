<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');

$pag = "home";

?>
<div class="mt-1 mx-2">
    <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalNovaOracao"><i class="fa-solid fa-plus"></i> Nova Oração</button>
    <a href="index.php?pag=minhas-oracoes">Visualizar todas as minhas orações</a>
</div>
<section class="d-flex mx-2 flex-wrap" style="margin: 0px;">
    <?php
        $query = $pdo->query("SELECT * FROM oracao as o JOIN usuarios as u ON o.id_criador = u.id LIMIT 3;");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) > 0) {
            for ($i = 0; $i < count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                if (!($res[$i]['id_criador'] == $_SESSION['id'])) {
                    ?>
                    <div class="d-flex mb-1 px-3" style="width: 50%;">
                        <?php
                        $id_oracao = $res[$i]['id_pray'];
                        $titulo = $res[$i]['titulo'];
                        $descricao = $res[$i]['descricao'];
                        $imagem = $res[$i]['perfil'];
                        $nome_usuario = $res[$i]['nome'];
                        $nasc = $res[$i]['nasc'];
                        $idade = date('Y') - intVal($nasc);
                        $joelhos_dobrados = $res[$i]['orando'];

                        $query_eno = $pdo->query("SELECT * FROM emproposito_na_oracao WHERE id_usuario = '$_SESSION[id]' AND id_oracao = '$id_oracao'");
                        $res_eno = $query_eno->fetchAll(PDO::FETCH_ASSOC);
                        $propo = count($res_eno);
                        ?>

                        <img src="<?=UPLOADS.$imagem?>" class="my-auto border-radius" alt="Sem Foto de Perfil" width="150" height="150">
                        <div class="ml-2" style="width: 100%;">
                            <div class="d-flex justify-content-between">
                                <span class="span-style-oracao"><?=$titulo?> - </span>
                                <?php
                                    if ($propo == 0) {
                                        ?>
                                          <button style="color: red; border: none; background-color: white;" onclick="emProposito(<?=$id_oracao?>)" name="btn_emproposito" id="btn_emproposito_<?=$id_oracao?>">
                                            <i id="fa-solid-fa-heart-<?=$id_oracao?>" style="font-size: 20px;" title="Em Propósito" class="fa-regular fa-heart"></i>
                                        </button>
                                        <button style="color: red; border: none; background-color: white; display: none;" onclick="desEmProposito(<?=$id_oracao?>)"  name="btn_desemproposito_<?=$id_oracao?>" id="btn_desemproposito_<?=$id_oracao?>">
                                            <i title="Não estou mais em Propósito" class="fa-solid fa-heart" style="font-size: 20px;"></i>
                                        </button>
                                        <?php
                                    } else if ($propo == 1) {
                                        ?>
                                        <button style="color: red; display: none; border: none; background-color: white;" onclick="emProposito(<?=$id_oracao?>)" name="btn_emproposito" id="btn_emproposito_<?=$id_oracao?>">
                                            <i id="fa-solid-fa-heart-<?=$id_oracao?>" style="font-size: 20px;" title="Em Propósito" class="fa-regular fa-heart"></i>
                                        </button>
                                        <button style="color: red; border: none; background-color: white; display: block;" onclick="desEmProposito(<?=$id_oracao?>)"  name="btn_desemproposito_<?=$id_oracao?>" id="btn_desemproposito_<?=$id_oracao?>">
                                            <i title="Não estou mais em Propósito" class="fa-solid fa-heart" style="font-size: 20px;"></i>
                                        </button>
                                        <?php
                                    }

                                ?>

                            </div>
                            <p class="p-style-oracao"><?=$descricao?></p>
                            <p style="margin-bottom: 0px"><i class="fa-solid fa-person-praying"></i><?=" Joelhos Dobrados: "?><span id="joelhor_dobrados_<?=$id_oracao?>"><?=$joelhos_dobrados?></span></p>
                            <p style="margin-bottom: 0px;">Categoria:
                                <?php
                                    $query_cat = $pdo->query("SELECT * FROM oracao_relacionada_com_a_categoria as oc JOIN categorias ON oc.id_categoria = categorias.id_cat JOIN oracao ON oracao.id_pray = oc.id_oracao");
                                    $res_cat = $query_cat->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res_cat) > 0) {
                                        for ($c = 0; $c < count($res_cat); $c++) {
                                            foreach ($res_cat[$c] as $key => $v) {
                                            }
                                            if ($res_cat[$c]['id_oracao'] == $id_oracao) {
                                                $categoria = $res_cat[$c]['categorias'];
                                                echo $categoria.". ";
                                            }
                                        }
                                    } else {
                                        ?>
                                        Sem Categoria
                                        <?php
                                    }

                                ?>
                            </p>
                            <p class="nome-style-oracao"><?=$nome_usuario." - ". $idade. " Anos(s) "?></p>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    ?>
</section>
<section class="d-flex">
    <div class="w-50porc background">
       Olá
    </div>
    <div class="card-grupo">
        <?php
            $query = $pdo->query("SELECT * FROM grupos_de_oracao LIMIT 1");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if (count($res) > 0) {
                $id = $res[0]['id_group'];
                $logo = $res[0]['logo'];
                $title = $res[0]['title'];
                $desc = $res[0]['descricao'];
                $criadoEm = $res[0]['criado_em'];
                $hora_criado_em = $res[0]['hora_criado_em'];
                $part = $res[0]['pessoas_part'];

                $criadoEm = implode('/', array_reverse(explode('-', $criadoEm)));

                $query_ujg = $pdo->query("SELECT * FROM participando_do_grupo WHERE id_usuario = '$_SESSION[id]' AND id_grupo = '$id'");
                $res_ujg = $query_ujg->fetchAll(PDO::FETCH_ASSOC);
                $grj = count($res_ujg);

                ?>
                <div class="border-gold">
                    <div style="margin-left: 10px">
                        <div class="d-flex">
                            <img src="<?=IMAGEM."fotos-grupos/$logo"?>" width="220" height='220' class="my-auto">
                            <div class="d-block ml-2">
                                <h1 class="title-card-grupo"><?=$title?></h1>
                                <p class="description-card-grupo"><?=$desc?></p>
                            </div>
                        </div>
                        <div class="d-block">
                            <div class="d-flex mb-3">
                                <?php
                                if ($grj == 1) {
                                    ?>
                                    <button type="button" class="btn btn-primary" style="display: none;" name="btn-join-group" id="btn-join-group" data-bs-toggle="modal" data-bs-target="#modalJoinIntoGruop">Entrar no grupo</button>
                                    <button type="button" onclick="SairdoGrupo(<?=$id?>)" style="display: block;" type="button" class="btn btn-danger" name="btn-fechar-jointogorup" id="btn-fechar-jointogorup">Sair do Grupo</button>
                                    <?php
                                } else if ($grj == 0) {
                                    ?>
                                    <button style="display: block;" type="button" class="btn btn-primary" name="btn-join-group" id="btn-join-group" data-bs-toggle="modal" data-bs-target="#modalJoinIntoGruop">Entrar no grupo</button>
                                    <button style="display: none;" type="button" onclick="SairdoGrupo(<?=$id?>)" class="btn btn-danger" name="btn-fechar-jointogorup" id="btn-fechar-jointogorup">Sair do Grupo</button>
                                    <?php
                                }
                                ?>
                                <div class="ml-3">
                                    <a href="index.php?pag=grupos-de-oracoes">Ver todos os grupos</a><br>
                                    <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalJoinIntoGruop">Mais Detalhes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <?php
            }
        ?>
    </div>
</section>

<section>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?=IMAGEM."images-web/culto-da-familia-1280-800.webp"?>" class="d-block w-100" alt="Culto da Família - Domingo às 18:00h" width="100%" height="450">
                <div class="carousel-caption d-none d-md-block bg-dark-tranparent py-2 px-2">
                    <h5>Culto da Família - Todo Domingo às 18:00</h5>
                    <p>Temos esse culto para presevarmos o que Deus nos entregou, a ainda por cima! Ajudar aqueles que estão Desamparados e angústiados de alma.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?=IMAGEM."images-web/culto-da-vitoria.webp"?>" class="d-block w-100" alt="Culto da Vitória - Terça Feira às 19:30h" width="100%" height="450">
                <div class="carousel-caption d-none d-md-block bg-dark-tranparent py-2 px-2">
                    <h5>Culto da Vitória - Toda Terça às 19:30h</h5>
                    <p>Sl 125:1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?=IMAGEM."images-web/culto-dos-jovens.webp"?>" class="d-block w-100" alt="Culto dos Jovens - Todo Sábado às 19:00h" width="100%" height="450">
                <div class="carousel-caption d-none d-md-block bg-dark-tranparent py-2 px-2">
                    <h5>Culto dos Jovens</h5>
                    <p>Culto dos Jovens.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="d-flex flex-column py-3" id="pastoresTables">
    <div class="text-center">
        <h2 class="f-family-Lobster" style="font-size: 45px">Pastores Cadastrados!</h2>
    </div>
    <div class="my-5 w-100porc">
        <div class="">
            <?php
                $query = $pdo->query("SELECT * FROM pastores;");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if (!(count($res) > 0)) {
                    ?>
                        <div class="alert alert-warning" role="alert">
                            <p style="font-size: 25px"><i class="fa-solid fa-exclamation" style="font-size: 43px !important"></i> Alerta</p>
                            <p>Não há pastores Cadastrados! <a class="text-dark" href="index.php?pag=pastores">Pastores <?="\u{261B}"?></a></p>
                        </div>
                    <?php
                } else {
                    ?>
                        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome<?="\u{1F170}"?></th>
                        <th scope="col">Tempo de Past. <?="\u{1F4C6}"?></th>
                        <th scope="col">Tele-fone <?="\u{1F4F1}"?></th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Go</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $pdo->query("SELECT * FROM pastores LIMIT 10;");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                            for ($i = 0; $i < count($res); $i++) {
                                foreach ($res[$i] as $key => $row) {
                                }
                                $id_pas = $res[$i]['id_pas'];
                                $nome_pas = $res[$i]['nome_pas'];
                                $tempo_pas = $res[$i]['tempo_pas'];
                                $telefone_pas = $res[$i]['telefone_pas'];
                                $email = $res[$i]['email_pas'];
                                ?>
                                    <tr>
                                        <td><?=$nome_pas?></td>
                                        <td><?=$tempo_pas." Ano(s)"?></td>
                                        <td><?=$telefone_pas?></td>
                                        <td><?=$email?></td>
                                        <td><a class="text-dark" href="index.php?pag=pastores">Todos os Pastores <?="\u{261B}"?></a></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>

                </tbody>
            </table>
                    <?php
                }
            ?>
        </div>
        <div class="text-center">
            <h2 class="f-family-Lobster" style="font-size: 45px">Pastoras Cadastrados!</h2>
        </div>
        <div class="my-5 w-100porc">
            <?php
                $query = $pdo->query("SELECT * FROM pastoras;");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if (!(count($res) > 0)) {
                    ?>
                        <div class="alert alert-warning" role="alert">
                            <p style="font-size: 25px"><i class="fa-solid fa-exclamation" style="font-size: 43px !important"></i> Alerta</p>
                            <p>Não há pastoras Cadastrados! <a class="text-dark" href="index.php?pag=pastores#pastoras">Pastoras <?="\u{261B}"?></a></p>
                        </div>
                    <?php
                } else {
                    ?>
                        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome<?="\u{1F170}"?></th>
                        <th scope="col">Tempo de Past. <?="\u{1F4C6}"?></th>
                        <th scope="col">Tele-fone <?="\u{1F4F1}"?></th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Go</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $pdo->query("SELECT * FROM pastoras LIMIT 10;");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                            for ($i = 0; $i < count($res); $i++) {
                                foreach ($res[$i] as $key => $row) {
                                }
                                $id_pas = $res[$i]['id_pas_ras'];
                                $nome_pas = $res[$i]['nome_pas_ras'];
                                $tempo_pas = $res[$i]['tempo_pas_ras'];
                                $telefone_pas = $res[$i]['telefone_pas_ras'];
                                $email = $res[$i]['email_pas_ras'];
                                ?>
                                    <tr>
                                        <td><?=$nome_pas?></td>
                                        <td><?=$tempo_pas." Ano(s)"?></td>
                                        <td><?=$telefone_pas?></td>
                                        <td><?=$email?></td>
                                        <td><a class="text-dark" href="index.php?pag=pastores">Todos os Pastores <?="\u{261B}"?></a></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>

                </tbody>
            </table>
                    <?php
                }
            ?>
        </div>
</section>
<section>
    <h2 class="text-center f-family-Lobster">
        JEJUNS
    </h2>
    <div class="d-flex flex-wrap">
        <?php
            $query = $pdo->query("SELECT * FROM jejuns LIMIT 10");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if (count($res) > 0) {
                for ($i = 0; $i < count($res); $i++) {
                    foreach ($res[$i] as $key => $value) {
                    }
                    if (isset($res[$i]['pastor_comando'])) {
                        $id_pas = $res[$i]['pastor_comando'];
                        $query_pastor = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$id_pas'");
                        $res_pastor = $query_pastor->fetchAll(PDO::FETCH_ASSOC);

                        $view = "view";
                        $id_pastor = $res_pastor[0]['id_pas'];
                        $pastor = $res_pastor[0]['nome_pas'];
                        $perfil_pas = $res_pastor[0]['perfil_pas'];
                        $email = $res_pastor[0]['email_pas'];
                        $telefone = $res_pastor[0]['telefone_pas'];
                        $ministerio = $res_pastor[0]['ministerio_pas'];
                    } else if (isset($res[$i]['pastora_comando'])) {
                        $id_pas_ras = $res[$i]['pastora_comando'];
                        $query_pastora = $pdo->query("SELECT * FROM pastoras WHERE id_pas_ras = '$id_pas_ras'");
                        $res_pastora = $query_pastora->fetchAll(PDO::FETCH_ASSOC);

                        $view = "view_pas";
                        $id_pastor = $res_pastora[0]['id_pas_ras'];
                        $pastor = $res_pastora[0]['nome_pas_ras'];
                        $perfil_pas = $res_pastora[0]['perfil_pas_ras'];
                        $email = $res_pastora[0]['email_pas_ras'];
                        $telefone = $res_pastora[0]['telefone_pas_ras'];
                        $ministerio = $res_pastora[0]['ministerio_pas_ras'];
                    }

                    $id_criador = $res[$i]['id_criador_jejum'];
                    $id_jejum = $res[$i]['id_jejum'];
                    $imagem = $res[$i]['imagem'];
                    $jejum = $res[$i]['jejum'];
                    $descricao = $res[$i]['descricao_jejum'];
                    $versiculo_chave = $res[$i]['versiculo_baseado'];
                    $colaboradores = $res[$i]['colaboracao'];
                    $pessoas = $res[$i]['quantidade_pessoas'];
                    ?>
                    <div class="w-50porc" id="jejum<?=$id_jejum?>">
                        <div class="card">
                            <img src="<?=IMAGEM."images-jejuns/$imagem"?>" class="card-img-top" alt="Foto" height="300">
                            <div class="card-body">
                                <h5 class="card-title mb-2"><?=$jejum?></h5>
                                <h6 class="card-text mb-4"><?=$descricao?></h6>
                                <p class="card-text mb-0">Versículo Chave: <?=$versiculo_chave?></p>
                                <p class="card-text mb-0">Pessoa(s) Colaborando: <span class="card-text" id="spanpessoascolaborandojejum<?=$id_jejum?>"><?=$colaboradores?></span></p>
                                <p class="card-text">Pessoa(s) Jejuando: <span class="card-text" id="spanpessoasparticipandojejum<?=$id_jejum?>"><?=$pessoas?></span></p>
                                <div class="d-flex flex-wrap">
                                    <?php
                                        $query_p = $pdo->query("SELECT * FROM participando_do_jejum WHERE id_participante = '$_SESSION[id]' AND id_jejum_part = '$id_jejum'");
                                        $res_p = $query_p->fetchAll(PDO::FETCH_ASSOC);
                                        if (count($res_p) == 0) {
                                            ?>
                                            <button onclick="entrarnojejum(<?=$id_jejum?>)" name="btnbtn-entrar-do-jejum<?=$id_jejum?>" id="btnbtn-entrar-do-jejum<?=$id_jejum?>" class="btn btn-light mx-2">Participar desse Jejum</button>
                                            <button onclick="sairdojejum(<?=$id_jejum?>)" name="btnbtn-sair-do-jejum<?=$id_jejum?>" id="btnbtn-sair-do-jejum<?=$id_jejum?>" class="d-none">Cancelar Participação</button>
                                            <?php
                                        } else {
                                            ?>
                                            <button onclick="entrarnojejum(<?=$id_jejum?>)" name="btnbtn-entrar-do-jejum<?=$id_jejum?>" id="btnbtn-entrar-do-jejum<?=$id_jejum?>"  class="d-none">Participar desse Jejum</button>
                                            <button onclick="sairdojejum(<?=$id_jejum?>)" name="btnbtn-sair-do-jejum<?=$id_jejum?>" id="btnbtn-sair-do-jejum<?=$id_jejum?>" class="btn btn-warning mx-2">Cancelar Participação</button>
                                            <?php
                                        }
                                            if ($id_criador == $_SESSION['id']) {
                                                ?>
                                                    <a href="index.php?pag=<?=$pag?>&confirmarcolaboracao=<?=$id_jejum?>" target="_self" class="btn btn-primary">Colaboração</a>
                                                <?php
                                            }
                                        ?>
                                    <a href="#" class="btn btn-outline-light mx-2">Ver Colaboradores</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-50porc">
                        <div class="card" style="width: 25rem; margin: 0 auto">
                            <img src="<?=URL_BASE."assets/img/fotos-pastores/$perfil_pas"?>" class="card-img-top" alt="Perfil do Pastor" height="300">
                            <div class="card-body">
                                <h5 class="card-title mb-2"><?="Pastor(a): ".$pastor?></h5>
                                <p class="card-text mb-3">O Pastor(a) <?=$pastor?> está liderando esse grupo (<?=$jejum?>)</p>
                                <p class="card-text mb-0"><?=$email?></p>
                                <p class="card-text mb-0"><?=$telefone?></p>
                                <p class="card-text mb-4">Ministério de <?=$ministerio?></p>
                                <div class="d-flex flex-wrap">
                                    <a href="<?=URL_BASE?>dashboard-fieis/perfil-pastor/index.php?<?=$view?>=<?=$id_pastor?>" class="btn btn-light mx-2"><img src="<?=URL_BASE."assets/img/fotos-pastores/$perfil_pas"?>" alt="foto de Perfil" style="border-radius: 100%;" width="25" height="25"/> Ver Perfil</a>
                                    <a href="mailto:<?=$email?>?subject=subject text" class="btn btn-outline-light mx-2">Enviar E-mail</a>
                                    <a href="https://wa.me/<?=$telefone?>?text=Oii+Pastor" target="_blank" class="btn btn-success mx-2 ">WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</section>


<!-- Modals -->

<div class="modal fade" id="modalNovaOracao" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sua Oração - <a href="index.php?pag=meus-pedidos-de-oracoes" target="_blank">Ver todas as minhas orações</a></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="col mb-2">
                        <label for="title">Título da sua Oração</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="col mb-2">
                        <label for="desc">Escreva aqui sua oração</label>
                        <textarea rows="3" cols="4" class="form-control" name="desc" id="desc"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cat1">1º Categorias</label>
                            <select class="form-select" name="cat1">
                                <?php
                                    $query_cate = $pdo->query("SELECT * FROM categorias");
                                    $res_cate = $query_cate->fetchAll(PDO::FETCH_ASSOC);
                                     ?>
                                    <option value="" selected>Selecione Um</option>
                                    <?php
                                    if (count($res_cate) > 0) {
                                        for ($i = 0; $i < count($res_cate); $i++) {
                                            foreach ($res_cate[$i] as $key => $value) {
                                            }
                                            $id = $res_cate[$i]['id_cat'];
                                            $categorias = $res_cate[$i]['categorias'];
                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $categorias?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cat2">2º Categoria</label>
                            <select class="form-select" name="cat2">
                                 <?php
                                    $query_cate = $pdo->query("SELECT * FROM categorias");
                                    $res_cate = $query_cate->fetchAll(PDO::FETCH_ASSOC);
                                     ?>
                                    <option value="" selected>Selecione Um</option>
                                    <?php
                                    if (count($res_cate) > 0) {
                                        for ($i = 0; $i < count($res_cate); $i++) {
                                            foreach ($res_cate[$i] as $key => $value) {
                                            }
                                            $id = $res_cate[$i]['id_cat'];
                                            $categorias = $res_cate[$i]['categorias'];
                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $categorias?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cat3">3º Categorias</label>
                            <select class="form-select" name="cat3">
                                <?php
                                    $query_cate = $pdo->query("SELECT * FROM categorias");
                                    $res_cate = $query_cate->fetchAll(PDO::FETCH_ASSOC);
                                     ?>
                                    <option value="" selected>Selecione Um</option>
                                    <?php
                                    if (count($res_cate) > 0) {
                                        for ($i = 0; $i < count($res_cate); $i++) {
                                            foreach ($res_cate[$i] as $key => $value) {
                                            }
                                            $id = $res_cate[$i]['id_cat'];
                                            $categorias = $res_cate[$i]['categorias'];
                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $categorias?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cat4">4º Categoria</label>
                            <select class="form-select" name="cat4">
                                 <?php
                                    $query_cate = $pdo->query("SELECT * FROM categorias");
                                    $res_cate = $query_cate->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <option value="" selected>Selecione Um</option>
                                    <?php
                                    if (count($res_cate) > 0) {
                                        for ($i = 0; $i < count($res_cate); $i++) {
                                            foreach ($res_cate[$i] as $key => $value) {
                                            }
                                            $id = $res_cate[$i]['id_cat'];
                                            $categorias = $res_cate[$i]['categorias'];
                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $categorias?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="btn-fechar-pedido" id="btn-fechar-pedido">Voltar</button>
                    <button type="button" class="btn btn-success" name="btn-salvar-pedido" id="btn-salvar-pedido">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalJoinIntoGruop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sua Oração - <a href="index.php?pag=meus-pedidos-de-oracoes" target="_blank">Ver todas as minhas orações</a></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <?php
                        $query = $pdo->query("SELECT * FROM grupos_de_oracao JOIN usuarios ON grupos_de_oracao.id_criador = usuarios.id JOIN cargos ON usuarios.id_cargo = cargos.id_cargo LIMIT 1");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                            $id = $res[0]['id_group'];
                            $logo = $res[0]['logo'];
                            $criadoEm = $res[0]['criado_em'];
                            $hora_criado_em = $res[0]['hora_criado_em'];
                            $part = $res[0]['pessoas_part'];
                            $ativo = $res[0]['ativo'];

                            // Pegando dados da tabela usuarios
                            $perfil = $res[0]['perfil'];
                            $nome_usuario = $res[0]['nome'];
                            $nasc = $res[0]['nasc'];
                            $idade = Date("Y") - $nasc;
                            $estado_civil = $res[0]['estado_civil'];
                            $email = $res[0]['email'];

                            // Pegando dados da tabela cargos
                            $cargo = $res[0]['cargo'];

                            // Verificando Entrada no Grupo
                            $query_ujg = $pdo->query("SELECT * FROM participando_do_grupo WHERE id_usuario = '$_SESSION[id]' AND id_grupo = '$id'");
                            $res_ujg = $query_ujg->fetchAll(PDO::FETCH_ASSOC);
                            $grj = count($res_ujg);

                            $criadoEm = implode('/', array_reverse(explode('-', $criadoEm)));
                            ?>
                            <div class="d-flex">
                                <div class="d-block w-50porc">
                                    <h4>Dados do Criador do Grupo</h4>
                                    <div class="d-flex ml-2 mt-2">
                                        <img class="border-radius" src="<?=UPLOADS.$perfil?>" width="120" height="120" alt="Foto de Perfil do Usuário">
                                        <div class="ml-3">
                                            <p style="margin: 0px;">Nome: <?=$nome_usuario?></p>
                                            <p style="margin: 0px;">Idade: <?=$idade?> Anos</p>
                                            <p style="margin: 0px;">Estado Civil: <?=$estado_civil?></p>
                                            <p style="margin: 0px;">E-mail: <?=$email?></p>
                                            <p style="margin: 0px;">Cargo: <?=$cargo?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block w-50porc">
                                    <h4>Dados Adicionais do Grupo</h4>
                                    <div class="d-flex ml-2 mt-2">
                                        <img src="<?=IMAGEM."fotos-grupos/$logo"?>" alt="Logo Do grupo" width="120">
                                        <div class="ml-3">
                                            <p style="margin: 0px;">Criado: <?=$criadoEm?> às <?=$hora_criado_em?></p>
                                            <p style="margin: 0px;">Participando: <?=$part?> Pessoas</p>
                                            <p style="margin: 0px;">Status: <?=($ativo == 'S') ? 'Ativo' : 'Fechado' ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="idJoinToGroup" value="-1">
                <?php
                    if ($ativo == 'N') {
                        ?>
                        <button type="button" class="btn btn-light">Pedir por Reabertura</button>
                        <?php
                    } else if ($ativo == 'S') {
                        if ($grj == 0) {
                        ?>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="fechar-jointogroup" id="fechar-jointogroup">Cancelar Inscrição</button>
                            <button type="button" onclick="EntrarnoGrupo(<?=$id?>)" class="btn btn-success" name="btn-salvar-jointogorup" id="btn-salvar-jointogorup">Confirmar Inscrição</button>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalColaboracao" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Colaboração com esse jejum</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php
                    $id_jejum = addslashes($_GET['confirmarcolaboracao']);
                ?>
            </div>
            <div class="modal-body">
                <div>
                    <p>Tem certeza que deseja colaborar com jejum?</p>
                </div>
                <div id="mensagem_confirmar_colaboracao">
    
                </div>
            </div>
            <div class="modal-footer">
                <form id="form-confirmar-colaboracao" method="post">
                    <input type="hidden" value="<?=$id_jejum?>" name="id_jejum-col" id="id_jejum-col">
                </form>
                <a href="index.php?pag=<?=$pag?>#jejum<?=$id_jejum?>" name="bt-bt-naocolaborar" id="bt-bt-naocolaborar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                <button name="bt-bt-confirmarcolaboracao" id="bt-bt-confirmarcolaboracao" onclick="confirmarColaboracao(<?=$id_jejum?>)" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-salvar-pedido').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "home/inserir_oracao.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(msg) {
                    alert(msg);
                    $('#btn-fechar-pedido').click();
                }
            })
        })
    });
</script>

<script type="text/javascript">
    function emProposito(id) {
        $(document).ready(function() {
            $.ajax({
                url: 'home/inserir_proposito.php',
                method: 'post',
                data: {id},
                success: function(msg) {
                    var Json = JSON.parse(msg);
                    $('#joelhor_dobrados_'+id).html(Json);
                    document.getElementById('btn_emproposito_'+id).style.display = 'none';
                    document.getElementById('btn_desemproposito_'+id).style.display = 'block';
                }
            })
        })
    }
</script>

<script type="text/javascript">
    function desEmProposito(id) {
        $(document).ready(function() {
            $.ajax({
                url: 'home/deletar_proposito.php',
                method: 'post',
                data: {id},
                success: function(msg) {
                    var Json = JSON.parse(msg);
                    $('#joelhor_dobrados_'+id).html(Json);
                    document.getElementById('btn_emproposito_'+id).style.display = 'block';
                    document.getElementById('btn_desemproposito_'+id).style.display = 'none';
                }
            })
        })
    }
</script>

<script type="text/javascript">
    function EntrarnoGrupo(id) {
        $(document).ready(function() {
            $.ajax({
                url: 'home/entrar-grupo.php',
                method: "POST",
                data: {id},
                dataType: 'text',
                success: function(msg) {
                    if (msg.trim() == 'Sucesso!') {
                        $('#fechar-jointogroup').click();
                        document.getElementById('btn-join-group').style.display = 'none';
                        document.getElementById('btn-fechar-jointogorup').style.display = 'block';
                    }
                    document.getElementById('btn-salvar-jointogorup').style.display = 'none';
                    document.getElementById('fechar-jointogroup').style.display = 'none';
                }
            })
        })
    }
</script>

<script type="text/javascript">
    function SairdoGrupo(id) {
        $(document).ready(function() {
            $.ajax({
                url: "home/sair-grupo.php",
                method: "post",
                data: {id},
                dataType: 'text',
                success: function(msg) {
                    if (msg.trim() == "Sucesso!") {
                        document.getElementById('btn-join-group').style.display = 'block';
                        document.getElementById('btn-fechar-jointogorup').style.display = 'none';
                    }
                    document.getElementById('btn-salvar-jointogorup').style.display = 'block';
                    document.getElementById('fechar-jointogroup').style.display = 'block';
                }
            })
        })
    }
</script>

<script type="text/javascript">
    function entrarnojejum(id_jejum) {
        $(document).ready(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/entrar-no-jejum.php',
                method: 'post',
                data: {id_jejum},
                success: function(msg) {
                    if ($.isNumeric(msg)) {
                        var Json = JSON.parse(msg);
                        $('#spanpessoasparticipandojejum'+id_jejum).html(Json);

                        $('#btnbtn-entrar-do-jejum'+id_jejum).removeClass();
                        $('#btnbtn-sair-do-jejum'+id_jejum).removeClass();
                        $('#btnbtn-entrar-do-jejum'+id_jejum).addClass('d-none');
                        $('#btnbtn-sair-do-jejum'+id_jejum).addClass('btn btn-warning');
                    } else {
                        alert(msg);
                    }
                }
            })
        })
    }
</script>


<script type="text/javascript">
    function sairdojejum(id_jejum) {
        $(document).ready(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/cancelar-jejum.php',
                method: 'post',
                data: {id_jejum},
                success: function(msg) {
                    if ($.isNumeric(msg)) {
                        var Json = JSON.parse(msg);
                        $('#spanpessoasparticipandojejum'+id_jejum).html(Json);

                        $('#btnbtn-entrar-do-jejum'+id_jejum).removeClass();
                        $('#btnbtn-sair-do-jejum'+id_jejum).removeClass();
                        $('#btnbtn-entrar-do-jejum'+id_jejum).addClass('btn btn-light');
                        $('#btnbtn-sair-do-jejum'+id_jejum).addClass('d-none');
                    } else {
                        alert(msg);
                    }
                }
            })
        })
    }
</script>


<script>
    function confirmarColaboracao(id_jejum) {
        $(document).ready(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/confirmar-colaboracao-jejum.php',
                method: 'post',
                data: $('#form-confirmar-colaboracao').serialize(),
                success: function(msg) {
                    $('#mensagem_confirmar_colaboracao').removeClass();
                    if ($.isNumeric(msg)) {
                        var Json = JSON.parse(msg);
                        $('#spanpessoascolaborandojejum'+id_jejum).html(Json);

                        $('#mensagem_confirmar_colaboracao').addClass('text-success');
                        $('#mensagem_confirmar_colaboracao').text('Colaboração Aprovada com Sucesso! Aperte na Lixeira');
                    } else {
                        $('#mensagem_confirmar_colaboracao').addClass('text-danger');
                        $('#mensagem_confirmar_colaboracao').text('Colaboração Reprovada! Aperto na Lixeira');
                    }
                }
            })
        })
    }
</script>
