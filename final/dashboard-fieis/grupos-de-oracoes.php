<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');

$pag = "grupos-de-oracoes";

?>
<div class="d-flex justify-content-around my-3">
	<div>
		<button type="button" class="btn btn-light"><i class="fa-sharp fa-solid fa-plus"></i> Cadastrar Novo Grupo</button>
	</div>
	<div>
		<button class="btn btn-danger"><i class="fa-solid fa-person-walking-arrow-right"></i> Voltar</button>
	</div>
</div>
<section class="d-flex">
	<?php
	$query = $pdo->query("SELECT * FROM grupos_de_oracao");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($res) > 0) {
    	for ($i = 0; $i < count($res); $i++) {
    		foreach ($res[$i] as $key => $chave) {
    		}
            $id = $res[$i]['id_group'];
            $logo = $res[$i]['logo'];
            $title = $res[$i]['title'];
            $desc = $res[$i]['descricao'];
            $criadoEm = $res[$i]['criado_em'];
            $hora_criado_em = $res[$i]['hora_criado_em'];
            $part = $res[$i]['pessoas_part'];

            $criadoEm = implode('/', array_reverse(explode('-', $criadoEm)));

            $query_ujg = $pdo->query("SELECT * FROM participando_do_grupo WHERE id_usuario = '$_SESSION[id]' AND id_grupo = '$id'");
            $res_ujg = $query_ujg->fetchAll(PDO::FETCH_ASSOC);
            $grj = count($res_ujg);

    ?>
    <div class="card mx-3 mt-2" style="width: 18rem;">
	 	<img src="<?=IMAGEM."fotos-grupos/".$logo?>" class="card-img-top" alt="Imagem do Grupo">
	 	<div class="card-body">
	    	<h5 class="card-title"><?=$title?></h5>
	    	<p class="card-text"><?=$desc?></p>
	    	<div class="d-block">
		        <div class="d-flex">
		            <?php
		            if ($grj == 1) {
		                ?>
		                <div id="div_joinTOGROUP<?=$id?>" class="d-none"> 
		                	<a href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>" class="btn btn-primary">Entrar no grupo</a>
		                </div>
		                <div id="div_outTOGROUP<?=$id?>" class="d-block">
		                	<button type="button" onclick="SairdoGrupo(<?=$id?>)" class="btn btn-danger">Sair do Grupo</button>
		                </div>
		                <?php
		            } else if ($grj == 0) {
		                ?>
		                <div id="div_joinTOGROUP<?=$id?>">
		                	<a href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>" class="btn btn-primary">Entrar no grupo</a>
		                </div>
		                <div id="div_outTOGROUP<?=$id?>" class="d-none">
		                	<button type="button" onclick="SairdoGrupo(<?=$id?>)" class="btn btn-danger">Sair do Grupo</button>
		                </div>
		                <?php
		            }
		            ?>
		        </div>
		        <div>
		            <a style="cursor: pointer;" href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>">Mais Detalhes</a>
		        </div>
		    </div>
	  	</div>
	</div>
  	<?php
  		}
  	}
  ?>
</section>

<div class="modal fade" id="modalJoinIntoGruop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sua Oração - <a href="index.php?pag=meus-pedidos-de-oracoes" target="_blank">Ver todas as minhas orações</a></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <?php
                    	$id = addslashes($_GET['jointogroup']);
                        $query = $pdo->query("SELECT * FROM grupos_de_oracao JOIN usuarios ON grupos_de_oracao.id_criador = usuarios.id JOIN cargos ON usuarios.id_cargo = cargos.id_cargo WHERE id_group = '$id'");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                        	for ($i = 0; $i < count($res); $i++) {
                        		foreach ($res[$i] as $key => $chave) {
                        		}
	                            $id = $res[$i]['id_group'];
	                            $logo = $res[$i]['logo'];
	                            $criadoEm = $res[$i]['criado_em'];
	                            $hora_criado_em = $res[$i]['hora_criado_em'];
	                            $part = $res[$i]['pessoas_part'];
	                            $ativo = $res[$i]['ativo'];

	                            // Pegando dados da tabela usuarios
	                            $perfil = $res[$i]['perfil'];
	                            $nome_usuario = $res[$i]['nome'];
	                            $nasc = $res[$i]['nasc'];
	                            $idade = Date("Y") - $nasc;
	                            $estado_civil = $res[$i]['estado_civil'];
	                            $email = $res[$i]['email'];
	                            
	                            // Pegando dados da tabela cargos
	                            $cargo = $res[$i]['cargo'];

	                            // Verificando Entrada no Grupo
	                            $query_ujg = $pdo->query("SELECT * FROM participando_do_grupo WHERE id_usuario = '$_SESSION[id]' AND id_grupo = '$id'");
	                            $res_ujg = $query_ujg->fetchAll(PDO::FETCH_ASSOC);
	                            $grj = count($res_ujg);

	                            $criadoEm = implode('/', array_reverse(explode('-', $criadoEm)));
	                            ?>
	                            <div class="d-flex">
	                                <div class="d-block w-50porc">
	                                    <h4>Dados do Criador do Grupo</h4>
	                                    <div class="d-flex ml-2 mt-2">
	                                        <img class="border-radius" src="<?=UPLOADS.$perfil?>" width="120" height="120" alt="Foto de Perfil do Usuário">
	                                        <div class="ml-3">
	                                            <p style="margin: 0px;">Nome: <?=$nome_usuario?></p>
	                                            <p style="margin: 0px;">Idade: <?=$idade?> Anos</p>
	                                            <p style="margin: 0px;">Estado Civil: <?=$estado_civil?></p>
	                                            <p style="margin: 0px;">E-mail: <?=$email?></p>
	                                            <p style="margin: 0px;">Cargo: <?=$cargo?></p>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="d-block w-50porc">
	                                    <h4>Dados Adicionais do Grupo</h4>
	                                    <div class="d-flex ml-2 mt-2">
	                                        <img src="<?=IMAGEM."fotos-grupos/$logo"?>" alt="Logo Do grupo" width="120">
	                                        <div class="ml-3">
	                                            <p style="margin: 0px;">Criado: <?=$criadoEm?> às <?=$hora_criado_em?></p>
	                                            <p style="margin: 0px;">Participando: <?=$part?> Pessoas</p>
	                                            <p style="margin: 0px;">Status: <?=($ativo == 'S') ? 'Ativo' : 'Fechado' ?></p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <?php
                        	}
                        }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                    if ($ativo == 'N') {
                        ?>
                        <button type="button" class="btn btn-light">Pedir por Reabertura</button>
                        <?php
                    } else if ($ativo == 'S') {
                        if ($grj == 0) {
                        ?>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="fechar-jointogroup" id="fechar-jointogroup">Cancelar Inscrição</button>
                            <button type="button" onclick="EntrarnoGrupo(<?=$id?>)" class="btn btn-success" name="btn-salvar-jointogorup" id="btn-salvar-jointogorup">Confirmar Inscrição</button>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 

if (isset($_GET['jointogroup'])) {
    ?>
    <script type="text/javascript">
        var myModal = new bootstrap.Modal(document.getElementById('modalJoinIntoGruop'), {
            
        })

        myModal.show();
    </script>
    <?php
}

?>

<script type="text/javascript">
	function EntrarnoGrupo(id) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/entrar-grupo.php',
				method: 'post',
				data: {id},
				dataType: 'text',
				success: function(msg) {
					if (msg.trim() == "Sucesso!") {
						$('#fechar-jointogroup').click();
						$('#div_joinTOGROUP'+id).addClass('d-none');
						$('#div_outTOGROUP'+id).addClass('d-block');
					}
					$('#btn-salvar-jointogorup').style.display = 'none';
					$('#fechar-jointogroup').style.display = 'none';
				}
			})
		})
	}
</script>

<script type="text/javascript">
	function SairdoGrupo(id) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/sair-grupo.php',
				method: 'post',
				data: {id},
				dataType: 'text',
				success: function(msg) {
					if (msg.trim() == "Sucesso!") {
						$('#div_joinTOGROUP'+id).removeClass();
						$('#div_outTOGROUP'+id).removeClass();
						$('#div_joinTOGROUP'+id).addClass('d-block');
						$('#div_outTOGROUP'+id).addClass('d-none');
					}
					$('#btn-salvar-jointogorup').style.display = 'block';
					$('#fechar-jointogroup').style.display = 'block';
				}
			})
		})
	}
</script>