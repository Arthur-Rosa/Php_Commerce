<?php
include_once('../conexao.php');
session_start();
include_once('../verify_session.php');

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}
if ($_SESSION['hierc'] == 'funcionario') {
    header('Location: ../Funcionario/FuncPedidos.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Pedido - Gael</title>
    <link rel="stylesheet" href="../../css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/barra-lateral-css/barra-lateral-css.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/cli-css-pedidos/clis-css-pedidos.css">
    <link rel="stylesheet" href="../../css/pedidonew-client-css/pedidonew-client-css.css">
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
        <!-- AQUI VEM O CONTEUDO -->
        <div class="conteudo-body">
            <div class="bg-txt-new">
                <h3>NOVO PEDIDO</h3>
                <hr>
            </div>
            <div class="bg-cadas">
                <form method="post" action="sendToSend.php" enctype="multipart/form-data">
                    <!-- Numero de ordem -->
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php 
                                    $query = "SELECT id FROM pedidos WHERE id_usuario = '".$_SESSION['id']."' ";

                                    $row = mysqli_query($conn, $query);
                                    
                                    if (mysqli_num_rows($row)) {
                                        while ($value = $row->fetch_assoc()) {       
                                            $contador = $value['id'];
                                        }

                                        $contador += 1;
                                        echo $contador;
                                    } else {
                                        $contador = 1;
                                        echo $contador;
                                    }
                                    ?>" disabled>
                                <label for="floatingInputGrid">Número de Ordem</label>
                            </div>
                        </div>
                        <!-- Quantidade de Páginas -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="qtdPagina" required>
                                <label for="floatingInputGrid">QTD PAGINAS</label>
                            </div>
                        </div>
                        <!-- Pinça de chapa -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="pincaChapa" required>
                                <label for="floatingInputGrid">PINÇA DE CHAPA</label>
                            </div>
                        </div>
                    </div>
                    <!-- Tipo de Trabalho -->
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="typeWork" required>
                                <label for=" floatingInputGrid">TIPO DE TRABALHO</label>
                            </div>
                        </div>
                        <!-- Formato de Chapas -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="formatChapa" required>
                                <label for=" floatingInputGrid">FORMATO CHAPAS</label>
                            </div>
                        </div>
                        <!-- Abertura -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="abertura" required>
                                <label for=" floatingInputGrid">ABERTURA</label>
                            </div>
                        </div>
                    </div>
                    <!-- Quantidade de Chapas -->
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="qtdChapas" required>
                                <label for="floatingInputGrid">QTD CHAPAS</label>
                            </div>
                        </div>
                        <!-- Montagem FV -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="montFV" required>
                                <label for="floatingInputGrid">MONTAGEM F / V</label>
                            </div>
                        </div>
                        <!-- Converte CMYK -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="conCMYK" required>
                                <label for="floatingInputGrid">CONVERTE CMYK</label>
                            </div>
                        </div>
                    </div>
                    <!-- Quantidade de Cores -->
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="qtdCores" required>
                                <label for="floatingInputGrid">QTD CORES</label>
                            </div>
                        </div>
                        <!-- Montagem TR -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="montTR" required>
                                <label for="floatingInputGrid">MONTAGEM T / R</label>
                            </div>
                        </div>
                        <!-- Vazio -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="nsei" required>
                                <label for="floatingInputGrid"></label>
                            </div>
                        </div>
                    </div>
                    <!-- Formato Arquivos -->
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="formatArqv" required>
                                <label for="floatingInputGrid">FORMATO ARQUIVOS</label>
                            </div>
                        </div>
                        <!-- Insira seu arquivo -->
                        <div class="col-md">
                            <div class="form-floating">
                            </div>
                        </div>
                        <!-- Formato Papel -->
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" maxlength="60" id="floatingInputGrid" placeholder="" value=""
                                    name="formatPapel" required>
                                <label for="floatingInputGrid">FORMATO PAPEL</label>
                            </div>
                        </div>
                        <!-- Input File -->
                        <div class="form-floating mt-3">
                            <input type="file" name="file" class="form-control" id="floatingInputGrid" placeholder=""
                                value="" required>
                        </div>
                    </div>
                    <!-- Botao Send -->
                    <div class="btn-send">
                        <button type="submit" class="btn btn-success btnnew btnall" id="SendDados"
                            name="SendDados">Enviar</button>

                    </div>
                </form>
                <div class="btn-voltar">
                    <a href="ClientePedidos.php" target="_blank">
                        <button class="btn btn-warning btnall btn-editar">VOLTAR</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>