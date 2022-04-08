<?php 
session_start();
include_once('../conexao.php');

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}

if ($_SESSION['hierc'] == 'cliente') {
    header('Location: ../Cliente/ClientePedidos.php');
}else if ($_SESSION['hierc'] == 'funcionario') {
    header('Location: ../Funcionario/FuncPedidos.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup - Gael</title>
    <link rel="stylesheet" href="../../css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/barra-lateral-css/barra-lateral-css.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/bac-css/bac-css.css">
</head>

<body>
    <div class="bar-lateral">
        <div class="content-bar">
            <div class="super-content">
                <div class="img-acc">
                    <img class="img-acc-user" src="../../images/usuario.jpg" alt="">
                </div>
                <div class="name-system">
                    <span>SYSTEM GAEL</span>
                </div>
            </div>
            <hr>
            <div class="escolhas-bar">
                <div class="sch">
                    <a href="AdminPedidos.php" target="_blank"><i class="fas fa-mail-bulk"
                            style="font-size: 20px;"></i><span>
                            PEDIDOS</span></a>
                </div>
                <div class="sch">
                    <a href="AdminUsers.php" target="_blank"><span><i class="fas fa-users" style="font-size: 20px;"></i>
                            USUÁRIOS</span></a>
                </div>
                <div class="sch">
                    <a href="AdminBackup.php" target="_blank"><span><i class="fas fa-database"
                                style="font-size: 20px;"></i> BACKUP</span></a>
                </div>
                <div class="sch">
                    <a href="../logout.php" target="_blank"><i class="fas fa-sign-out-alt"
                            style="font-size: 20px;"></i><span>
                            SAIR</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="content-super-body">
            <div class="content-user">
                <span>USUARIO</span>
                <img src="../../images/usuario.jpg" class="sch-img">
                <hr>
            </div>
        </div>
        <!-- AQUI VEM O CONTEUDO -->
        <div class="conteudo-body">
            <div class="txt-backup">
                <h2>BACKUP</h2>
                <hr>
                <button class="btn btn-success btnall btnnew">GERAR</button>
            </div>
        </div>
    </div>
</body>
<!-- onclick="window.location.href = '../backup.php' " -->
</html>