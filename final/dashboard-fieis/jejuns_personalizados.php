<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
@session_start();

?>

<div class="mx-3 py-3">
    <?php
    $query = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$_SESSION[id]'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($res) > 0) {
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $id_jejum = $res[$i]['id_jejum'];
            $title = $res[$i]['jejum'];
            $desc = $res[$i]['descricao_jejum'];
            $capa = $res[$i]['imagem'];

            if ($capa == "") {
                $capa = "sem-foto.jpg";
            }
            ?>
            <div class="card" style="width: 18rem;">
                <img src="<?=IMAGEM."/images-jejuns/$capa"?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$title?></h5>
                    <p class="card-text"><?=$desc?></p>
                    <div class="d-flex mx-1">
                        <button type="button" class="btn btn-dark" title="Upload de Imagem" onclick="modalCapa(<?=$id_jejum?>)"><i class="fa-solid fa-cloud-arrow-up" style="color: #fff;"></i></button>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

<!-- MODALS -->
<div class="modal fade" id="modalCapa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?=IMAGEM.'/images-jejuns/sem-foto.jpg'?>" name="target" width="150" id="target" class="text-center" onchange="carregarImg()" alt="Coloaqui sua foto de Perfil aqui">
                <div class="">
                    <input type="file" name="capa" id="capa">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_jejum" id="id_jejum">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function modalCapa(id_jejum) {
        $(document).ready(function() {
            document.getElementById('id_jejum').value = id_jejum;

            $('#modalCapa').modal('show');
        })
    }
</script>
