<?php
@session_start();

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
require_once('../assets/helpers/datetime.php');
$pag = "grupos-de-oracoes";
$data = date("Y-m-d");
?>
<div class="d-flex justify-content-around my-3">
	<div>
		<a class="btn btn-light" href="index.php?pag=<?=$pag?>&criar-grupo-de-oracao"><i class="fa-sharp fa-solid fa-plus"></i> Cadastrar Novo Grupo</a>
	</div>
	<div>
		<a href="index.php" class="btn btn-danger">Voltar <i class="fa-solid fa-person-walking-arrow-right"></i></a>
	</div>
</div>
<section class="d-flex flex-wrap justify-content-around">
	<?php
	$query = $pdo->query("SELECT * FROM grupos_de_oracao");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($res) > 0) {
    	for ($i = 0; $i < count($res); $i++) {
    		foreach ($res[$i] as $key => $chave) {
    		}
            $id = $res[$i]['id_group'];
            $id_cridor = $res[$i]['id_criador'];
            $logo = $res[$i]['logo'];
            $title = $res[$i]['title'];
            $desc = $res[$i]['descricao'];
            $criadoEm = $res[$i]['criado_em'];
            $hora_criado_em = $res[$i]['hora_criado_em'];
            $part = $res[$i]['pessoas_part'];
            $ativo = $res[$i]['ativo'];

            $criadoEm = implode('/', array_reverse(explode('-', $criadoEm)));

            $query_ujg = $pdo->query("SELECT * FROM participando_do_grupo WHERE id_usuario = '$_SESSION[id]' AND id_grupo = '$id'");
            $res_ujg = $query_ujg->fetchAll(PDO::FETCH_ASSOC);
            $grj = count($res_ujg);
    ?>
    <div class="card mx-2 mt-2" style="width: 18rem;">
	 	<img src="<?=IMAGEM."fotos-grupos/".$logo?>" class="card-img-top" alt="Imagem do Grupo" width="220" height="220">
	 	<div class="card-body" id="divcorGrupo<?=$id?>">
	    	<h5 class="card-title"><?=$title?></h5>
	    	<p class="card-text"><?=$desc?></p>
	    	<?php
	    		if (!($id_cridor == $_SESSION['id'])) {
	    			?>
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
				    </div>
			        <div class="d-flex justify-content-around mt-2">
			            <a style="cursor: pointer;" href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>">Mais Detalhes</a>
			            <a href="index.php?pag=<?=$pag?>&comoparticipar=<?=$id?>">Como Participar</a>
			        </div>
				    <?php
	    		}
			    ?>
		        <?php
		        	if ($id_cridor == $_SESSION['id']) {
		        		?>
	        			<div class="d-flex mt-2">
	        				<a href="index.php?pag=<?=$pag?>&editar-grupo=<?=$id?>" class="btn btn-primary mr-2" title="Editar Grupo"><i class="fa-solid fa-pen"></i></a>
	        				<?php
	        				if ($ativo == 'N') {
	        					?>
	        					<a id="reabrirgrupo" href="index.php?pag=<?=$pag?>&open-grupo=<?=$id?>" class="btn btn-outline-success mr-2" title="Abrir Grupo"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></a>
	        					<a id="fechargrupo" style="display: none;" href="index.php?pag=<?=$pag?>&delete-grupo=<?=$id?>" class="btn btn-outline-danger mr-2" title="Fechar Grupo"><i class="fa-solid fa-trash"></i></a>
	        					<?php
	        				} else if ($ativo == 'S') {
	        					?>
	        					<a id="fechargrupo" href="index.php?pag=<?=$pag?>&delete-grupo=<?=$id?>" class="btn btn-outline-danger mr-2" title="Fechar Grupo"><i class="fa-solid fa-trash"></i></a>
	        					<a id="reabrirgrupo" style="display: none;" href="index.php?pag=<?=$pag?>&open-grupo=<?=$id?>" class="btn btn-outline-success mr-2" title="Abrir Grupo"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></a>
	        					<?php
	        				}
	        				?>
	        				<a href="index.php?pag=<?=$pag?>&anotacoes-grupo=<?=$id?>" class="btn btn-success mr-2" title="Fazer Anotações para os participantes"><i class="fa-solid fa-book-open"></i></a>
	        				<a href="index.php?pag=<?=$pag?>&comments-grupo=<?=$id?>" class="btn btn-dark mr-2" title="Comentários"><i class="fa-regular fa-comment"></i></a>
	        				<a href="index.php?pag=<?=$pag?>&upload-foto-grupo=<?=$id?>" class="btn btn-info mr-2" title="Upload de Foto do Grupo"><i class="fa-solid fa-cloud-arrow-up"></i></a>
        				</div>
        				<div class="d-flex justify-content-around mt-2">
				            <a style="cursor: pointer;" href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>">Mais Detalhes</a>
				            <a href="index.php?pag=<?=$pag?>&comoparticipar=<?=$id?>">Como Participar</a>
			        	</div>
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
	                                        <img class="border-radius" src="<?=UPLOADS.$perfil?>" width="150" height="150" alt="Foto de Perfil do Usuário">
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
				<a href="index.php?pag=<?=$pag?>&ver-anotacoes-grupo=<?=$_oracao?>" class="btn btn-light">Ver Anotações</a>
        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      		</div>
    	</div>
  	</div>
</div>

<div class="modal fade" id="ModalAnotcoesGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-xl">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Anotações</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
				<?php
					$id = addslashes($_GET['ver-anotacoes-grupo']);
					$query = $pdo->query("SELECT * FROM anotacoes WHERE id_group = '$id'");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					if (count($res) > 0) {
						for ($i = 0; $i < count($res); $i++) {
							foreach ($res[$i] as $key => $value) {
							}
							$id_anotacao = $res[$i]['id'];
							$anotacao = $res[$i]['anotacao'];

							?>
								<div id="div-anotacoes-<?=$id_anotacao?>">
									<div class="d-flex mb-2">
										<button onclick="ExcluirAnotacaoGrupo(<?=$id?>, <?=$id_anotacao?>)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
										<button onclick="EditarOracaoClick(<?=$id?>, <?=$id_anotacao?>)" class="btn btn-primary ml-1"><i class="fa-solid fa-pen"></i></button>
										<button type="button" onclick="SalvarAlteracoesAnotacao(<?=$id_anotacao?>)" name="SalvarAlteracoesAnotacao<?=$id_anotacao?>" id="SalvarAlteracoesAnotacao<?=$id_anotacao?>" class="btn btn-success d-none"><i class="fa-solid fa-check"></i></button>
										<div class="d-block" id="mostrando_anotacao_<?=$id_anotacao?>">
											<p class="ml-2" id="mostra_anotacao_<?=$id_anotacao?>"><?=$anotacao?></p>
										</div>
									</div>
								</div>
								<form class="d-none" action="" method="POST" id="editando_anotacao_<?=$id_anotacao?>">
									<div class="row">
										<div class="col">
											<input type="hidden" name="id_anotacao" value="<?=$id_anotacao?>">
											<textarea cols="5" rows="5" name="nova_anotacao" class="form-control ml-2 w-100"><?=$anotacao?></textarea>
										</div>
									</div>
								</form>
							<?php
						}
					}
				?>
		    </div>
      		<div class="modal-footer">
        		<a href="index.php?pag=<?=$pag?>&comoparticipar=<?=$id?>" class="btn btn-secondary">Voltar</a>
      		</div>
    	</div>
  	</div>
</div>


<div class="modal fade" id="modalNovoGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-xl">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Novo Grupo</h1>
        		<div>
        			<h4 id="beforeSendCreateGrupo" class="text-success"></h4>
        		</div>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<form method="POST" action="" enctype="multipart/form-data">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="w-50porc">
	      					<div class="col">
	      						<label>Nome do Grupo</label>
	      						<input type="text" name="titulo_grupo_criar" id="titulo_grupo_criar" class="form-control" placeholder="Não Obrigatório">
	      					</div>
	      					<div class="col">
      							<label>Descrição do Grupo<strong>*</strong></label>
	      						<textarea cols="4" rows="4" class="form-control" placeholder="Obrigatório" name="descricao_grupo_criar" id="descricao_grupo_criar" required></textarea>
	      					</div>
	      					<div class="row">
      							<label class="my-2">Data de Criação e de Fechamento</label>
	      						<div class="col-md-6">
	      							<input type="date" name="criado_em_criado" id="criado_em_criado" class="form-control" value="<?=$data?>">
	      						</div>
	      						<div class="col-md-6">
	      							<input type="date" name="fechadoEm_criado" id="fechadoEm_criado" value="" class="form-control">
	      						</div>
	      					</div>
	      				</div>
	      				<div class="w-50porc">
	      					<h4>Licença</h4>
	      					<select class="form-select mb-2" name="id_licenca_criar">
	      						<?php
	      							$query = $pdo->query("SELECT * FROM licenca;");
	      							$res = $query->fetchAll(PDO::FETCH_ASSOC);
	      							if (count($res) > 0) {
	      								for ($i = 0; $i < count($res); $i++) {
	      									foreach ($res[$i] as $key => $row) {
	      									}
	      									$id_licenca = $res[$i]['id'];
	      									$titulo_da_licenca = $res[$i]['nome_da_licenca'];
	      									$descricao_da_licenca = $res[$i]['descricao_da_licenca'];
											?>
												<option value="<?=$id_licenca?>"><?=$titulo_da_licenca?></option>
											<?php
	      								}
	      							}
	      						?>
	      					</select>
	      					<h4>Regras</h4>
	      					<div class="row">
	      						<div class="col-md-4">
	      							<label>1º Regra</label>
	      							<input type="text" name="_regras1_criar" id="_regras1_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>2º Regra</label>
	      							<input type="text" name="_regras2_criar" id="_regras2_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>3º Regra</label>
	      							<input type="text" name="_regras3_criar" id="_regras3_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>4º Regra</label>
	      							<input type="text" name="_regras4_criar" id="_regras4_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>5º Regra</label>
	      							<input type="text" name="_regras5_criar" id="_regras5_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>6º Regra</label>
	      							<input type="text" name="_regras6_criar" id="_regras6_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>7º Regra</label>
	      							<input type="text" name="_regras7_criar" id="_regras7_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>8º Regra</label>
	      							<input type="text" name="_regras8_criar" id="_regras8_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>9º Regra</label>
	      							<input type="text" name="_regras9_criar" id="_regras9_criar" class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>10º Regra</label>
	      							<input type="text" name="_regras10_criar" id="_regras10_criar"  class="form-control" placeholder="Não Obrigatório">
	      						</div>

	      					</div>
	      				</div>
	      			</div>
			    </div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-right-from-bracket"></i></button>
	        		<button type="button" class="btn btn-success" name="button-criargrupo-create" id="button-criargrupo-create">Criar Grupo <i class="fa-solid fa-check-double"></i></button>
	      		</div>
	      	</form>
    	</div>
  	</div>
</div>


<div class="modal fade" id="EditarGrupoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-xl">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Novo Grupo</h1>
        		<div>
        			<h4 id="beforeSendCreateGrupo" class="text-success"></h4>
        		</div>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<?php
					if (isset($_GET['editar-grupo'])) {
						$id = addslashes($_GET['editar-grupo']);
						$query = $pdo->query("SELECT * FROM grupos_de_oracao WHERE id_group = '$id'");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						if (count($res) > 0) {
							$id_l = $res[0]['id_licenca'];
							$title = $res[0]['title'];
							$descricao = $res[0]['descricao'];

							$query_r = $pdo->query("SELECT * FROM regras_do_grupo WHERE id_grupo = '$id'");
							$res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
							if (count($res_r) > 0) {
								$_r1 = $res_r[0]['_regras1'];
								$_r2 = $res_r[0]['_regras2'];
								$_r3 = $res_r[0]['_regras3'];
								$_r4 = $res_r[0]['_regras4'];
								$_r5 = $res_r[0]['_regras5'];
								$_r6 = $res_r[0]['_regras6'];
								$_r7 = $res_r[0]['_regras7'];
								$_r8 = $res_r[0]['_regras8'];
								$_r9 = $res_r[0]['_regras9'];
								$_r10 = $res_r[0]['_regras10'];
							}
						}
					}
				?>
      		</div>
      		<form method="POST" action="" enctype="multipart/form-data">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="w-50porc">
	      					<div class="col">
	      						<label>Nome do Grupo</label>
	      						<input type="text" name="titulo_grupo" id="titulo_grupo" value="<?=@$title?>" class="form-control" placeholder="Não Obrigatório">
	      					</div>
	      					<div class="col">
      							<label>Descrição do Grupo<strong>*</strong></label>
	      						<textarea cols="4" rows="4" class="form-control" placeholder="Obrigatório" name="descricao_grupo" id="descricao_grupo" required><?=@$descricao?></textarea>
	      					</div>
	      					<div class="row">
      							<label class="my-2">Data de Criação e de Fechamento</label>
	      						<div class="col-md-6">
	      							<input type="date" name="criado_em" id="criado_em" class="form-control" value="<?=$data?>">
	      						</div>
	      						<div class="col-md-6">
	      							<input type="date" name="fechadoEm" id="fechadoEm" value="" class="form-control">
	      						</div>
	      					</div>
	      				</div>
	      				<div class="w-50porc">
	      					<h4>Licença</h4>
	      					<select class="form-select mb-2" name="id_licenca" disabled>
	      						<?php
	      							$query = $pdo->query("SELECT * FROM licenca;");
	      							$res = $query->fetchAll(PDO::FETCH_ASSOC);
	      							if (count($res) > 0) {
	      								for ($i = 0; $i < count($res); $i++) {
	      									foreach ($res[$i] as $key => $row) {
	      									}
	      									$id_licenca = $res[$i]['id'];
	      									$titulo_da_licenca = $res[$i]['nome_da_licenca'];
	      									$descricao_da_licenca = $res[$i]['descricao_da_licenca'];

											if ($id_licenca == $id_l) {
												?>
												<option value="<?=$id_licenca?>" selected><?=$titulo_da_licenca?></option>
												<?php
											} else {
												?>
												<option value="<?=$id_licenca?>"><?=$titulo_da_licenca?></option>
												<?php
											}

	      									?>
	      									<?php
	      								}
	      							}
	      						?>
	      					</select>
	      					<h4>Regras</h4>
	      					<div class="row">
	      						<div class="col-md-4">
	      							<label>1º Regra</label>
	      							<input type="text" name="_regras1" id="_regras1" value="<?=@$_r1?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>2º Regra</label>
	      							<input type="text" name="_regras2" id="_regras2" value="<?=@$_r2?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>3º Regra</label>
	      							<input type="text" name="_regras3" id="_regras3" value="<?=@$_r3?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>4º Regra</label>
	      							<input type="text" name="_regras4" id="_regras4" value="<?=@$_r4?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>5º Regra</label>
	      							<input type="text" name="_regras5" id="_regras5" value="<?=@$_r5?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>6º Regra</label>
	      							<input type="text" name="_regras6" id="_regras6" value="<?=@$_r6?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>7º Regra</label>
	      							<input type="text" name="_regras7" id="_regras7" value="<?=@$_r7?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>8º Regra</label>
	      							<input type="text" name="_regras8" id="_regras8" value="<?=@$_r8?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>9º Regra</label>
	      							<input type="text" name="_regras9" id="_regras9" value="<?=@$_r9?>"  class="form-control" placeholder="Não Obrigatório">
	      						</div>
	      						<div class="col-md-4">
	      							<label>10º Regra</label>
	      							<input type="text" name="_regras10" id="_regras10"  value="<?=@$_r10?>" class="form-control" placeholder="Não Obrigatório">
	      						</div>

	      					</div>
	      				</div>
	      			</div>
			    </div>
	      		<div class="modal-footer">
					<input type="hidden" name="id_group" value="<?=$id?>">
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-right-from-bracket"></i></button>
	        		<button type="button" class="btn btn-success" name="button-criargrupo-create" id="button-editargrupo-create">Editar Grupo <i class="fa-solid fa-check-double"></i></button>
	      		</div>
	      	</form>
    	</div>
  	</div>
</div>

<div class="modal fade" id="ModalDeletarGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Tem Certeza?</h1>

        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        		<?php
        			$id = addslashes($_GET['delete-grupo']);
        		?>
      		</div>
      		<div class="modal-body">
        		<h4>Deseja realmente fechar esse Grupo?</h4>
        		<p>Pessoas poderão pedir para reabrir caso esteja fechado!</p>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-outline-success" id="btn-fechar-excluir-grupo" data-bs-dismiss="modal">Deixar Aberto</button>
        		<button type="button" class="btn btn-danger" onclick="ExcluirGrupo(<?=$id?>)">Fechar Grupo</button>
      		</div>
    	</div>
  	</div>
</div>


<div class="modal fade" id="ModalCriarAnotacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-xl">
    	<div class="modal-content">
      		<div class="modal-header">
				<?php
					$id = addslashes($_GET['anotacoes-grupo']);
					$query = $pdo->query("SELECT * FROM grupos_de_oracao WHERE id_group = '$id'");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					if (count($res) > 0) {
						$nome = $res[0]['title'];
					}
				?>
        		<h1 class="modal-title fs-5" id="staticBackdropLabel"><?=$nome?></h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
			<form action="" method="POST">
				<div class="modal-body">
					<div class="col">
						<label for="">Coloque todas as suas anotações nesse campo</label>
						<textarea name="anotacao" rows="8" cols="80" class="form-control" placeholder="Anotações"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_group" value="<?=$id?>">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
					<button type="button" name="cadastrar_anotacao" id="cadastrar_anotacao" class="btn btn-light">Criar Anotação</button>
				</div>
			</form>
    	</div>
  	</div>
</div>

<div class="modal fade" id="ModalReabrirGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Reabrir Grupo</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        		<?php
        			$id = addslashes($_GET['open-grupo']);
        		?>
      		</div>
      		<div class="modal-body">
        		<h4>Deseja realmente Abrir esse Grupo?</h4>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-warning" id="btn-fechar-aberto-grupo" data-bs-dismiss="modal">Continuar Fechado</button>
        		<button type="button" class="btn btn-success" name="btn-reabrirgrupo" id="btn-reabrirgrupo" onclick="ReabrirGrupo(<?=$id?>)">Reabrir Agora</button>
      		</div>
    	</div>
  	</div>
</div>

<div class="modal fade" id="ModalUploadLogoGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h1 class="modal-title fs-5" id="staticBackdropLabel">Reabrir Grupo</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        		<?php
        			$id = addslashes($_GET['upload-foto-grupo']);
        			$query = $pdo->query("SELECT * FROM grupos_de_oracao WHERE id_group = '$id'");
        			$res = $query->fetchAll(PDO::FETCH_ASSOC);
        			if (count($res) > 0) {
        				$imagem = $res[0]['logo'];
        			}
        		?>
      		</div>
			<form action="<?=URL_BASE."/dashboard-fieis/$pag/editar-logo.php"?>" method="POST" enctype="multipart/form-data">
	      		<div class="modal-body">
					<div class="alert alert-warning" role="alert">
						Resolução Recomendada: 220x220
					</div>
	      			<img src="<?=IMAGEM."/fotos-grupos/".$imagem?>" alt="Faça Upload da sua logo" width="200" height="200" name="target" id="target">
      				<input type="hidden" name="id" value="<?=$id?>">
					<input type="file" name="logo" onchange="carregarImg()" class="form-control mt-2">
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" id="btn-fechar-aberto-grupo" data-bs-dismiss="modal">Cancelar</button>
	        		<button type="submit" class="btn btn-light">OK</button>
	      		</div>
			</form>
    	</div>
  	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#button-criargrupo-create').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/criar-grupo.php',
				method: "POST",
				data: $('form').serialize(),
				dataType: 'text',
				beforeSend: function() {
					$('#beforeSendCreateGrupo').html("Processando...");
				},
				success: function(msg) {
					if (msg.trim() == "Criado com Sucesso!") {
						window.location = 'index.php?pag='+pag;
					} else {
						alert(msg);
					}
				}
			})
		})
	})
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#button-editargrupo-create').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/editar-grupo.php',
				method: "POST",
				data: $('form').serialize(),
				dataType: 'text',
				beforeSend: function() {
					$('#beforeSendCreateGrupo').html("Processando...");
				},
				success: function(msg) {
					if (msg.trim() == "Criado com Sucesso!") {
						window.location = 'index.php?pag='+pag;
					} else {
						alert(msg);
					}
				}
			})
		})
	})
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

<script type="text/javascript">
	function ExcluirGrupo(id) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/excluir-grupo.php',
				method: 'post',
				data: {id},
				dataType: 'text',
				success: function(msg) {
					if (msg.trim() == "Fechado com Sucesso!") {
						$('#btn-fechar-excluir-grupo').click();
						$('#reabrirgrupo').addClass('d-block');
						$('#fechargrupo').addClass('d-none');
					}
				}
			})
		})
	}
</script>

<script type="text/javascript">
	function ReabrirGrupo(id) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/reabrir-grupo.php',
				method: 'post',
				data: {id},
				dataType: 'text',
				success: function(msg) {
					if (msg.trim() == "Reaberto com Sucesso!") {
						$('#btn-fechar-aberto-grupo').click();
						$('#reabrirgrupo').removeClass();
						$('#fechargrupo').removeClass();
						$('#fechargrupo').addClass('btn btn-outline-danger mr-2 d-block');
						$('#reabrirgrupo').addClass('btn btn-outline-success mr-2 d-none');
					}
				}
			})
		})
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#cadastrar_anotacao').click(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/criar-anotacao.php',
				method: 'post',
				data: $('form').serialize(),
				dataType: 'text',
				success: function(msg) {
					if (msg.trim() == 'Anotação Inserida com Sucesso!') {
						window.location = 'index.php?pag='+pag;
					} else {
						alert(msg);
					}
				}
			})
		})
	})
</script>

<script type="text/javascript">
	function ExcluirAnotacaoGrupo(id_group, id_anotacao) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/excluir-anotacao.php',
				method: 'post',
				data: {id_group, id_anotacao},
				dataType: 'text',
				success: function(msg) {
					if (msg.trim() == 'Excluído com Sucesso!') {
						//window.location = 'index.php?pag='+pag+'&ver-anotacoes-grupo='+id_group;
						$('#div-anotacoes-'+id_anotacao).addClass('d-none');
					} else {
						alert(msg);
					}
				}
			})
		})
	}
</script>

<script type="text/javascript">
	function EditarOracaoClick(id, id_anotacao) {
		$(document).ready(function() {
			$('#editando_anotacao_'+id_anotacao).removeClass();
			$('#SalvarAlteracoesAnotacao'+id_anotacao).removeClass();
			$('#mostrando_anotacao_'+id_anotacao).removeClass();

			$('#editando_anotacao_'+id_anotacao).addClass('d-block w-100porc');
			$('#SalvarAlteracoesAnotacao'+id_anotacao).addClass('btn btn-success d-block ml-1');
			$('#mostrando_anotacao_'+id_anotacao).addClass('d-none');
		})
	}
</script>

<script type="text/javascript">
	function SalvarAlteracoesAnotacao(id_anotacao) {
		$(document).ready(function() {
			var pag = "<?=$pag?>";
			$.ajax({
				url: pag + '/editar-anotacao.php',
				method: 'post',
				data: $('form').serialize(),
				success: function(msg) {
					$('#editando_anotacao_'+id_anotacao).removeClass();
					$('#SalvarAlteracoesAnotacao'+id_anotacao).removeClass();
					$('#mostrando_anotacao_'+id_anotacao).removeClass();

					$('#editando_anotacao_'+id_anotacao).addClass('d-none');
					$('#SalvarAlteracoesAnotacao'+id_anotacao).addClass('d-none');
					$('#mostrando_anotacao_'+id_anotacao).addClass('d-block');

					var Json = JSON.parse(msg);
                    $('#mostra_anotacao_'+id_anotacao).html(msg);
				}
			})
		})
	}
</script>
