<?php
    require_once('../conexao.php');
    require_once('../config.php');
    @session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?=TITLE?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="assets/styles/style.css">
        <style media="screen">
            .copy {
                background-color: #FAFFF2;
                width: 70%;
                margin: 100px auto;
                display: flex;
                padding: 0px 30px;
            } .content {
                margin-left: 10px;
            } .content p {
                font-size: 22px;
            }
        </style>
    </head>
    <body>
        <div class="copy">
            <div class="d-flex flex-column">
                <img src="<?=IMAGEM."fotos/sem-foto.jpg"?>" width="230" height="230" class="my-auto" name="target" id="target">
            </div>
            <div class="content">
                <p>Utilize seu E-mail e sua Senha para iniciar uma sessão e sua senha</p>
                <div class="col-md-8">
                    <label>Nome</label><br>
                    <input type="text" value="<?=$_SESSION['nome']?>" class="form-control" disabled><br>
                    <label>Email</label><br>
                    <input type="email" value="<?=$_SESSION['email']?>" class="form-control" disabled><br>
                    <label>Senha</label><br>
                    <input type="password" value="<?=$_SESSION['senha']?>" class="form-control" disabled>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="perfil" onchange="carregarImg()" class="form-control mt-2">
                        <button type="submit" class="btn btn-primary mt-2">Iniciar Sessão</button>
                        <?php
                            if (isset($_FILES['perfil'])) {
                                $perfil = $_FILES['perfil'];
                                if (!$perfil['tmp_name'] == null) {
                                    if ($perfil['size'] > 2097152) {
                                        die("Tamanho Máxino do arquivo: 2MB");
                                    }

                                    if ($perfil['error']) {
                                        die("Falha no envio de arquivo!");
                                    }

                                    $path = "../assets/img/fotos/";
                                    $arq = uniqid();

                                    $ext = strtolower(pathinfo($perfil['name'], PATHINFO_EXTENSION));
                                    if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
                                        die("Tente as extensões: jpg, png, svg, tiff. <br>Extensão atual: $ext");
                                    } else {
                                        $bool = move_uploaded_file($perfil['tmp_name'], $path.$arq.'.'.$ext);
                                        $name = $arq.'.'.$ext;
                                        $pdo->query("UPDATE usuarios SET perfil = '$name' WHERE id = '$_SESSION[id]'");
                                        echo "<script>location.href = '../dashboard-fieis/index.php'</script>";
                                    }
                                }
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
function carregarImg() {

    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>
