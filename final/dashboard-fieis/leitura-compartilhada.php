<?php

require_once('../protect.php');
require_once('../config.php');
require_once('../conexao.php');
session_start();

$pag = "leitura-compartilhada";
?>
<div class="py-5 mx-5">
    <h1 style="font-size: 36px">Leitura Compartilhada - Grupos</h1>
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
