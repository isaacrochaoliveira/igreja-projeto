<?php

require_once('config.php');

try {
    $pdo = new PDO("mysql:host=".SERVER.";port=".PORT.";dbname=".DBNAME.";charset=".CHARSET, ROOT, PASSWORD);
} catch (Exception $ex) {
    echo "Erro na conexão com o Banco!".$ex->getMessage();
}

?>
