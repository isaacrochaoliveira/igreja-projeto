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
    <div class="text-center">
        <div class="header">
            <div class="mx-3">
                <h2>Crie seu jejum, do seu jeito, da sua forma!</h2>
                <hr>
                <h3>Preenche os Dados devidos a baixo</h3>
                <a href="https://wa.me/<?=$telefone?>?text=Paz+Pastor!+Posso+te+ligar?" target="_blank" class="btn btn-success"><?=($telefone).'-'. $nome?></a>
            </div>
        </div>
    </div>
</div>
<div class="w-75porc mx-auto py-3">
    <form class="bg-light" action="#" method="post">
        <div class="row mb-3">
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="titulo_jejum" id="titulo_jejum" placeholder="Não Obrigatório" class="form-control">
                    <label for="titulo_jejum">Dê um título para o seu Jejum</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="desc_jejum" id="desc_jejum" placeholder="Obrigatório" class="form-control">
                    <label for="desc_jejum">Dê uma descrição para seu jejum*</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="vers_base" id="vers_base" class="form-control" placeholder="Obrigatório">
                    <label for="vers_base">Dê um versículo chave para seu jejum*</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" name="pastora_comando">
                        <option value="">SELECIONE SE HOUVER ALGUÉM</option>
                        <?php
                            $query = $pdo->query("SELECT * FROM pastoras");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $id = $res[$i]['id_pas_ras'];
                                    $nome = $res[$i]['nome_pas_ras'];
                                    ?>
                                        <option value="<?=$id?>"><?=$nome?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="pastora_comando">Pastora que estará no comando</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" name="pastor_comando">
                        <option value="">SELECIONE SE HOUVER ALGUÉM</option>
                        <?php
                            $query = $pdo->query("SELECT * FROM pastores");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $id = $res[$i]['id_pas'];
                                    $nome = $res[$i]['nome_pas'];
                                    ?>
                                        <option value="<?=$id?>"><?=$nome?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="pastor_comando">Pastor que estará no comando</label>
                </div>
            </div>
        </div>
    </form>
</div>
