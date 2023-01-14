<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');

?>
<div class="mt-5 ml-2">
    <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalNovaOracao"><i class="fa-solid fa-plus"></i> Nova Oração</button>
</div>
<section class="d-flex mt-60-px mx-3 flex-wrap">
    <?php
        $query = $pdo->query("SELECT * FROM oracao as o JOIN usuarios as u ON o.id_criador = u.id");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) > 0) { 
            for ($i = 0; $i < count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                ?>
                <div class="d-flex mb-3 py-5 px-3" style="width: 50%;">
                    <?php
                    $id_oracao = $res[$i]['id_pray'];
                    $titulo = $res[$i]['titulo'];
                    $descricao = $res[$i]['descricao'];
                    $imagem = $res[$i]['perfil'];
                    $nome_usuario = $res[$i]['nome'];
                    $nasc = $res[$i]['nasc'];
                    $idade = date('Y') - intVal($nasc);
                    $joelhos_dobrados = $res[$i]['orando'];
                    ?>

                    <img src="<?=UPLOADS.$imagem?>" class="my-auto" alt="Sem Foto de Perfil" width="150" height="150">
                    <div class="ml-2">
                        <span class="span-style-oracao"><?=$titulo?></span>
                        <p class="p-style-oracao"><?=$descricao?></p>
                        <p style="margin-bottom: -4px"><i class="fa-solid fa-person-praying"></i><?=" Joelhos Dobrados: ".$joelhos_dobrados?></p>
                        <p>Categoria: 
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
    ?>
</section>

<div class="modal fade" id="modalNovaOracao" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <label for="title">Título da sua Oração</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

