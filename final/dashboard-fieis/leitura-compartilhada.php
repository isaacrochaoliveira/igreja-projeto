<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
session_start();

$pag = "leitura-compartilhada";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="py-5 mx-5">
    <div class="d-flex justify-content-between">
        <div class="">
            <h1 style="font-size: 36px">Leitura Compartilhada - Grupos</h1>
        </div>
        <div class="">
            <button type="button" name="Leitura" id="Leitura" class="btn btn-primary">Criar seu próprio Grupo</button>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Grupo</th>
                <th scope="col">Plano</th>
                <th scope="col">Criado</th>
                <th scope="col">Ativo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $pdo->query("SELECT * FROM leitura_compartilhada WHERE id_autorLeiCom = '$_SESSION[id]'");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($res) > 0) {
                    for ($i = 0; $i < count($res); $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }
                        $id = $res[$i]['id_leiCom'];
                        $autor = $res[$i]['id_autorLeiCom'];
                        $grupo = $res[$i]['nome_LeiCom'];
                        $plano = $res[$i]['plano_LeiCom'];
                        $ativo = $res[$i]['ativo_LeiCom'];
                        $data = $res[$i]['data_LeiCom'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        ?>
                            <tr>
                                <td><?=$id?></td>
                                <td><?=$autor?></td>
                                <td><?=$grupo?></td>
                                <td><?=$plano?></td>
                                <td><?=$dataF?></td>
                                <td><?=$ativo?></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalCriLeitura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="divbemvindoModal">
                    <h3 class="lobster-two-italic" style="text-transform: uppercase; font-size: 32px; letter-spacing: 2px">Bem Vindo!</h3>
                    <p class="f-family-ComfortaaRegular">Para começar crie o seu grupo de Leitura Compartilhado. Nela, nossos irmãos podem trocar experiências, respostas de orações, e muito mais!</p>
                </div>
                <div class="">
                    <form class="bg-gradient-primary" action="#" method="post" id="formCriarGrupoLeitura">
                        <p>Vamos Lá!</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating is-invalid">
                                        <input type="text" class="form-control" onkeyup="verify()" id="nome_grupo" name="nome_grupo" placeholder="Username">
                                        <label for="nome_grupo" class="text-dark">Username</label>
                                    </div>
                                    <div id="checkNomeGrupo" class="d-none">
                                        Escolha um nome para o seu grupo.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#modalCriLeitura').modal('show');
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#Leitura').click(function() {
            $('#divbemvindoModal').removeClass();
            $('#divbemvindoModal').addClass('d-none');
            $('#modalCriLeitura').modal('show');
        })
    })
</script>

<script type="text/javascript">
    function verify() {
        var nome = $('#nome_grupo').val();
        if (nome === "") {
            $('#nome_grupo').addClass('is-invalid');
            $('#checkNomeGrupo').removeClass();
            $('#checkNomeGrupo').addClass('invalid-feedback text-light');
        } else {
            $('#nome_grupo').removeClass();
            $('#nome_grupo').addClass('form-control');
            $('#checkNomeGrupo').removeClass();
            $('#checkNomeGrupo').addClass('d-none');
        }
    }
</script>
