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
        $query = $pdo->query("SELECT * FROM oracao JOIN usuarios ON oracao.id_criador = usuarios.id");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) > 0) { 
            for ($i = 0; $i < count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                ?>
                <div class="d-flex mb-3 py-5 px-3" style="width: 50%;">
                    <?php
                    $titulo = $res[$i]['titulo'];
                    $descricao = $res[$i]['descricao'];
                    $imagem = $res[$i]['perfil'];
                    $nome_usuario = $res[$i]['nome'];
                    $nasc = $res[$i]['nasc'];
                    $idade = date('Y') - intVal($nasc);
                    $joelhos_dobrados = $res[$i]['orando'];
                    ?>

                    <img src="<?=UPLOADS.$imagem?>" class="my-auto" alt="Sem Foto de Perfil" width="140" height="140">
                    <div class="ml-2">
                        <span class="span-style-oracao"><?=$titulo?></span>
                        <p class="p-style-oracao"><?=$descricao?></p>
                        <p class="nome-style-oracao"><?=$nome_usuario." - ". $idade. " Anos(s) "?></p>
                        <p><i class="fa-solid fa-person-praying"></i><?=" Joelhos Dobrados: ".$joelhos_dobrados?></p>
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

