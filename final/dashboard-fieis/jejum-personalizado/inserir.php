<?php

require_once('../../conexao.php');
@session_start();

$titulo_jejum = addslashes($_POST['titulo_jejum']);
$desc_jejum = addslashes($_POST['desc_jejum']);
$vers_base = addslashes($_POST['vers_base']);
$pastora_comando = addslashes($_POST['pastora_comando']);
$pastor_comando = addslashes($_POST['pastor_comando']);

if ($pastor_comando == "") {
    $pastor_comando = null;
}

if ($pastora_comando == "") {
    $pastora_comando = null;
}

$res = $pdo->prepare("INSERT INTO jejuns SET id_criador_jejum = :id, pastor_comando = :pastor, pastora_comando = :pastora, jejum = :titulo, descricao_jejum = :descr, versiculo_baseado = :vers, data_jejum = :hoje, hora_jejum = :agora");
$res->bindValue(':id', $_SESSION['id']);
$res->bindValue(':pastor', $pastor_comando);
$res->bindValue(':pastora', $pastora_comando);
$res->bindValue(':titulo', $titulo_jejum);
$res->bindValue(':descr', $desc_jejum);
$res->bindValue(':vers', $vers_base);
$res->bindValue(':hoje', date('Y-m-d'));
$res->bindValue(':agora', date('H:i:s'));
if ($res->execute()) {
    $query = $pdo->query("SELECT * FROM jejuns ORDER BY id_jejum DESC");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $id_jejum = $res[0]['id_jejum'];
    if (isset($_FILES['imagem_jejum'])) {
        $perfil = $_FILES['imagem_jejum'];
        if (!$perfil['tmp_name'] == null) {
            if ($perfil['size'] > 2097152) {
                die("Tamanho Máxino do arquivo: 2MB");
            }

            if ($perfil['error']) {
                die("Falha no envio de arquivo!");
            }

            $path = "../../assets/img/images-jejuns/";
            $arq = uniqid();

            $ext = strtolower(pathinfo($perfil['name'], PATHINFO_EXTENSION));
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'svg' && $ext != 'tiff') {
                die("Tente as extensões: jpg, png, svg, tiff. <br>Extensão atual: $ext");
            } else {
                $bool = move_uploaded_file($perfil['tmp_name'], $path.$arq.'.'.$ext);
                $name = $arq.'.'.$ext;
                $pdo->query("UPDATE jejuns SET imagem = '$name' WHERE id_jejum = '$id_jejum'");
                echo "<script>location.href = '../dashboard-fieis/index.php'</script>";
            }
        }
    }
    echo "Jejum Salvo!";
} else {
    echo "ERRO";
}
