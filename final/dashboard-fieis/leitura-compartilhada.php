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
                <th scope="col">Membros</th>
                <th scope="col">Criado</th>
                <th scope="col" style="width: 0px"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $pdo->query("SELECT * FROM leitura_compartilhada JOIN usuarios ON leitura_compartilhada.id_autorLeiCom = usuarios.id WHERE id_autorLeiCom = '$_SESSION[id]'");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($res) > 0) {
                    for ($i = 0; $i < count($res); $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }
                        $id = $res[$i]['id_leiCom'];
                        $autor = $res[$i]['nome'];
                        $grupo = $res[$i]['nome_LeiCom'];
                        $plano = $res[$i]['plano_LeiCom'];
                        $ativo = $res[$i]['ativo_LeiCom'];
                        $membros = $res[$i]['part_indLei'];
                        $data = $res[$i]['data_LeiCom'];
                        $lancamento = $res[$i]['data_de_lancamento'];
                        $dataF = implode('/', array_reverse(explode('-', $data)));

                        if ($ativo == "N") {
                            $ativo = "Não Publicado!";
                            $background = 'bg-danger';
                        } else {
                            if ($ativo == "A") {
                                $ativo = "Publicado";
                                $background = 'bg-success';
                            } else {
                                if ($ativo == "S") {
                                    $ativo = "Suspenso";
                                    $background = 'bg-dark';
                                }
                            }
                        }

                        ?>
                            <tr>
                                <th><?=$id?></th>
                                <td><?=$grupo?></td>
                                <td><?=$plano?></td>
                                <td><?=$membros?> Membros</td>
                                <td><?=$dataF?></td>
                                <td onclick="modalInformacoes(<?=$id?>)" style="cursor: pointer;" class="<?=$background?>">
                                    <i class="fa-solid fa-plus"></i>
                                </td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalCriLeitura"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Leiutra Compartilhada</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" id="formLeituraCompartilhada">
                <div class="modal-body">
                    <div class="text-center" id="divbemvindoModal">
                        <h3 class="lobster-two-italic" style="text-transform: uppercase; font-size: 32px; letter-spacing: 2px">Bem Vindo!</h3>
                        <p class="f-family-ComfortaaRegular">Para começar crie o seu grupo de Leitura Compartilhado. Nela, nossos irmãos podem trocar experiências, respostas de orações, e muito mais!</p>
                    </div>
                    <div class="">
                        <p>Vamos Lá!</p>
                        <div class="row mb-3">
                            <div class="col">
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
                        <div class="row mb-3">
                            <div class="col">
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="fa-solid fa-book-bible"></i></span>
                                    <div class="form-floating is-invalid">
                                        <textarea cols="10" rows="80" class="form-control" onkeyup="verifyPlano()" id="plano_de_leitura" name="plano_de_leitura" placeholder="Plano de Leitura"></textarea>
                                        <label for="plano_de_leitura" class="text-dark">Define seu plano</label>
                                    </div>
                                    <div id="checkplanodeleitura" class="d-none">
                                        Defina um plano de leitura para o seu grupo
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col" id="AtivoouInvativo">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-question"></i></span>
                                    <div class="form-floating">
                                        <select name="ativoLeitura" id="ativoLeitura" class="form-select" onchange="AtivoouInativo()">
                                            <option value="S">Ativo</option>
                                            <option value="N">Inativo</option>
                                        </select>
                                        <label for="plano_de_leitura" class="text-dark">Seu grupo ficará ativo ou inativo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="DataLancamento">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                    <div class="form-floating">
                                        <input type="date" name="data_de_lancamento" id="data_de_lancamento" placeholder="Data de Lançamento" class="form-control">
                                        <label for="data_de_lancamento">Data de lançamento do grupo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-none" role="alert" id="somethingwrong">
                        <span id="text_danger"></span>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="button" class="btn btn-primary" id="btnEnviarFormLeitura">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detalhesLeituraCompartilhada"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detalhes do Grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark text-light">
                <div class="row">
                    <div class="col-md-9">
                        <label for="">GRUPO</label>
                        <input type="text" name="grupo" id="grupo" class="form-control">
                        <label for="" class="mt-3">PLANO</label>
                        <textarea name="name" rows="5" cols="74"></textarea>
                    </div>
                    <div class="col-md-3">
                        <img src="../assets/img/fotos/sem-foto.jpg" alt="Perfil do Usuario" id="userLeitura" width="180">
                        <label for="" class="mt-3">CRIADOR DO GRUPO</label>
                        <input type="text" name="criador" id="criador">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-primary" id="btnEnviarFormLeitura">Enviar</button>
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
            $('#checkNomeGrupo').addClass('invalid-feedback');
        } else {
            $('#nome_grupo').removeClass();
            $('#nome_grupo').addClass('form-control');
            $('#checkNomeGrupo').removeClass();
            $('#checkNomeGrupo').addClass('d-none');
        }
    }
    function verifyPlano() {
        var plano = $('#plano_de_leitura').val();
        if (plano === "") {
            $('#plano_de_leitura').addClass('is-invalid');
            $('#checkplanodeleitura').removeClass();
            $('#checkplanodeleitura').addClass('invalid-feedback');
        } else {
            $('#plano_de_leitura').removeClass();
            $('#plano_de_leitura').addClass('form-control');
            $('#checkplanodeleitura').removeClass();
            $('#checkplanodeleitura').addClass('d-none');
        }
    }
    function AtivoouInativo() {
        var ativo = $('#ativoLeitura').val();
        if (ativo === "N") {
            $('#AtivoouInvativo').removeClass();
            $('#AtivoouInvativo').addClass('col-md-6');
            $('#DataLancamento').removeClass();
            $('#DataLancamento').addClass('col-md-6');
        } else if (ativo === "S") {
            $('#AtivoouInvativo').removeClass();
            $('#AtivoouInvativo').addClass('col');
            $('#DataLancamento').removeClass();
            $('#DataLancamento').addClass('d-none');
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#btnEnviarFormLeitura').click(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/enviar.php',
                method: 'post',
                data: $('#formLeituraCompartilhada').serialize(),
                beforeSend: function() {
                    $('#btnEnviarFormLeitura').text('Enviando...');
                },
                success: function(msg) {
                    if (msg === "ENVIADO") {
                        window.location = 'index.php?pag=leitura-compartilhada';
                    } else {
                        $('#somethingwrong').removeClass();
                        $('#somethingwrong').addClass('alert alert-danger');
                        $('#text_danger').text(msg);
                    }
                }
            })
        })
    })
</script>

<script type="text/javascript">
    function modalInformacoes(id) {
        $(document).ready(function() {
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + '/detalhes.php',
                method: 'post',
                data: {id},
                success: function(msg) {
                    var array = msg.split('!');
                    if (array[0] == 'Modal') {
                        $('#detalhesLeituraCompartilhada').modal('show');
                    } else {
                        alert(array);
                    }
                }
            })
        })
    }
</script>
