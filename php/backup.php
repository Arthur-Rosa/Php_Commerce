<?php 
session_start();
include_once('conexao.php');

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}

if ($_SESSION['hierc'] == 'cliente') {
    header('Location: ../Cliente/ClientePedidos.php');
}else if ($_SESSION['hierc'] == 'funcionario') {
    header('Location: ../Funcionario/FuncPedidos.php');
}
?>