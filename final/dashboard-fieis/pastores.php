<?php
require_once('../conexao.php');
@session_start();
$pag = "pastores";
?>

<div class="m-2">
	<a href="index.php?pag=<?=$pag?>&cadastrar-pastor" class="btn btn-primary">Novo</a>
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
	    					<a href="<?=URL_BASE."/dashboard-fieis/perfil-pastor/index.php?view=".$id_pas?>"><img src="<?=IMAGEM."/fotos-pastores/$perfil_pas"?>" width="30" height="30" alt="Foto de Perfil do Pastor" style="border-radius: 100%";/></a>
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

<div class="modal" id="ModalCadPastores" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php
                    if (!(isset($_GET['cadastrar-pastor']))) {
                        $id_pas = addslashes($_GET['edit-pastor']);
                        $query_pas = $pdo->query("SELECT * FROM pastores WHERE id_pas = '$id_pas'");
                        $res_pas = $query_pas->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_pas) > 0) {
                            $nome = $res_pas[0]['nome_pas'];
                            $email = $res_pas[0]['email_pas'];
                            $nascionalidade = $res_pas[0]['nasionalidade_pas'];
                            $tempo_pas = $res_pas[0]['tempo_pas'];
                            $telefone_pas = $res_pas[0]['telefone_pas'];
                            $profissao = $res_pas[0]['profissao_pas'];
                            $ministerio = $res_pas[0]['ministerio_pas'];
                            $casado_pas = $res_pas[0]['casado_pas'];
                            $qunt_tempo_casado = $res_pas[0]['qunt_casado_pas'];
                            $qunt_menbros = $res_pas[0]['qunt_menbros_pas'];
                        }
                    }
                ?>
            </div>
            <form action="" method="POST" id="FormCadastrarPastor">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome_pas">Nome</label>
                            <input type="text" name="nome_pas" id="nome_pas" class="form-control" placeholder="Nome do Pastor" value="<?=@$nome?>">
                        </div>
                        <div class="col-md-6">
                            <label for="email_pas">E-mail</label>
                            <input type="email" name="email_pas" id="email_pas" class="form-control" placeholder="Email do Pastor" value="<?=@$email?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="nascionalidade_pas">País de Origem</label>
                            <select class="form-select" name="nascionalidade_pas">
                                <?php
                                    $query_pas = $pdo->query("SELECT * FROM country order by nicename desc;");
                                    $res_pas = $query_pas->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res_pas) > 0) {
                                        for ($i = 0; $i < count($res_pas); $i++) {
                                            foreach ($res_as[$i] as $key => $value) {
                                            }
                                            $nicename = $res_pas[$i]['nicename'];
                                            $iso = $res_pas[$i]['iso'];
                                            if ($nascionalidade == $nicename) {
                                                ?>
                                                    <option value="<?=$nicename?>" selected><?=$iso?> - <?=$nicename?></option>
                                                <?php
                                            } else {
                                                ?>
                                                    <option value="<?=$nicename?>"><?=$iso?> - <?=$nicename?></option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tempo_pas">Tempo de Pastoreio</label>
                            <input type="number" name="tempo_pas" id="tempo_pas" class="form-control" placeholder="Tempo" value="<?=@$tempo_pas?>">
                        </div>
                        <div class="col-md-2">
                            <label for="telefone_pas">Telefone</label>
                            <input type="number" name="telefone_pas" id="telefone_pas" class="form-control" placeholder="Telefone do Pastor" value="<?=@$telefone_pas?>">
                        </div>
                        <div class="col-md-3">
                            <label for="profissao_pas">Profeissão</label>
                            <input type="text" name="profissao_pas" id="profissao_pas" class="form-control" placeholder="Profissão" value="<?=@$profissao?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="miniterio_pas">Seu Ministério</label>
                            <input type="text" name="miniterio_pas" id="miniterio_pas" class="form-control" placeholder="Seu Ministério" value="<?=@$ministerio?>">
                        </div>
                        <div class="col-md-3">
                            <label for="casado_pas">Estado Civil</label>
                            <input type="text" name="casado_pas" id="casado_pas" class="form-control" placeholder="Estado Civil" value="<?=@$casado_pas?>">
                        </div>
                        <div class="col-md-2">
                            <label for="qunt_casado_pas">Quanto Temp</label>
                            <input type="number" name="qunt_casado_pas" id="qunt_casado_pas" class="form-control" value="<?=@$qunt_tempo_casado?>">
                        </div>
                        <div class="col-md-3">
                            <label for="qunt_menbros_pas">Qtda de Membros</label>
                            <input type="number" name="qunt_menbros_pas" id="qunt_menbros_pas" class="form-control" value="<?=@$qunt_menbros?>">
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col mt-2">
                    		<textarea cols="5" rows="5" class="form-control" placeholder="SUA BIO (BIOGRAFIA)" name="bio_pas"></textarea>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_pas" id="id_pas" value="<?=@$_GET['edit-pastor']?>">
                    <a href="index.php#pastoresTables" class="btn btn-secondary">Fechar</a>
                    <button type="button" class="btn btn-primary" name="btn_btnCadastrarPastor" id="btn_btnCadastrarPastor">Salvar</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn_btnCadastrarPastor').click(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/inserir_pastor.php',
                method: 'post',
                data: $('#FormCadastrarPastor').serialize(),
                dataType: 'text',
                success: function(msg) {
                    if (msg.trim() == "Pastor Cadastro com Sucesso!") {
                        window.location = 'index.php?pag='+pag+'#pastoresTables';
                    } else {
                        alert(msg);
                    }
                }
            })
        })
    })
</script>