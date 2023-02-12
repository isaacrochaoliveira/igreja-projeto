<?php

require_once('../../../conexao.php');
@session_start();

$perfil_pas = $_FILES['perfil_pas'];
$id_pas = addslashes($_POST['id_pas']);
$escolha = addslashes($_POST['escolha']);
if (!$perfil_pas['tmp_name'] == null) {
    if ($perfil_pas['size'] > 2097152) {
        die("Tamanho Máxino do arquivo: 2MB");
    }

    if ($perfil_pas['error']) {
        die("Falha no envio de arquivo!");
    }

    $path = "../../../assets/img/fotos-pastores/";
    $arq = uniqid();

    $ext = strtolower(pathinfo($perfil_pas['name'], PATHINFO_EXTENSION));
    if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
        die("Tente as extensões: jpg, png, svg, tiff. <br>Extensão atual: $ext");
    } else {
        $bool = move_uploaded_file($perfil_pas['tmp_name'], $path.$arq.'.'.$ext);
        $name = $arq.'.'.$ext;
        if ($escolha == 'view') {
            $pdo->query("UPDATE pastores SET perfil_pas = '$name' WHERE id_pas = '$id_pas'");
        } else {
            if ($escolha = 'view_pas') {
                $pdo->query("UPDATE pastores SET perfil_pas_ras = '$name' WHERE id_pas_ras = '$id_pas'");
            }
        }
        echo "<script>location.href = '../index.php?$escolha=$id_pas'</script>";
    }
}
