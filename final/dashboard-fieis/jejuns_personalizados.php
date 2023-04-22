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
                    	<button type="button" class="btn btn-light ml-2" title="Ver Informações adicionais" onclick="modalInformation(<?=$id_jejum?>)"><i class="fa-solid fa-file-zipper"></i></button>
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
                    <button type="button" name="btnfecharmodalphoto" id="btnfecharmodalphoto" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" name="btnfotocapa" id="btnfotocapa" class="btn btn-primary">Upload</button>
                	<?php
						if (isset($_FILES['capa'])) {
							$perfil = $_FILES['capa'];
							$id_jejum = addslashes($_POST['id_jejum']);
							if (!$perfil['tmp_name'] == null) {
								if ($perfil['size'] > 2097152) {
									die("Tamanho Máxino do arquivo: 2MB");
								}

								if ($perfil['error']) {
									die("Falha no envio de arquivo!");
								}

								$path = "../assets/img/images-jejuns/";
								$arq = uniqid();

								$ext = strtolower(pathinfo($perfil['name'], PATHINFO_EXTENSION));
								if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
									die("Tente as extensões: jpg, png, svg, tiff. <br>Extensão atual: $ext");
								} else {
									$bool = move_uploaded_file($perfil['tmp_name'], $path.$arq.'.'.$ext);
									$name = $arq.'.'.$ext;
									$pdo->query("UPDATE jejuns SET imagem = '$name' WHERE id_jejum = '$id_jejum'");
									echo "<script>location.href='index.php?pag=jejuns_personalizados'</script>";
								}
							} else {
								"Erro!";
							}
						}
					?>
				</div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetalhesHTML" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><span id="titulo_jejum_d"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<label for="criador">CRIADOR</label>
						<input type="text" name="criador" id="criador" class="form-control"/>
					</div>
					<div class="col-md-4">
						<label for="pastor/a">Pastor(a)</label>
						<input type="text" name="pastor_a" id="pastor_a" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="text" id="id_jejum_d" name="id_jejum_d" class="form-control disabled">
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
	function modalInformation(id_jejum) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/detalhes.php',
				method: 'post',
				data: {id_jejum},
				success: function(result) {
					let array = result.split('@!#');
					$('#criador').val(array[1]);
					$('#titulo_jejum_d').html(array[4]);
					if (array[2] === "") {
						$('#pastor_a').val(array[3]);
					} else {
						$('#pastor_a').val(array[4]);
					}
					document.getElementById('id_jejum_d').value = id_jejum;

					$('#modalDetalhesHTML').modal('show');
				}
			})
		})
	}
</script>