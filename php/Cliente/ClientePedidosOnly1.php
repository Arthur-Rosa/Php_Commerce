<?php
session_start();
include_once('../conexao.php');

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}
if ($_SESSION['hierc'] == 'funcionario') {
    header('Location: ../Funcionario/FuncPedidos.php');
}

$quantidade = 4;
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

if (@$_GET['func'] == 'puxar') {
    $id = $_GET['id'];

    $_SESSION['id_pedido'] = $id;
    Header('Location: ClienteSeePedido.php');
}

if (@$_GET['num'] == '1') {
    header('Location: ClientePedidosOnly1.php');
}else if (@$_GET['num'] == '2') {
    header('Location: ClientePedidosOnly2.php');
} else if (@$_GET['num'] == '3') {
    header('Location: ClientePedidosOnly3.php');
} else if (@$_GET['num'] == '4') {
    header('Location: ClientePedidosOnly4.php');
}

if(@$_GET['pesquisar'] != null){
    $_SESSION['pesq'] = $_GET['pesquisar'];
    
    echo "<script> window.location.href = 'ClientePesq.php?';</script>";
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Gael</title>
    <link rel="stylesheet" href="../../css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/barra-lateral-css/barra-lateral-css.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/cli-css-pedidos/clis-css-pedidos.css">
    <link rel="stylesheet" href="../../css/a-link/a-link.css">
</head>

<body>
    <div class="bar-lateral">
        <div class="content-bar">
            <div class="super-content">
                <div class="img-acc">
                    <img class="img-acc-user" src="../../images/usuario.jpg" alt="">
                </div>
                <div class="name-system">
                    <span>CLIENTE</span>
                </div>
            </div>
            <hr>
            <div class="escolhas-bar">
                <div class="sch">
                    <!-- <img src="images/Rectangle 13.png" class="sch-img"> --><a href="ClientePedidos.php"
                        target="_blank"><i class="fas fa-mail-bulk" style="font-size: 20px;"></i><span>
                            PEDIDOS</span></a>
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
            <div class="card-group-card">
                <div class="cardD card-aberto" onclick="window.location.href='ClientePedidos.php?num=1'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="far fa-bell bellcolor"></i>

                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php
                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '1' AND id_usuario = '" . $_SESSION['id'] . "' ";
                                                $row = mysqli_query($conn, $query);

                                                if (!mysqli_num_rows($row)) {
                                                    echo '0';
                                                }

                                                if (mysqli_num_rows($row)) {
                                                    while ($value = $row->fetch_assoc()) {
                                                        $tamanho++;
                                                    }
                                                    echo $tamanho;
                                                }

                                                ?></p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="fas fa-retweet"></i> Pedidos Abertos</p>
                    </div>
                </div>
                <div class="cardD card-engr" onclick="window.location.href='ClientePedidos.php?num=2'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="fas fa-cog cogcolor"></i>
                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '2' AND id_usuario = '" . $_SESSION['id'] . "' ";
                                                $row = mysqli_query($conn, $query);

                                                if (!mysqli_num_rows($row)) {
                                                    echo '0';
                                                }

                                                if (mysqli_num_rows($row)) {
                                                    while ($value = $row->fetch_assoc()) {
                                                        $tamanho++;
                                                    }
                                                    echo $tamanho;
                                                }

                                                ?></p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="fas fa-cogs"></i> Pedidos Em Produção</p>
                    </div>
                </div>
                <div class="cardD card-envelope" onclick="window.location.href='ClientePedidos.php?num=3'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="far fa-envelope envelopecolor"></i>
                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '3' AND id_usuario = '" . $_SESSION['id'] . "' ";
                                                $row = mysqli_query($conn, $query);

                                                if (!mysqli_num_rows($row)) {
                                                    echo '0';
                                                }

                                                if (mysqli_num_rows($row)) {
                                                    while ($value = $row->fetch_assoc()) {
                                                        $tamanho++;
                                                    }
                                                    echo $tamanho;
                                                }

                                                ?></p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="fas fa-envelope-open-text"></i> Pedidos Enviados</p>
                    </div>
                </div>
                <div class="cardD card-coin" onclick="window.location.href='ClientePedidos.php?num=4'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="fas fa-coins coincolor"></i>
                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '4' AND id_usuario = '" . $_SESSION['id'] . "' ";
                                                $row = mysqli_query($conn, $query);

                                                if (!mysqli_num_rows($row)) {
                                                    echo '0';
                                                }

                                                if (mysqli_num_rows($row)) {
                                                    while ($value = $row->fetch_assoc()) {
                                                        $tamanho++;
                                                    }
                                                    echo $tamanho;
                                                }

                                                ?></p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="far fa-clock"></i> Pedidos Concluídos</p>
                    </div>
                </div>
            </div>

            <div class="ped-producao">
                <p>PEDIDOS EM ABERTO</p>
                <div class="new-pedido">
                    <a href="ClienteNewPedido.php" target="_blank">
                        <button class="btn btn-success btnnew btnall">NOVO PEDIDO</button>
                    </a>
                    <hr>
                <form method="get">
                    <input type="text" id="assunto" class="form-control mt-3" name="pesquisar" placeholder="Fazer uma Busca">
                    <input type="submit" class="btn btn-success  mt-2" value="Pesquisar">
                </form>
                </div>
                <hr>
                <!-- <p>Não existem Pedidos em aberto!</p> -->

                <?php
                include_once('../conexao.php');

                $query = "SELECT id,status_pedido,id_usuario,nome_usuario FROM pedidos WHERE id_usuario = '" . $_SESSION['id'] . "' AND status_pedido = 1 LIMIT $inicio, $quantidade ";

                $row = mysqli_query($conn, $query);

                if (!mysqli_num_rows($row)) {
                    echo '<h2 style="padding: 30px;"> Sem pedidos no momento ! </h2>';
                }

                $valor = 0;



                if (mysqli_num_rows($row)) {
                    while ($value = $row->fetch_assoc()) {
                        $pedido = $value['status_pedido'];

                ?>

                <div class="pedido-card <?php if ($pedido == 1) {
                                                    echo 'card-aberto';
                                                }
                                                if ($pedido == 2) {
                                                    echo 'card-engr';
                                                }
                                                if ($pedido == 3) {
                                                    echo 'card-envelope';
                                                }
                                                if ($pedido == 4) {
                                                    echo 'card-coin';
                                                }  ?>">
                    <div class="content-pedido">
                        <div class="txt-pedido">
                            <?php if ($pedido == 1) {
                                        echo '<i class="far fa-bell bellcolor"></i>';
                                    }
                                    if ($pedido == 2) {
                                        echo '<i class="fas fa-cog cogcolor"></i>';
                                    }
                                    if ($pedido == 3) {
                                        echo '<i class="far fa-envelope envelopecolor"></i>';
                                    }
                                    if ($pedido == 4) {
                                        echo '<i class="fas fa-coins coincolor"></i>';
                                    }  ?>

                            <p>Pedido Número <?php echo $value['id']; ?></p>
                        </div>
                        <div class="nome-cliente">
                            <div class="txt-cliente">

                                <i class="far fa-clock"></i>
                                <p>Status do Pedido : <?php if ($pedido == 1) {
                                                                    echo 'Aberto';
                                                                }
                                                                if ($pedido == 2) {
                                                                    echo 'Em Produção';
                                                                }
                                                                if ($pedido == 3) {
                                                                    echo 'Enviado';
                                                                }
                                                                if ($pedido == 4) {
                                                                    echo 'Finalizado';
                                                                }  ?></p>
                            </div>
                        </div>
                        <div class="button-producao">
                            <a href="ClientePedidos.php?func=puxar&id=<?php echo $value['id']; ?>">
                                <button class="btn btn-success">Visualizar Pedido</button>
                            </a>
                        </div>
                    </div>
                </div>

                <?php }
                } ?>


                <?php
                //SQL para saber o total
                $sqlTotal   = "SELECT id FROM pedidos WHERE status_pedido = '1' AND id_usuario = '" . $_SESSION['id'] . "' ";
                //Executa o SQL
                $qrTotal    = mysqli_query($conn, $sqlTotal);
                //Total de Registro na tabela
                $numTotal   = mysqli_num_rows($qrTotal);

                if($numTotal > 0){
                    $totalPagina = ceil($numTotal / $quantidade);

                    $exibir = 4;
                    
                    $anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;

                    $posterior = (($pagina + 1) >= $totalPagina) ? $totalPagina : $pagina + 1;
                }

                

                ?>
            </div>
            </main>
            <?php if($numTotal > 0){ ?>
            <div class="navegacao mt">
                <?php
                echo '<a href="?pagina=1">primeira</a> | ';
                echo "<a href=\"?pagina=$anterior\">anterior</a> | ";

                for ($i = $pagina - $exibir; $i <= $pagina - 1; $i++) {
                    if ($i > 0)
                        echo '<a href="?pagina=' . $i . '"> ' . $i . ' </a>';
                }

                echo '<a href="?pagina=' . $pagina . '"><strong>' . $pagina . '</strong></a>';

                for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                    if ($i <= $totalPagina)
                        echo '<a href="?pagina=' . $i . '"> ' . $i . ' </a>';
                }
                ?>
                <?php echo " | <a href=\"?pagina=$posterior\">próxima</a> | ";
                echo "  <a href=\"?pagina=$totalPagina\">última</a>"; ?>

            </div>
            <?php } ?>

        </div>

    </div>
    </div>
</body>

</html>