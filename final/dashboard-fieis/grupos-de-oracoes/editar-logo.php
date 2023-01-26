<?php

require_once('../../conexao.php');

$_logo = $_FILES['logo'];
$id = $_POST['id'];

if ($_logo['size'] > 2097152) {
    die("Tamanho Máxino do arquivo: 2MB");
}

if ($_logo['error']) {
    die("Falha no envio de arquivo!");
}

$path = "../../assets/img/fotos-grupos/";
$arq = uniqid();

$ext = strtolower(pathinfo($_logo['name'], PATHINFO_EXTENSION));
if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
    die("Tente as extensões: .jpg, .png, .svg, .tiff. <br>Extensão atual: $ext");
} else {
    $bool = move_uploaded_file($_logo['tmp_name'], $path.$arq.'.'.$ext);
    $name = $arq.'.'.$ext;
    $pdo->query("UPDATE grupos_de_oracao SET logo = '$name' WHERE id_group = '$id'");
    echo "<script>javascript:history.go(-1)</script>";
}

?>
