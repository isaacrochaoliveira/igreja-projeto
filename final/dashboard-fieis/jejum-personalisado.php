<?php

require_once('../conexao.php');
require_once('../protect.php');

$pag = 'jejum-personalizado';

$query = $pdo->query("SELECT * FROM pastores;");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    for ($i = 0; $i < count($res); $i++) {
        foreach ($res[$i] as $key => $value) {
        }
        if ($res[$i]['dirigente'] == 'Pastor Dirigente') {
            $telefone = $res[$i]['telefone_pas'];
            $nome = $res[$i]['nome_pas'];
        }
    }
}


?>

<style>
    .jejum {
        font-family: 'SourceSerifMediumItalic';
    }
    .header {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), no-repeat url('../assets/img/images-jejuns/background_jejum.jpg');
        background-size: 100%;
        background-attachment: fixed;
        padding: 180px 0;
        color: white;
    }
</style>

<div class="jejum">
    <div class="header">
        <div class="mx-3">
            <h2>Crie seu jejum, do seu jeito, da sua forma!</h2>
            <hr>
            <h3>Preenche os Dados devidos a baixo</h3>
            <a href="https://wa.me/<?=$telefone?>?text=Paz+Pastor!+Posso+te+ligar?" target="_blank" class="btn btn-success"><?=($telefone).'-'. $nome?></a>
        </div>
    </div>
</div>
