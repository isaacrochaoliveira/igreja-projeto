<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');

?>

<section class="d-flex mt-60-px mx-3 flex-wrap">
    <div class="d-flex bg-dark mb-3" style="width: 50%;">
        <?php
            $query = $pdo->query("SELECT * FROM oracao JOIN usuarios ON oracao.id_criador = usuarios.id");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if (count($res) > 0) {
                for ($i = 0; $i < count($res); $i++) {
                    foreach ($res[$i] as $key => $value) {
                    }
                    $titulo = $res[$i]['titulo'];
                    $descricao = $res[$i]['descricao'];
                    ?>

                    <img src="<?=IMAGEM."images-web/sem-foto.webp"?>" alt="Sem Foto do Grupo" width="120" height="120">
                    <div class="ml-2">
                        <h1><?=$titulo?></h1>
                        <p><?=$titulo?></p>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</section>
