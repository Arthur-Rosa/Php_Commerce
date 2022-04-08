<?php
session_start();
include_once('../conexao.php');

if (@$_GET['func'] == 'puxar') {
    $id = $_GET['id'];

    $_SESSION['id_pedido'] = $id;
    Header('Location: FuncProducao.php');
}

if (@$_GET['num'] == '1') {
    header('Location: FuncPedidosOnly1.php');
}

if (@$_GET['num'] == '2') {
    header('Location: FuncPedidosOnly2.php');
}

if (@$_GET['num'] == '3') {
    header('Location: FuncPedidosOnly3.php');
}

if (@$_GET['num'] == '4') {
    header('Location: FuncPedidosOnly4.php');
}

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}

if ($_SESSION['hierc'] == 'cliente') {
    header('Location: ../Cliente/ClientePedidos.php');
}

$quantidade = 4;
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gael</title>
    <link rel="stylesheet" href="../../css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/barra-lateral-css/barra-lateral-css.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-5.15.4-web/css/all.min.css">
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
                    <span>SYSTEM GAEL</span>
                </div>
            </div>
            <hr>
            <div class="escolhas-bar">
                <div class="sch">
                    <!-- <img src="images/Rectangle 13.png" class="sch-img"> --><a href="FuncPedidos.php"
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
        <div class="conteudo-body">
            <div class="card-group-card">

                <div class="cardD card-aberto" onclick="window.location.href='FuncPedidos.php?num=1'">


                    <div class=" content-card-top">
                        <div class="img-card">
                            <i class="far fa-bell bellcolor"></i>

                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '1' ";
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


                <div class="cardD card-engr" onclick="window.location.href='FuncPedidos.php?num=2'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="fas fa-cog cogcolor"></i>
                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                        $tamanho = 0;

                                        $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '2' ";
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
                            </p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="fas fa-cogs"></i> Pedidos Em Produção</p>
                    </div>
                </div>
                <div class="cardD card-envelope" onclick="window.location.href='FuncPedidos.php?num=3'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="far fa-envelope envelopecolor"></i>
                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '3' ";
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
                            </p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="fas fa-envelope-open-text"></i> Pedidos Enviados</p>
                    </div>
                </div>
                <div class="cardD card-coin" onclick="window.location.href='FuncPedidos.php?num=4'">
                    <div class="content-card-top">
                        <div class="img-card">
                            <i class="fas fa-coins coincolor"></i>
                        </div>
                        <div class="txt-card">
                            <p class="tittle">PEDIDOS</p>
                            <p class="number"><?php


                                                $tamanho = 0;

                                                $query = "SELECT status_pedido FROM pedidos WHERE status_pedido = '4' ";
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
                            </p>
                        </div>

                    </div>
                    <div class="bar">
                        <p><i class="far fa-clock"></i> Pedidos Concluídos</p>
                    </div>
                </div>
            </div>

            <div class="ped-producao">
                <!-- Pesquisar -->
                <?php 
                if(@$_GET['pesquisar'] != null){
                    $_SESSION['pesq'] = $_GET['pesquisar'];
                    
                    echo "<script> window.location.href = 'FuncPesq.php?';</script>";
                }
                ?>
                <p>PEDIDOS EM ABERTO</p>
                <hr>
                <h1>Pesquisar</h1>

                <form method="get">
                    <input type="text" id="assunto" class="form-control" name="pesquisar" placeholder="Fazer uma Busca">
                    <input type="submit" class="btn btn-success btnall mt-2" value="Pesquisar">
                </form>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

                <script>
                $(function() {
                    $("#assunto").autocomplete({
                        source: 'proc_pesq_msg.php'
                    });
                });
                </script>

                <?php
                include_once('../conexao.php');

                $query = "SELECT id,status_pedido,id_usuario,nome_usuario FROM pedidos WHERE status_pedido = 1 LIMIT $inicio, $quantidade ";

                $row = mysqli_query($conn, $query);

                if (!mysqli_num_rows($row)) {
                    echo '<h2 style="padding: 30px;"> Sem pedidos no momento ! </h2>';
                }

                $valor = 0;



                if (mysqli_num_rows($row)) {
                    while ($value = $row->fetch_assoc()) {
                        $pedido = $value['status_pedido'];

                        $_SESSION['status_pedido'] = $pedido;
                        

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
                                <i class="far fa-user"></i>
                                <p>Nome do Cliente: <?php echo $value['nome_usuario']; ?></p>
                            </div>
                        </div>
                        <div class="button-producao">
                            <a href="FuncPedidos.php?func=puxar&id=<?php echo $value['id']; ?>">
                                <button class="btn btn-success">Visualizar Pedido</button>
                            </a>
                        </div>
                    </div>
                </div>

                <?php }
                } ?>

                <?php
                //SQL para saber o total
                $sqlTotal   = "SELECT id FROM pedidos WHERE status_pedido = 1";
                //Executa o SQL
                $qrTotal    = mysqli_query($conn, $sqlTotal);
                //Total de Registro na tabela
                $numTotal   = mysqli_num_rows($qrTotal);

                if($numTotal > 0){
                //O calculo do Total de página ser exibido
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
</body>
<script type="javascript" src="js/jquey-3.2.1.min.js"></script>
<script>
$(function() {

    $('div.content-user').click(function() {

        var clicando = $(this).parent().find('ul');
        if (clicando.is(':visible') == false) {

            clicando.fadeIn();
        } else {
            clicando.fadeOut();
        }
    })

})
</script>

</html>