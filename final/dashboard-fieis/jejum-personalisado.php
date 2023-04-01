<?php

require_once('../conexao.php');
require_once('../protect.php');

$pag = 'jejum-personalizado';

$query = $pdo->query("SELECT * FROM pastores;");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    for () {
        FOREACH 9) [
            
        ]
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
            <a href="#" class="btn btn-success">Falar com o pastor dirigente</a>
        </div>
    </div>
</div>
