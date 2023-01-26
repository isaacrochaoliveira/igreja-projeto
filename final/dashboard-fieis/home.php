<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
?>
<div class="mt-1 mx-2">
    <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalNovaOracao"><i class="fa-solid fa-plus"></i> Nova Oração</button>
    <a href="index.php?pag=minhas-oracoes">Visualizar todas as minhas orações</a>
</div>
<section class="d-flex mx-2 flex-wrap" style="margin: 0px;">
    <?php
        $query = $pdo->query("SELECT * FROM oracao as o JOIN usuarios as u ON o.id_criador = u.id");
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
    <div>
        <h2 class="text-center">O Que a Biblía Diz?</h2>
    </div>
    <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading1">First</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading2">Second</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
        <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
      </ul>
    </li>
  </ul>
</nav>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
  <h4 id="scrollspyHeading1">First heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading2">Second heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading3">Third heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading4">Fourth heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading5">Fifth heading</h4>
  <p>...</p>
</div>

</section>

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
