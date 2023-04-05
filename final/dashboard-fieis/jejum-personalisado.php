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
<div id="addJejumCollapse" class="bg-gradient-primary text-dark mx-auto py-5" style="padding: 0px 150px">
    <form action="#" method="post">
        <div class="col my-2">
            <div class="form-floating">
                <input type="text" name="titulo_jejum" id="titulo_jejum" placeholder="Não Obrigatório" class="form-control">
                <label for="titulo_jejum" class="text-dark">Dê um título para o seu Jejum</label>
            </div>
        </div>
        <div class="col my-2">
            <div class="form-floating">
                <input type="text" name="desc_jejum" id="desc_jejum" placeholder="Obrigatório" class="form-control">
                <label for="desc_jejum" class="text-dark">Dê uma descrição para seu jejum*</label>
            </div>
        </div>
        <div class="col my-2">
            <div class="form-floating">
                <input type="text" name="vers_base" id="vers_base" class="form-control" placeholder="Obrigatório">
                <label for="vers_base" class="text-dark">Dê um versículo chave para seu jejum*</label>
            </div>
        </div>
        <div class="col my-2">
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
                <label for="pastora_comando" class="text-dark">Pastora que estará no comando</label>
            </div>
        </div>
        <div class="col my-2">
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
                <label for="pastor_comando" class="text-dark">Pastor que estará no comando</label>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-right">
                <button type="button" class="btn btn-outline-light" name="btn_salvar" id="btn_salvar">Cadastrar meu Jejum</button>
                <a href="index.php" class="btn btn-secondary">Voltar a pagina inicial</a>
            </div>
        </div>
    </form>
</div>
<div class="d-none" id="divSalvocomExito">
    <h3 class="f-family-Lobster">Seu Jejum foi salvado com exito! <a href="index.php?pag=jejuns_personalizados">Clique Aqui</a> para acessá-lo</h3>
</div>
<div class="p-150px">
    <p>Jejum já cadastrado? <a href="index.php?pag=jejuns_personalizados">Você pode configurá-lo a partir daqui</a></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_salvar').click(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/inserir.php',
                method: 'post',
                data: $('form').serialize(),
                dataType: 'html',
                success: function(msg) {
                    if (msg.trim() == "Jejum Salvo!") {
                        $('#addJejumCollapse').removeClass();
                        $('#addJejumCollapse').addClass('d-none');
                        $('#divSalvocomExito').removeClass();
                        $('#divSalvocomExito').addClass('text-center py-5 bg-gradient-primary');
                    } else {
                        alert(msg);
                    }
                }
            })
        })
    })
</script>
