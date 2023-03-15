<?php

require_once("../protect.php");
require_once("../conexao.php");
require_once("../config.php");

$pag = "jejum-21-dias";

?>

<div class="ml-3 mt-3">
    <h1 class="f-family-Lobster" style="font-size: 32px">JEJUM DE DANIEL - 21 DIAS </h1>
</div>

<div class="py-5">
    <div class="text-center">
        <h2 class="f-family-ComfortaaRegular">Qual o propósito?</h2>
        <p class="px-5 line-height-33">O Jejum de Daniel foi criado com um propósito espiritual e religioso, aliando alimentação restrita e orações, e não como uma dieta de emagrecimento. Mas isso não significa que o jejum não auxilia na perda de peso e na melhoria da saúde — algumas pessoas utilizam o plano alimentar inspirado no profeta Daniel visando justamente esses objetivos. Pesquisas sobre este método de jejum realizadas pela Escola de Estudos de Saúde da Universidade de Memphis, nos Estados Unidos, demonstraram benefícios à saúde dos participantes analisados. Após apenas três semanas, a dieta ajudou a reduzir os fatores de risco para doenças metabólicas e cardiovasculares, como pressão alta e colesterol, e reduzir o estresse oxidativo. Richard Bloomer, líder dos estudos, afirmou à revista TIME que a dieta é potencialmente ainda mais saudável do que a vegana, já que elimina alimentos processados que podem conter açúcar, gordura, sal e conservantes.
<br>Leia mais em: <a href="https://www.gazetadopovo.com.br/viver-bem/saude-e-bem-estar/o-que-e-a-dieta-de-daniel-inspirada-na-biblia/" target="_blank">gazetadopovo</a></p>
    </div>
</div>

<div class="d-flex flex-wrap py-5">
    <div class="w-50porc bg-dark py-4">
        <h4 class="ml-4">Dicas para fazer o Jejum de Daniel</h4>
        <hr>
        <ul type="square">
            <li>
                Fale mais com Deus
            </li>
            <br>
            <li>
                Leia mais a Biblía
            </li>
            <br>
            <li>
                Vá mais vezes a igreja
            </li>
            <br>
            <li>
                Assista a série e filmes critãos
            </li>
            <br>
            <li>
                Assista ás novelas apocalipse a José do Egito
            </li>
            <br>
            <li>
                Ajude o próximo
            </li>
        </ul>
    </div>
    <div class="w-50porc bg-dark py-4">
        <h4 class="ml-4">Como fazer o jejum de Daniel?</h4>
        <hr>
        <p class="ml-4 mr-4">A bíblia diz que Daniel e seus amigos fizeram um jejum no qual somente comeram legumes e água por 21 dias, para não se contaminar com a comida do rei, que era um idólatra. As pessoas que fazem o jejum de Daniel geralmente fazem desta forma durante 21 dias.</p>
        <h5 class="ml-4"><strong>Somente comer:</strong></h5>
        <ol>
            <li>
                Frutas
            </li>
            <li>
                Legumes
            </li>
            <li>
                Água
            </li>
            <li>
                Suco
            </li>
        </ol>
        <h5 class="ml-4">Não comer:</h5>
        
    </div>
</div>


<div class="d-flex flex-wrap">
        <?php
            $query = $pdo->query("SELECT * FROM jejuns WHERE id_jejum = 1");
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
                                <p class="card-text mb-0">Pessoa(s) Colaborando: <span class="card-text" id="spanpessoascolaborandojejum<?=$id_jejum?>"><?=$colaboradores?></span> Membro(s)</p>
                                <p class="card-text">Pessoa(s) Jejuando: <span class="card-text" id="spanpessoasparticipandojejum<?=$id_jejum?>"><?=$pessoas?></span> Membros(s)</p>
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
                                        $query_colab = $pdo->query("SELECT * FROM colaborando_jejum WHERE id_colaborando_jejum = '$id_jejum' AND id_colaborando = '$_SESSION[id]'");
                                        $res_colab = $query_colab->fetchAll(PDO::FETCH_ASSOC);
                                        if (count($res_colab) > 0) {
                                            ?>
                                                <a href="index.php?pag=<?=$pag?>&apagarcolaboracao=<?=$id_jejum?>" target="_self" class="btn btn-outline-danger">Apagar Colaboração</a> 
                                            <?php
                                        } else {
                                            ?>
                                                <a href="index.php?pag=<?=$pag?>&confirmarcolaboracao=<?=$id_jejum?>" target="_self" class="btn btn-primary">Colaborar com este Jejum</a>
                                            <?php
                                        }
                                        ?>
                                            <a href="index.php?pag=<?=$pag?>&ver-colaboradores-jejum=<?=$id_jejum?>" class="btn btn-outline-light mx-2">Ver Colaboradores</a>
                                        <?php    
                                    ?>
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

<!--MODALS-->

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

<div class="modal fade" id="modalDescontinuarColaboracao" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Descontinuar Colaboração com esse jejum</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php
                    $id_jejum = addslashes($_GET['apagarcolaboracao']);
                ?>
            </div>
            <div class="modal-body">
                <div>
                    <p>Tem certeza que deseja não colaborar com jejum?</p>
                </div>
                <div id="mensagem_desconfirmar_colaboracao">
    
                </div>
            </div>
            <div class="modal-footer">
                <form id="form-desconfirmar-colaboracao" method="post">
                    <input type="hidden" value="<?=$id_jejum?>" name="id_jejum-col" id="id_jejum-col">
                </form>
                <a href="index.php?pag=<?=$pag?>#jejum<?=$id_jejum?>" name="bt-bt-naocolaborar" id="bt-bt-naocolaborar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                <button name="bt-bt-confirmarcolaboracao" id="bt-bt-confirmarcolaboracao" onclick="descontinuarColaboracao(<?=$id_jejum?>)" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerColaboradores" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Os Colaboradores Desse Jejum são:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php
                    $id_jejum = addslashes($_GET['ver-colaboradores-jejum']);
                ?>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-wrap">
                    <?php
                        $query = $pdo->query("SELECT * FROM colaborando_jejum as cj JOIN usuarios as u ON cj.id_colaborando = u.id WHERE id_colaborando_jejum = '$id_jejum'");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                            for ($i = 0; $i < count($res); $i++) {
                                foreach ($res[$i] as $key => $value) {
                                }
                                //Dados do Usuário
                                $id_usuario = $res[$i]['id'];
                                $nome = $res[$i]['nome'];
                                $foto_perfil = $res[$i]['perfil'];

                                ?>

                                <div class="w-50porc">
                                    <div class="text-center py-3">
                                        <img src="<?=IMAGEM?>/fotos/<?=$foto_perfil?>" alt="Foto de Perfil do Colaborador" width="120" height="120" class="rounded-100 mr-2">
                                        <div class="mt-3">
                                            <h6><?=$nome?></h6>
                                            <div>
                                                <a href="index.php?pag=<?=$pag?>&ver-oracoes-de=<?=$id_usuario?>" class="btn btn-primary" title="Ver Oração de <?=$nome?>"><i class="fa-solid fa-person-praying"></i></a>
                                                <a href="index.php?pag=<?=$pag?>&ver-oracoes-curtidas=<?=$id_usuario?>" class="btn btn-dark" title="Ver Orações que <?=$nome?> curtiu"><i class="fa-solid fa-heart"></i></a>
                                                <a href="index.php?pag=<?=$pag?>&ver-grupos-usuario-criou=<?=$id_usuario?>" class="btn btn-outline-info" title="Grupos que <?=$nome?> criou"><i class="fa-solid fa-people-group"></i></a>
                                                <a href="index.php?pag=<?=$pag?>&ver-grupos-participando=<?=$id_usuario?>" class="btn btn-outline-warning" title="Grupos que <?=$nome?> está participando"><i class="fa-solid fa-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            echo "Ninguém por aqui";
                        }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <a href="index.php?pag=<?=$pag?>#jejum<?=$id_jejum?>" name="bt-bt-naocolaborar" id="bt-bt-naocolaborar" class="btn btn-outline-secondary">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalOracoesDe" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $id = addslashes($_GET['ver-oracoes-de']);

                    $_query_ = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$id'");
                    $_res_ = $_query_->fetchAll(PDO::FETCH_ASSOC);
                    $id_jejum = $_res_[0]['id_jejum'];

                    $query = $pdo->query("SELECT * FROM oracao as o JOIN usuarios as u ON o.id_criador = u.id WHERE id_criador = '$id'");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) {
                        $perfil = $res[0]['perfil'];
                        $nome = $res[0]['nome'];
                    }
                ?>
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$nome?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-wrap">
                    <?php
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $titulo = $res[$i]['titulo'];
                                    $descricao = $res[$i]['descricao'];
                                    $orando = $res[$i]['orando'];
                                    ?>
                                        <div class="card mx-2" style="width: 22rem;">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3" style="font-weight: 500"><?=$titulo?></h5>
                                                <p class="card-text"><?=$descricao?></p>
                                            </div> 
                                        </div>
                                    <?php
                                }
                            } else {
                                echo "Sem movimentação por aqui!";
                            }
                        ?>
                </div>
            </div>
            <div class="modal-footer">
                <!--<a href="index.php?pag=<?=$pag?>&ver-colaboradores-jejum=<?=$id_jejum?>" class="btn btn-primary">Voltar</a>-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalOracoesCurtidasDeUsuario" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $id = addslashes($_GET['ver-oracoes-curtidas']);

                    $_query_ = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$id'");
                    $_res_ = $_query_->fetchAll(PDO::FETCH_ASSOC);
                    $id_jejum = $_res_[0]['id_jejum'];

                    $query = $pdo->query("SELECT * FROM emproposito_na_oracao as o JOIN usuarios as u ON o.id_usuario = u.id JOIN oracao ON o.id_oracao = oracao.id_pray WHERE id_usuario = '$id'");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) {
                        // Dados do Usuário
                        $perfil = $res[0]['perfil'];
                        $nome = $res[0]['nome'];
                    }
                ?>
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$nome?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-wrap">
                    <?php
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $id_criador = $res[$i]['id_criador'];
                                    $titulo = $res[$i]['titulo'];
                                    $descricao = $res[$i]['descricao'];
                                    $orando = $res[$i]['orando'];
                                    
                                    $query_cr = $pdo->query("SELECT * FROM usuarios WHERE id = '$id_criador'");
                                    $res_cr = $query_cr->fetchAll(PDO::FETCH_ASSOC);
                                    $f_perfil = $res_cr[0]['perfil'];
                                    
                                    ?>
                                        <div class="card mx-2" style="width: 22rem;">
                                            <img src="<?=IMAGEM."fotos/$f_perfil"?>" alt="Foto do Usuario que criou esta oração" height="250">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3" style="font-weight: 500"><?=$titulo?></h5>
                                                <p class="card-text"><?=$descricao?></p>
                                            </div> 
                                        </div>
                                    <?php
                                }
                            } else {
                                echo "Sem movimentação por aqui!";
                            }
                        ?>
                </div>
            </div>
            <div class="modal-footer">
                <!--<a href="index.php?pag=<?=$pag?>&ver-colaboradores-jejum=<?=$id_jejum?>" class="btn btn-primary">Voltar</a>-->
            </div>
        </div>
    </div>
</div>
    

<div class="modal fade" id="ModalGruposCriadosUser" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $id = addslashes($_GET['ver-grupos-usuario-criou']);

                    $_query_ = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$id'");
                    $_res_ = $_query_->fetchAll(PDO::FETCH_ASSOC);
                    $id_jejum = $_res_[0]['id_jejum'];

                    $query = $pdo->query("SELECT * FROM grupos_de_oracao as o JOIN usuarios as u ON o.id_criador = u.id JOIN licenca ON o.id_licenca = licenca.id WHERE id_criador = '$id'");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) {
                        // Dados do Usuário
                        $perfil = $res[0]['perfil'];
                        $nome = $res[0]['nome'];
                        
                        // Dados da Licença
                        $nome_licenca = $res[0]['nome_da_licenca'];
                        $descricao_licenca = $res[0]['descricao_da_licenca'];
                    }
                ?>
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$nome?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-wrap">
                    <?php
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $logo = $res[$i]['logo'];
                                    $titulo = $res[$i]['title'];
                                    $descricao = $res[$i]['descricao'];
                                    $p_participando = $res[$i]['pessoas_part'];
                                    $criado = $res[$i]['criado_em'];
                                    $criado_hora = $res[$i]['hora_criado_em'];
                                    $ativo = $res[$i]['ativo'];
                                    
                                    $criado = implode('/', array_reverse(explode('-', $criado)));
                                    ?>
                                        <div class="card mx-2" style="width: 22rem;">
                                            <img src="<?=IMAGEM."fotos-grupos/$logo"?>" alt="Foto do Grupo" height="250">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3" style="font-weight: 500"><?=$titulo?></h5>
                                                <p class="card-text"><?=$descricao?></p>
                                                <p class="card-text"><?=$p_participando?> Participando - <?=$criado?> às <?=$criado_hora?> - <?=($ativo=='S') ? "Ativo" : "Desativado"?></p>
                                                <hr>
                                                <h5 class="card-title mb-3">LICENÇA - <?=$nome_licenca?></h5><br>
                                                <p><?=$descricao_licenca?></p>
                                            </div> 
                                        </div>
                                    <?php
                                }
                            } else {
                                echo "Sem movimentação por aqui!";
                            }
                        ?>
                </div>
            </div>
            <div class="modal-footer">
                <!--<a href="index.php?pag=<?=$pag?>&ver-colaboradores-jejum=<?=$id_jejum?>" class="btn btn-primary">Voltar</a>-->
            </div>
        </div>
    </div>
</div>
    
<div class="modal fade" id="modalUsuarioParticipandodoGrupo" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $id = addslashes($_GET['ver-grupos-participando']);

                    $_query_ = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$id'");
                    $_res_ = $_query_->fetchAll(PDO::FETCH_ASSOC);
                    $id_jejum = $_res_[0]['id_jejum'];

                    $query = $pdo->query("SELECT * FROM participando_do_grupo as o JOIN usuarios as u ON o.id_usuario = u.id JOIN grupos_de_oracao as gp ON o.id_grupo = gp.id_group WHERE id_usuario = '$id'");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) {
                        // Dados do Usuário
                        $perfil = $res[0]['perfil'];
                        $nome = $res[0]['nome'];
                    }
                ?>
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$nome?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-wrap">
                    <?php
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $logo = $res[$i]['logo'];
                                    $titulo = $res[$i]['title'];
                                    $descricao = $res[$i]['descricao'];
                                    $p_participando = $res[$i]['pessoas_part'];
                                    $criado = $res[$i]['criado_em'];
                                    $criado_hora = $res[$i]['hora_criado_em'];
                                    $ativo = $res[$i]['ativo'];
                                    
                                    $criado = implode('/', array_reverse(explode('-', $criado)));
                                    ?>
                                        <div class="card mx-2" style="width: 22rem;">
                                            <img src="<?=IMAGEM."fotos-grupos/$logo"?>" alt="Foto do Grupo" height="250">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3" style="font-weight: 500"><?=$titulo?></h5>
                                                <p class="card-text"><?=$descricao?></p>
                                                <p class="card-text"><?=$p_participando?> Participando - <?=$criado?> às <?=$criado_hora?> - <?=($ativo=='S') ? "Ativo" : "Desativado"?></p>
                                                <hr>
                                                <h5 class="card-title mb-3">LICENÇA - <?=$nome_licenca?></h5><br>
                                                <p><?=$descricao_licenca?></p>
                                            </div> 
                                        </div>
                                    <?php
                                }
                            } else {
                                echo "Sem movimentação por aqui!";
                            }
                        ?>
                </div>
            </div>
            <div class="modal-footer">
                <!--<a href="index.php?pag=<?=$pag?>&ver-colaboradores-jejum=<?=$id_jejum?>" class="btn btn-primary">Voltar</a>-->
            </div>
        </div>
    </div>
</div>

<!--SCRIPTS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                        $('#btnbtn-sair-do-jejum'+id_jejum).addClass('btn btn-warning mr-2');
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
                        $('#btnbtn-entrar-do-jejum'+id_jejum).addClass('btn btn-light mr-2');
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

<script>
    function descontinuarColaboracao(id_jejum) {
        $(document).ready(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/descontinuar-colaboracao.php',
                method: 'post',
                data: $('#form-desconfirmar-colaboracao').serialize(),
                success: function(msg) {
                    if ($.isNumeric(msg)) {
                        var Json = JSON.parse(msg);
                        $('#spanpessoascolaborandojejum'+id_jejum).html(Json);

                        $('#mensagem_desconfirmar_colaboracao').addClass('text-success');
                        $('#mensagem_desconfirmar_colaboracao').text('Colaboração Removida com Sucesso! Aperte na Lixeira');
                    } else {
                        alert(msg);
                        $('#mensagem_desconfirmar_colaboracao').addClass('text-danger');
                        $('#mensagem_desconfirmar_colaboracao').text('Colaboração Não Aceita para ser Removida! Tente mais Tarde! Aperto na Lixeira');
                    }
                }
            })
        })
    }
</script>