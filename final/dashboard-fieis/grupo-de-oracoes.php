<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
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
		                <button style="display: block;" type="button" class="btn btn-primary" name="btn-join-group" id="btn-join-group" data-bs-toggle="modal" data-bs-target="#modalJoinIntoGruop">Entrar no grupo</button>
		                <button style="display: none;" type="button" onclick="SairdoGrupo(<?=$id?>)" class="btn btn-danger" name="btn-fechar-jointogorup" id="btn-fechar-jointogorup">Sair do Grupo</button>
		                <?php
		            }
		            ?>
		        </div>
		        <div>
		            <a href="index.php?pag=grupo-de-oracoes">Ver todos os grupos</a><br>
		            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalJoinIntoGruop">Mais Detalhes</a>
		        </div>
		    </div>
	  	</div>
	</div>
  	<?php
  		}
  	}
  ?>
</section>