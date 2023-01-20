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
		<a href="index.php" class="btn btn-danger">Voltar <i class="fa-solid fa-person-walking-arrow-right"></i></a>
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
		        <div class="d-flex justify-content-around mt-2">
		            <a style="cursor: pointer;" href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>">Mais Detalhes</a>
		            <a href="index.php?pag=<?=$pag?>&comoparticipar=<?=$id?>">Como Participar</a>
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


<div class="modal fade" id="modalRegras" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-xl">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Regras & Licença</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        		<?php 
        			$_oracao = addslashes($_GET['comoparticipar']);
        			$query = $pdo->query("SELECT * FROM grupos_de_oracao as g JOIN licenca l ON g.id_licenca = l.id WHERE id_group = '$_oracao'");
        			$res = $query->fetchAll(PDO::FETCH_ASSOC);
        			if (count($res) > 0) {
    					$nome_da_licenca = $res[0]['nome_da_licenca'];
    					$descricao_da_licenca = $res[0]['descricao_da_licenca'];

    					$query_regras = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$_oracao'");
    					$res_regras = $query_regras->fetchAll(PDO::FETCH_ASSOC);
    					if (count($res_regras) > 0) {
    						$_r1 = $res_regras[0]['_regras1'];
    						$_r2 = $res_regras[0]['_regras2'];
    						$_r3 = $res_regras[0]['_regras3'];
    						$_r4 = $res_regras[0]['_regras4'];
    						$_r5 = $res_regras[0]['_regras5'];
    						$_r6 = $res_regras[0]['_regras6'];
    						$_r7 = $res_regras[0]['_regras7'];
    						$_r8 = $res_regras[0]['_regras8'];
    						$_r9 = $res_regras[0]['_regras9'];
    						$_r10 = $res_regras[0]['_regras10'];
    					}
        			}
        		?>
      		</div>
      		<div class="modal-body">
      			<div>
      				<div class="row">
      					<div class="w-50porc">
      						<h5 class="f-family-Lobster f-size-28px">Licença:</h5>
      						<p class="text-card"><?=$nome_da_licenca?> - <?=$descricao_da_licenca?></p>
      					</div>
      					<div class="w-50porc">
      						<h5 class="f-family-Lobster f-size-28px">Regras:</h5>
      						<p class="m-0">1º Regra -> <?=$_r1?></p>
      						<p class="m-0">2º Regra -> <?=$_r2?></p>
      						<p class="m-0">3º Regra  -> <?=$_r3?></p>
      						<p class="m-0">4º Regra -> <?=$_r4?></p>
      						<p class="m-0">5º Regra -> <?=$_r5?></p>
      						<p class="m-0">6º Regra -> <?=$_r6?></p>
      						<p class="m-0">7º Regra -> <?=$_r7?></p>
      						<p class="m-0">8º Regra -> <?=$_r8?></p>
      						<p class="m-0">9º Regra -> <?=$_r9?></p>
      						<p class="m-0">10º Regra -> <?=$_r10?></p>
      					</div>
      				</div>
      			</div>
		    </div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      		</div>
    	</div>
  	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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