<?php
include_once('../conexao.php');
session_start();

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}

if ($_SESSION['hierc'] == 'cliente') {
    header('Location: ../Cliente/ClientePedidos.php');
}

$query = 'SELECT arquivo FROM pedidos WHERE id = '.$_SESSION['id_pedido'].' ';
$row = mysqli_query($conn, $query);

if (mysqli_num_rows($row)) {
    $value = $row->fetch_assoc();
    $arquivo = $value['arquivo'];

    define('DIR_DOWNLOAD', '../Arquivos/');
    $arquivo = filter_var($arquivo, FILTER_SANITIZE_STRING);
    $arquivo = basename($arquivo);
    $caminho_download = DIR_DOWNLOAD . $arquivo;
    if (!file_exists($caminho_download))
        die('Arquivo não existe!');
    header('Content-type: octet/stream');
    header('Content-disposition: attachment; filename="'.$arquivo.'";'); 
    header('Content-Length: '.filesize($caminho_download));
    readfile($caminho_download);
}
?>