<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');

$pag = "grupo-de-oracoes";

?>
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
		                <button type="button" class="btn btn-primary" style="display: none;" name="btn-join-group" id="btn-join-group" data-bs-toggle="modal" data-bs-target="#modalJoinIntoGruop">Entrar no grupo</button>
		                <button type="button" onclick="SairdoGrupo(<?=$id?>)" style="display: block;" type="button" class="btn btn-danger" name="btn-fechar-jointogorup" id="btn-fechar-jointogorup">Sair do Grupo</button>
		                <?php
		            } else if ($grj == 0) {
		                ?>
		                <a href="index.php?pag=<?=$pag?>&jointogroup=<?=$id?>" class="btn btn-primary">Entrar no grupo</a>
		                <button style="display: none;" type="button" onclick="SairdoGrupo(<?=$id?>)" class="btn btn-danger" name="btn-fechar-jointogorup" id="btn-fechar-jointogorup">Sair do Grupo</button>
		                <?php
		            }
		            ?>
		        </div>
		        <div>
		            <a href="index.php?pag=grupo-de-oracoes">Ver todos os grupos</a><br>
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
                    	$id = $_GET['jointogroup'];
                        $query = $pdo->query("SELECT * FROM grupos_de_oracao JOIN usuarios ON grupos_de_oracao.id_criador = usuarios.id JOIN cargos ON usuarios.id_cargo = cargos.id_cargo LIMIT 1");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                            $id = $res[0]['id_group'];
                            $logo = $res[0]['logo'];
                            $criadoEm = $res[0]['criado_em'];
                            $hora_criado_em = $res[0]['hora_criado_em'];
                            $part = $res[0]['pessoas_part'];
                            $ativo = $res[0]['ativo'];

                            // Pegando dados da tabela usuarios
                            $perfil = $res[0]['perfil'];
                            $nome_usuario = $res[0]['nome'];
                            $nasc = $res[0]['nasc'];
                            $idade = Date("Y") - $nasc;
                            $estado_civil = $res[0]['estado_civil'];
                            $email = $res[0]['email'];
                            
                            // Pegando dados da tabela cargos
                            $cargo = $res[0]['cargo'];

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
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="idJoinToGroup" value="-1">
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
                method: "POST",
                data: {id},
                dataType: 'text',
                success: function(msg) {
                    if (msg.trim() == 'Sucesso!') {
                        $('#fechar-jointogroup').click();
                        document.getElementById('btn-join-group').style.display = 'none';
                        document.getElementById('btn-fechar-jointogorup').style.display = 'block';
                    }
                    document.getElementById('btn-salvar-jointogorup').style.display = 'none';
                    document.getElementById('fechar-jointogroup').style.display = 'none';
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
                url: pag + "/sair-grupo.php",
                method: "post",
                data: {id},
                dataType: 'text',
                success: function(msg) {
                    if (msg.trim() == "Sucesso!") {
                        document.getElementById('btn-join-group').style.display = 'block';
                        document.getElementById('btn-fechar-jointogorup').style.display = 'none';
                    }
                    document.getElementById('btn-salvar-jointogorup').style.display = 'block';
                    document.getElementById('fechar-jointogroup').style.display = 'block';
                }
            })
        })
    }
</script>