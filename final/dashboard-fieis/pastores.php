<?php
require_once('../conexao.php');
@session_start();
$pag = "pastores";
?>

<div class="m-2">
	<a href="index.php?pag=<?=$pastores?>&cadastrar-pastor" class="btn btn-primary">Novo</a>
</div>

<section class="d-flex flex-wrap mx-1 mt-4">
	<?php
		$query = $pdo->query("SELECT * FROM pastores;");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) > 0) {
			for ($i = 0; $i < count($res); $i++) {
				foreach ($res[$i] as $key => $value) {
				}
				$id_pas = $res[$i]['id_pas'];
				$id_insersor = $res[$i]['id_insersor'];
				$perfil_pas = $res[$i]['perfil_pas'];
				$bio_pas = $res[$i]['bio_pas'];
				$nome_pas = $res[$i]['nome_pas'];
				?>
					<div class="card mx-1" style="width: 18rem;">
					 	<img src="<?=IMAGEM."/fotos-pastores/$perfil_pas"?>" class="card-img-top" width="200" height="250" alt="Foto de Perfil do Pastor">
					 	<div class="card-body">
					    	<h5 class="card-title" style="font-size: 20px; font-weight: 700; margin-bottom: 2px" font-weight: 700;"><?=$nome_pas?></h5>
					    	<p class="card-text"><?=$bio_pas?></p>
					    	<a href="#" class="btn btn-primary">Go somewhere</a>
					    	<div class="mt-3">
						    	<?php
						    		if ($id_insersor == $_SESSION['id']) {
						    			?>
						    			 <a href="index.php?pag=<?=$pag?>&upload-foto-pastor=<?=$id_pas?>"><i style="font-size: 22px" class="fa-solid fa-upload text-primary"></i></a>
						    			<?php
						    		}
						    	?>
					    	</div>
					  	</div>
					</div>
				<?php
			}
		}	
	?>
</section>

<!--MODAL-->
<div class="modal fade" id="ModalUploadFotoPerfilPastor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog">
   		<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Foto de Perfil</h1>
    			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<form action="<?=URL_BASE."dashboard-fieis/pastores/foto-perfil.php"?>" method="POST" enctype="multipart/form-data">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col text-center">
	      					<img src="<?=IMAGEM."fotos-pastores/sem-foto.jpg"?>" alt="Foto de Perfil do Pastor" width="200" id="target" name="target">
      						<input type="file" name="perfil_pas" class="form-control mt-2" onchange="carregarImg()">
	      				</div>
	      			</div>
	      		</div>
	      		<div class="modal-footer">
	      			<input type="hidden" name="id_pas" value="<?=$_GET['upload-foto-pastor']?>">
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
	        		<button type="submit" class="btn btn-primary">Salvar</button>
	      		</div>
      		</form>
		</div>
  	</div>
</div>

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