<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
@session_start();

$pag = 'jejuns-personalizados';

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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sua capa do Jejum</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-photo" method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="<?=IMAGEM.'/images-jejuns/sem-foto.jpg'?>" name="target" width="250" id="target" class="text-center" alt="Coloaqui sua foto de Perfil aqui">
                    </div>
                    <div class="text-center mt-3">
                        <input type="file" name="capa" id="capa" onchange="carregarImg()">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_jejum" id="id_jejum">
                    <button type="button" name="btnfecharmodalphoto" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="button" name="btnfotocapa" class="btn btn-primary">Upload</button>
                </div>
            </form>
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

<script type="text/javascript">
function carregarImg() {

    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>

<script>
    $(document).ready(function() {
        $('btnfotocapa').click(function() {
            var pag = "<?=$pag?>";
			var assets = "<?=IMAGEM?>";
            $.ajax({
                url: pag + '/inserir_photo.php',
                method: 'post',
                data: $('#form-edit-photo').serialize(),
                dataType: 'html',
                success: function(msg) {
					alert(msg);
					let array = msg.split('@#!-');
                    if (array[0] == "Foto Inserida com Sucesso!") {
						$('#btnfecharmodalphoto').click();
						$('#file').attr('src', assets + '/images-jejuns/' + array[1]);
                    } else {
						alert(array[0]);
					}
                }
                
            })
        })
    })
</script>
