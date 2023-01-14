<?php

require_once('../../conexao.php');

$titulo = addslashes($_POST['titulo']);
$descricao = addslashes($_POST['desc']);
$categorias1 = addslashes($_POST['cat1']);
$categorias2 = addslashes($_POST['cat2']);
$categorias3 = addslashes($_POST['cat3']);
$categorias4 = addslashes($_POST['cat4']);

$res = $pdo->prepare("")