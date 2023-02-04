<?php
require_once('../conexao.php');
@session_start();
$pag = "pastores";
?>
<section class="d-flex flex-wrap mx-1">
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
				$nome_pas = $res[$i]['nome_pas'];
				?>
					<div class="card mx-1" style="width: 18rem;">
					 	<img src="<?=IMAGEM."/fotos-pastores/$perfil_pas"?>" class="card-img-top" alt="Foto de Perfil do Pastor">
					 	<div class="card-body">
					    	<h5 class="card-title"><?=$nome_pas?></h5>
					    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
      		<form action="<?=URL_BASE."dashboard-fieis/pastores/foto-perfil.phpp"?>" method="POST" enctype="multipart/form-data">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col text-center">
	      					<img src="<?=IMAGEM."fotos-pastores/sem-foto.jpg"?>" alt="Foto de Perfil do Pastor" width="200" id="target" name="target">
      						<input type="file" name="perfil_pas" class="form-control mt-2" onchange="carregarImg()">
	      				</div>
	      			</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary">Understood</button>
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