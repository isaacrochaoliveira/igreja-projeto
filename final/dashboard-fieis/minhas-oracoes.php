<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
?>
<section class="d-flex mx-2 flex-wrap" style="margin: 0px;">
    <?php
        $query = $pdo->query("SELECT * FROM oracao as o JOIN usuarios as u ON o.id_criador = u.id");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) > 0) { 
            for ($i = 0; $i < count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                if (($res[$i]['id_criador'] == $_SESSION['id'])) {
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
                        ?>

                        <img src="<?=UPLOADS.$imagem?>" class="my-auto border-radius" alt="Sem Foto de Perfil" width="150" height="150">
                        <div class="ml-2" style="width: 100%;">
                            <div class="d-flex justify-content-between">
                                <span class="span-style-oracao"><?=$titulo?></span>
                                <div class="d-flex flex-wrap">
                                    <button style="border: none; background-color: white; margin: 0px 3px" name="btn_emproposito" id="btn_emprsoposito_<?=$id_oracao?>">
                                        <i class="fa-solid fa-file" style="font-size: 20px;" title="Editar Oração"></i>
                                    </button>
                                    <button onclick="ExcluirOracao(<?=$id_oracao?>)" style="border: none; color: red; background-color: white; margin: 0px 3px" onclick="">
                                        <i class="fa-solid fa-trash" style="font-size: 20px;" title="Excluir Oração"></i>
                                    </button>
                                    <button style="border: none; background-color: white; margin: 0px 3px" onclick="emProposito(<?=$id_oracao?>)" name="btn_emproposito" id="btn_emproposito_<?=$id_oracao?>">
                                        <i id="fa-solid-fa-heart-<?=$id_oracao?>" style="font-size: 20px;" title="Em Propósito" class="fa-regular fa-heart"></i>
                                    </button>
                                    <button style="border: none; background-color: white; display: none; margin: 0px 3px" onclick="desEmProposito(<?=$id_oracao?>)"  name="btn_desemproposito_<?=$id_oracao?>" id="btn_desemproposito_<?=$id_oracao?>">
                                        <i title="Não estou mais em Propósito" class="fa-solid fa-heart" style="font-size: 20px;"></i>
                                    </button>
                                </div>
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

<div class="modal fade" id="modalPrayEdit" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script type="text/javascript">
    function ExcluirOracao(id) {
        $(document).ready(function() {
            var confirma = confirm('Quer Realmente excluir sua oração?');
            if (confirma) {
                $.ajax({
                    url: 'minhas-oracoes/excluir.php',
                    method: 'post',
                    data: {id},
                    dataType: 'text',
                    success: function(msg) {
                        window.location = 'index.php?pag=minhas-oracoes';
                    }
                })
            }
        })
    }
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