<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
@session_start();

?>

<?php
    $query = $pdo->query("SELECT * FROM jejuns WHERE id_criador_jejum = '$_SESSION[id]'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($res) > 0) {
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $title = $res[$i]['jejum'];
            $capa = $res[$i]['imagem'];

            if ($capa == "") {
                $capa = "sem-foto.jpg";
            }
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?=IMAGEM."/fotos-jejuns/$capa"?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$title?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php
        }
    }
?>
