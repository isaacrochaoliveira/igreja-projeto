<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
?>
<div class="">
    <button type="button" class="btn btn-primary mx-1 mt-1" data-bs-toggle="modal" data-bs-target="#modalNovaOracao"><i class="fa-solid fa-plus"></i> Nova Oração</button>
</div>
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
                                    <button type="button" title="Nova Oração" style="border: none; color: red; background-color: white; margin: 7px 3px" data-bs-toggle="modal" data-bs-target="#modalNovaOracao">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <a href="index.php?pag=minhas-oracoes&id_pray_edit=<?=$id_oracao?>" style="border: none; color: red; background-color: white; margin: 7px 3px" name="btn_emproposito" id="btn_emprsoposito_<?=$id_oracao?>">
                                        <i class="fa-solid fa-file" style="font-size: 20px;" title="Editar Oração"></i>
                                    </a>
                                    <button onclick="ExcluirOracao(<?=$id_oracao?>)" style="border: none; color: red; background-color: white; margin: 0px 3px" onclick="">
                                        <i class="fa-solid fa-trash" style="font-size: 20px;" title="Excluir Oração"></i>
                                    </button>
                                    <button style="border: none; color: red;background-color: white; margin: 0px 3px" onclick="emProposito(<?=$id_oracao?>)" name="btn_emproposito" id="btn_emproposito_<?=$id_oracao?>">
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

<div class="modal fade" id="modalPrayEdit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sua Oração</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php
                    $pray = addslashes($_GET['id_pray_edit']);
                    $query = $pdo->query("SELECT * FROM oracao WHERE id_pray = '$pray'");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) { 
                        for ($i = 0; $i < count($res); $i++) {
                            foreach ($res[$i] as $key => $value) {
                            }
                            $titulo = $res[0]['titulo'];
                            $descricao = $res[0]['descricao'];
                        }
                    }
                ?>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="col mb-2">
                        <label for="title">Título da sua Oração</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?=$titulo?>">
                    </div>
                    <div class="col mb-2">
                        <label for="desc">Escreva aqui sua oração</label>
                        <textarea rows="3" cols="4" class="form-control" name="desc" id="desc"><?=$descricao?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cat1">1º Categorias</label>
                            <select class="form-select" name="cat1">
                                <?php
                                    $query = $pdo->query("SELECT * FROM categorias");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res) > 0) {
                                        for ($i = 0; $i < count($res); $i++) {
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $id = $res[$i]['id_cat'];
                                            $categoria = $res[$i]['categorias'];

                                            $query_c = $pdo->query("SELECT * FROM oracao_relacionada_com_a_categoria WHERE id_oracao = '$pray' LIMIT 4");
                                            $res_c = $query_c->fetchAll(PDO::FETCH_ASSOC);
                                            $id_1 = $res_c[0]['id_categoria'];
                                            if (($id == $id_1)) {
                                                ?>
                                                <option value="<?=$id?>" selected><?=$categoria?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?=$id?>"><?=$categoria?></option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cat2">2º Categoria</label>
                            <select class="form-select" name="cat2">
                                <?php
                                    $query = $pdo->query("SELECT * FROM categorias");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res) > 0) {
                                        for ($i = 0; $i < count($res); $i++) {
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $id = $res[$i]['id_cat'];
                                            $categoria = $res[$i]['categorias'];

                                            $query_c = $pdo->query("SELECT * FROM oracao_relacionada_com_a_categoria WHERE id_oracao = '$pray' LIMIT 4");
                                            $res_c = $query_c->fetchAll(PDO::FETCH_ASSOC);
                                            $id_1 = $res_c[0]['id_categoria'];
                                            $id_2 = $res_c[1]['id_categoria'];
                                            if (($id == $id_2)) {
                                                ?>
                                                <option value="<?=$id?>" selected><?=$categoria?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?=$id?>"><?=$categoria?></option>
                                                <?php
                                            }
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
                                    $query = $pdo->query("SELECT * FROM categorias");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res) > 0) {
                                        for ($i = 0; $i < count($res); $i++) {
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $id = $res[$i]['id_cat'];
                                            $categoria = $res[$i]['categorias'];

                                            $query_c = $pdo->query("SELECT * FROM oracao_relacionada_com_a_categoria WHERE id_oracao = '$pray' LIMIT 4");
                                            $res_c = $query_c->fetchAll(PDO::FETCH_ASSOC);
                                            $id_3 = $res_c[2]['id_categoria'];
                                            if (($id == $id_3)) {
                                                ?>
                                                <option value="<?=$id?>" selected><?=$categoria?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?=$id?>"><?=$categoria?></option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cat4">4º Categoria</label>
                            <select class="form-select" name="cat4">
                                <?php
                                    $query = $pdo->query("SELECT * FROM categorias");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res) > 0) {
                                        for ($i = 0; $i < count($res); $i++) {
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $id = $res[$i]['id_cat'];
                                            $categoria = $res[$i]['categorias'];

                                            $query_c = $pdo->query("SELECT * FROM oracao_relacionada_com_a_categoria WHERE id_oracao = '$pray' LIMIT 4");
                                            $res_c = $query_c->fetchAll(PDO::FETCH_ASSOC);
                                            $id_4 = $res_c[3]['id_categoria'];
                                            if (($id == $id_4)) {
                                                ?>
                                                <option value="<?=$id?>" selected><?=$categoria?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?=$id?>"><?=$categoria?></option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>                            
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cat1_at" value="<?=$id_1?>">
                    <input type="hidden" name="cat2_at" value="<?=$id_2?>">
                    <input type="hidden" name="cat3_at" value="<?=$id_3?>">
                    <input type="hidden" name="cat4_at" value="<?=$id_4?>">
                    <input type="hidden" name="id_oracao_edit_id" id="id_oracao_edit_id" value="<?=$_GET['id_pray_edit']?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="btn-fechar-pedido_" id="btn-fechar-pedido_">Voltar</button>
                    <button type="button" class="btn btn-success" name="btn-editar-pedido" id="btn-editar-pedido">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNovaOracao" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sua Oração </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="col mb-2">
                        <label for="titulo_novo">Título da sua Oração</label>
                        <input type="text" name="titulo_novo" id="titulo_novo" class="form-control">
                    </div>
                    <div class="col mb-2">
                        <label for="desc_novo">Escreva aqui sua oração</label>
                        <textarea rows="3" cols="4" class="form-control" name="desc_novo" id="desc_novo"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cat1_novo">1º Categorias</label>
                            <select class="form-select" name="cat1_novo">
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
                            <label for="cat2_novo">2º Categoria</label>
                            <select class="form-select" name="cat2_novo">
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
                            <label for="cat3_novo">3º Categorias</label>
                            <select class="form-select" name="cat3_novo">
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
                            <label for="cat4_novo">4º Categoria</label>
                            <select class="form-select" name="cat4_novo">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 

if (isset($_GET['id_pray_edit'])) {
    ?>
    <script type="text/javascript">
        var myModal = new bootstrap.Modal(document.getElementById('modalPrayEdit'), {
            
        })

        myModal.show();
    </script>
    <?php
}
    
?>

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
                url: 'minhas-oracoes/inserir_proposito.php',
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
                url: 'minhas-oracoes/deletar_proposito.php',
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
    $(document).ready(function() {
        $('#btn-editar-pedido').click(function(event) {
            $.ajax({
                url: 'minhas-oracoes/editar_oracao.php',
                method: 'post',
                data: $('form').serialize(),
                dataType: 'text',
                success: function(msg) {
                    alert(msg);
                    window.location = 'index.php?pag=minhas-oracoes';
                }
            })
        }) 
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-salvar-pedido').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "minhas-oracoes/inserir_oracao.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(msg) {
                    alert(msg);
                    window.location = 'index.php?pag=minhas-oracoes';
                }
            })
        })
    });
</script>