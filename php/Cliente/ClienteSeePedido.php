<?php 
    include_once('../conexao.php');
    session_start();

    if (!verificaSessao()) {
        header('Location: ../Login/Login.php');
    }
    if ($_SESSION['hierc'] == 'funcionario') {
        header('Location: ../Funcionario/FuncPedidos.php');
    }

    if (@$_GET['func'] == 'true') {
        $id = $_SESSION['id_pedido'];
        
        if ($_SESSION['status_pedido'] == 3) {
            $query = "UPDATE pedidos SET status_pedido = 4 WHERE id = '$id' ";
            $action = mysqli_query($conn, $query);
        }
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
    <link rel="stylesheet" href="../../css/prod-css/prod-css.css">
    <style>
    .desativado {
        background-color: gray !important;
        border: 1px solid black;
    }
    </style>
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
                    <a href="ClientePedidos.php" target="_blank"><i class="fas fa-mail-bulk"
                            style="font-size: 20px;"></i><span>
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
        <?php

                    $id = $_SESSION['id_pedido'];

                    $query = "SELECT id,nome_usuario,status_pedido,responsavel FROM pedidos WHERE id = '$id' ";

                    $row = mysqli_query($conn, $query);

                    if (mysqli_num_rows($row)) {
                        while ($value = $row->fetch_assoc()) {
                            $pedido = $value['status_pedido'];
                            $resp = $value['responsavel'];
                            $_SESSION['id_pedido'] = $value['id'];
                            $_SESSION['status_pedido'] = $value['status_pedido'];
                          
                    ?>
        <!-- AQUI VEM O CONTEUDO -->
        <div class="conteudo-body">

            <div class="arrow">
                <div class="bc-1">
                    <?php if($pedido == 1){ echo '<i class="fas fa-arrow-down"></i>';}?>
                </div>
                <div class="bc-2">
                    <?php if($pedido == 2){ echo '<i class="fas fa-arrow-down"></i>';}?>
                </div>
                <div class="bc-3">
                    <?php if($pedido == 3){ echo '<i class="fas fa-arrow-down"></i>';}?>
                </div>
                <div class="bc-4">
                    <?php if($pedido == 4){ echo '<i class="fas fa-arrow-down"></i>';}?>
                </div>

            </div>

            <div class="bg-progress">
                <div class="progress">
                    <div class="progress-bar bg-success" role="
                        progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                        <p class="progress-name-bar">ENVIADO</p>
                    </div>
                    <div class="progress-bar <?php if ($pedido == 2 || $pedido == 3 || $pedido == 4) {
                                                            echo '';
                                                        } else {
                                                            echo 'desativado';
                                                        } ?>" role=" progressbar" style="width: 25%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100">
                        <p class="progress-name-bar">PRODUZINDO</p>
                    </div>
                    <div class="progress-bar bg-info <?php if ($pedido == 3 || $pedido == 4) {
                                                                    echo '';
                                                                } else {
                                                                    echo 'desativado';
                                                                } ?>" role="progressbar" style="width: 25%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <p class="progress-name-bar">FINALIZADO</p>
                    </div>
                    <div class="progress-bar bg-success <?php if ($pedido == 4) {
                                                                    echo '';
                                                                } else {
                                                                    echo 'desativado';
                                                                } ?>" role="progressbar" style="width: 25%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                        <p class="progress-name-bar">RECEBIDO</p>
                    </div>

                </div>


                <div class="status-pdp">
                    <div class="txt-cima">
                        <p>STATUS DO PEDIDO</p>
                        <?php 
                        if($pedido == 1){
                            echo '
                            <p class="bellcolor">EM ANALISE</p>
                            </div>
                            <div class="txt-lado">
                                <i class="far fa-bell bellcolor"></i>
                            </div>';
                        } else if ($pedido == 2) {
                                echo '
                            <p class="cogcolor">EM PRODUCAO</p>
                            </div>
                            <div class="txt-lado">
                                <i class="fas fa-cog cogcolor"></i>
                            </div>';
                            } else if ($pedido == 3) {
                                echo '<p class="envelopecolor">ENVIADO</p>
                                </div>
                                <div class="txt-lado">
                                    <i class="far fa-envelope envelopecolor"></i>
                                </div>';
                            } else if ($pedido == 4) {
                                echo '<p class="coincolor">RECEBIDO</p>
                                </div>
                                <div class="txt-lado">
                                    <i class="fas fa-coins coincolor"></i>
                                </div>';
                            }
                        }
                    } ?>

                    </div>
                </div>

                <div class="group-btn">
                    <hr>
                    <?php 
                    $id = $_SESSION['id_pedido'];
                    $query = 'SELECT arquivo FROM pedidos WHERE id = '.$id.' ';
                    $row = mysqli_query($conn, $query);

                    if($arquivo = mysqli_fetch_assoc($row)){
                        $arquivo = $arquivo['arquivo'];
                    }
                    ?>
                    <button class="btn btnall btnwar"
                        onclick="window.location.href='ClientePedidos.php'">VOLTAR</button>
                    <button class="btn btnall btndwd"
                        onclick="window.location.href='baixar.php?arquivo=../Arquivos/<?php echo $arquivo; ?>'">BAIXAR
                        ARQUIVO</button>
                        <button type="button" class="btn btnall btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                DETALHES
                            </button>
                    <hr>
                </div>
                <div class="responsavel-inpt">
                    <form method="get">
                        <?php if($_SESSION['status_pedido'] > 1){
                                echo '
                        <label>RESPONSÁVEL PELO PEDIDO</label>
                        <input class="disable" type="text" name="responsavel" placeholder="Digite seu nome"
                            maxlength="50" value=" '; if ( $resp  != null) {echo $resp ;} else {}; echo ' " disabled> ';} ?>


                    </form>
                    <?php if($_SESSION['status_pedido'] == 3){ echo '
                    <a href="ClienteSeePedido.php?func=true"
                    >
                    <button class="btn btnall btn-success mt-4">PEDIDO ENTREGUE</button></a>
                    <?php '; } ?>
                </div>
            </div>
        </div>

        <?php
                $query = "SELECT * FROM pedidos WHERE id = '$id' ";
                                $row = mysqli_query($conn, $query);

                                if(mysqli_num_rows($row)){
                                    while($v = $row->fetch_assoc()){
                                    $id = $v['id'];
                                        $qtdPaginas = $v['qtdPaginas'];
                                        $pincaChapa = $v['qtdChapas'];
                                        $tWork = $v['tipo_de_trabalho'];
                                        $formatoChapa = $v['formato_chapas'];
                                        $abertura = $v['abertura'];
                                        $qtdChapas = $v['qtdChapas'];
                                        $montagemFv = $v['formatoFV'];
                                        $converteCMYK = $v['converteCMYK'];
                                        $qtdCores = $v['qtdCores'];
                                        $formatTR = $v['formatoTR'];
                                        $num_ordem = $v['numero_da_ordem'];
                                        $formatoArquivo = $v['formato_arquivos'];
                                        $formatoPapel = $v['formatoPapel'];
                                    }
                                }
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Pedido</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $id ?>"
                                    name="qtdPagina" disabled>
                                <label for="floatingInputGrid">NUMERO DA ORDEM</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $qtdPaginas ?>"
                                    name="qtdPagina" disabled>
                                <label for="floatingInputGrid">QTD PAGINAS</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $pincaChapa ?>"
                                    name="pincaChapa" disabled>
                                <label for="floatingInputGrid">PINÇA DE CHAPA</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $tWork ?>"
                                    name="typeWork" disabled>
                                <label for=" floatingInputGrid">TIPO DE TRABALHO</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $formatoChapa ?>"
                                    name="formatChapa" disabled>
                                <label for=" floatingInputGrid">FORMATO CHAPAS</label>
                            </div>
                        
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $abertura ?>"
                                    name="abertura" disabled>
                                <label for=" floatingInputGrid">ABERTURA</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $qtdChapas ?>"
                                    name="qtdChapas" disabled>
                                <label for="floatingInputGrid">QTD CHAPAS</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $montagemFv ?>"
                                    name="montFV" disabled>
                                <label for="floatingInputGrid">MONTAGEM F / V</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $converteCMYK ?>"
                                    name="conCMYK" disabled>
                                <label for="floatingInputGrid">CONVERTE CMYK</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $qtdCores ?>"
                                    name="qtdCores" disabled>
                                <label for="floatingInputGrid">QTD CORES</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $formatTR ?>"
                                    name="montTR" disabled>
                                <label for="floatingInputGrid">MONTAGEM T / R</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $num_ordem ?>"
                                    name="nsei" disabled>
                                <label for="floatingInputGrid"></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $formatoArquivo ?>"
                                    name="formatArqv" disabled>
                                <label for="floatingInputGrid">FORMATO ARQUIVOS</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $formatoPapel ?>"
                                    name="formatPapel" disabled>
                                <label for="floatingInputGrid">FORMATO PAPEL</label>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href= '?' ">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
</body>
<script src="../../js/bts1.js"></script>
<script src="../../js/bts2.js"></script>
</html>

<?php 
/* if ($_SESSION['status_pedido'] == 2) {
                                    echo '
                        <a href="AdminProducao.php?func=puxar&id=<?php echo ' . $value['id'] . '; ?>">
<button type="submit" class="btn btnall btnnew">ENVIAR</button></a>
<button class="btn btnall btndel">OUTRO METODO</button>
<?php ';} */ ?>