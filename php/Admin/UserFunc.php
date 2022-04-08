<?php
session_start();
include_once('../conexao.php');

if (@$_GET['func'] == 'puxar') {
    $id = $_GET['id'];

    $_SESSION['id_pedido'] = $id;
    Header('Location: AdminProducao.php');
}

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}

if ($_SESSION['hierc'] == 'cliente') {
    header('Location: ../Cliente/ClientePedidos.php');
}

if ($_SESSION['hierc'] == 'funcionario') {
    header('Location: ../Funcionario/FuncPedidos.php');
}

$quantidade = 7;
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Gael</title>
    <link rel="stylesheet" href="../../css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/barra-lateral-css/barra-lateral-css.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/users-css/users-css.css">
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
            <div class="btn-newuser">

                <button class="btn btn-success btnnew btnall"
                    onclick="window.location.href = 'AdminUsers.php?newuser=true'; ">NOVO USUÁRIO</button>

                <button class="btn btn-success btnfuncionarios btnall"
                    onclick="window.location.href = 'UserFunc.php?'; ">FUNCIONÁRIOS</button>


                <button class="btn btn-success btnclientes btnall"
                    onclick="window.location.href = 'UserClint.php'; ">CLIENTES</button>

                <form method="get">
                    <input type="text" class="form-control" name="pesquisar" placeholder="Fazer uma Busca">
                    <br>
                    <input type="submit" class="btn btn-success" value="Pesquisar">

                </form>
            </div>
            <div class="bg-table">
                <table class="table table-responsive table-action">
                    <?php 
                    
                    // arrumar isso aqui

                    if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisarUsuarios'] != ''){
                        $nome = $_GET['txtpesquisarUsuarios'] . '%';                       
                        $query = "SELECT * from usuarios where nome LIKE '$nome' order by nome asc ";

                        $result_count = mysqli_query($conn, $query);

                    }else{
                        $query = "SELECT * from usuarios order by id desc limit 10";

                        $query_count = "SELECT * from usuarios";
                        $result_count = mysqli_query($conn, $query_count);

                    }

                    $result = mysqli_query($conn, $query);
                    
                    $linha = mysqli_num_rows($result);
                    $linha_count = mysqli_num_rows($result_count);

                    if($linha == ''){
                        echo "<h3> Não foram encontrados dados Cadastrados no Banco!! </h3>";
                    }else{

                    
                    ?>
                    <thead class="text-secondary">

                        <th>
                            Nome
                        </th>
                        <th>
                            Senha
                        </th>
                        <th>
                            Nível
                        </th>
                        <th>
                            Editar
                        </th>
                    </thead>
                    <?php 
                    $cliente = 'cliente';$func = 'funcionario';
                    $query = "SELECT id, nome_usuario, senha_usuario, nivel_usuario FROM usuarios WHERE nivel_usuario = 'funcionario' LIMIT $inicio, $quantidade";
                    
                    // 3 - 1 dos registros e o admin

                    // SELECT id, nome_usuario, senha_usuario, nivel_usuario FROM usuarios WHERE nivel_usuario = $cliente OR nivel_usuario = $func

                    $row = mysqli_query($conn, $query);

                    if (mysqli_num_rows($row)) {
                        while ($value = $row->fetch_assoc()) { 
                            if($value['nome_usuario'] == 'admin'){
                                continue;
                            }

                            $nome = $value['nome_usuario'];
                            $senha = $value['senha_usuario'];
                            $level = $value['nivel_usuario'];
                            $id = $value['id'];
                        ?>

                    <tbody>
                        <tr>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $senha; ?></td>
                            <td><?php echo $level; ?></td>
                            <td>
                                <a class="btn btn-warning btn-editar"
                                    href="AdminUsers.php?edt=true&id=<?php echo $id;?>"><i class="fas fa-edit"></i></a>
                                |
                                <a class="btn btn-danger btn-excluir"
                                    href="AdminUsers.php?del=true&id=<?php echo $id;?>"><i
                                        class="fa fa-minus-square"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php }
                    }
                } ?>
                    <tfoot>
                        <tr>
                            <td class="td_edit">
                                <span class="text-muted">Registros:
                                    <?php

$tamanho = 0;

$query = "SELECT id FROM usuarios ";
$row = mysqli_query($conn, $query);

if (!mysqli_num_rows($row)) {
    echo '0';
}

if (mysqli_num_rows($row)) {
    while ($value = $row->fetch_assoc()) {
        $tamanho++;
    }
    echo $tamanho - 1;
}

?>
                                    <?php
//SQL para saber o total
$sqlTotal   = "SELECT id FROM usuarios";
//Executa o SQL
$qrTotal    = mysqli_query($conn, $sqlTotal);
//Total de Registro na tabela
$numTotal   = mysqli_num_rows($qrTotal);

if($numTotal > 0){
//O calculo do Total de página ser exibido
$totalPagina = ceil($numTotal / $quantidade);

$exibir = 2;

$anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;

$posterior = (($pagina + 1) >= $totalPagina) ? $totalPagina : $pagina + 1;

}
?>
            </div>
            </main>
            <?php if($numTotal > 0){ ?>
            <div class="navegacao mt">
                <?php
                        echo '<a href="?pagina=1" style="text-decoration:none;" class="text-muted">primeira</a> | ';

                        echo "<a style='text-decoration:none;' class='text-muted' href=\"?pagina=$anterior\">anterior</a> | ";

                        for ($i = $pagina - $exibir; $i <= $pagina - 1; $i++) {
                            if ($i > 0)
                                echo '<a style="text-decoration:none;" class="text-muted" href="?pagina=' . $i . '"> ' . $i . ' </a>';
                        }

                        echo '<a style="text-decoration:none;" class="text-muted" href="?pagina=' . $pagina . '"><strong>' . $pagina . '</strong></a>';

                        for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                            if ($i <= $totalPagina)
                                echo '<a style="text-decoration:none;" class="text-muted" href="?pagina=' . $i . '"> ' . $i . ' </a>';
                        }
                        ?>
                <?php echo " | <a style='text-decoration:none;' class='text-muted' href=\"?pagina=$posterior\">próxima</a> | ";
                        echo "  <a style='text-decoration:none;' class='text-muted' href=\"?pagina=$totalPagina\">última</a>"; ?>

            </div>
            <?php } ?>
            </span>
            </td>
            </tr>
            </tfoot>
            </table>
        </div>
    </div>
    </div>
</body>

<!-- Passar ID via metodo get e manipular o html atraves disso -->

</html>

<?php 

// deletar user
if(@$_GET['del'] == 'true'){
    $id = $_GET['id'];

    // echo "<script> alert(' aaaaaaaaaaa {.$id.} '); </script>";

    if(isset($id)){
        $query = "DELETE FROM usuarios WHERE id = {$id} ";
        $row = mysqli_query($conn, $query);

        $query = "DELETE FROM pedidos WHERE id_usuario = {$id} ";
        $row = mysqli_query($conn, $query);

        if($row){
            echo "<script> alert('Usuario Deletado com Sucesso!');window.location.href ='AdminUsers.php?';</script>";
        } else {
            echo "<script> alert('Ocorreu um Problema ao Deletar o Usuario');window.location.href ='AdminUsers.php?';</script>";
        }
    }
}

if(@$_GET['edt']){
    $id = $_GET['id'];
    
    $query = "SELECT * FROM usuarios WHERE id = '$id' ";
	$result = mysqli_query($conn, $query);
    
	while($res = mysqli_fetch_array($result)){
        $id = $res['id'];
        $nome = $res['nome_usuario'];
        $senha = $res['senha_usuario'];
        $nivel = $res['nivel_usuario'];
		?>

<!-- Modal Editar -->
<div id="modalEditar" style="opacity: 100%; top: 100px;" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title">Usuário</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">

                    <div class="form-group">
                        <label for="id_produto">Numero de usuario</label>
                        <input type="text" id="iduser" class="form-control mr-2" name="numero_id"
                            value="<?php echo $id ?>" placeholder="Nome" required>
                    </div>

                    <div class="form-group">
                        <label for="id_produto">Nome</label>
                        <input type="text" class="form-control mr-2" name="nome" value="<?php echo $nome ?>"
                            placeholder="Nome" required>
                    </div>

                    <div class="form-group">
                        <label for="id_produto">Senha</label>
                        <input type="text" class="form-control mr-2" name="senha" placeholder="Usuário"
                            value="<?php echo $senha ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="fornecedor">Nivel de Usuario</label>
                        <!-- <input type="text" class="form-control mr-2" name="nivel_usuario" placeholder="Senha"
                            value="<?php echo $nivel ?>" required> -->

                        <select name="select">
                            <?php 
                            if($nivel == 'cliente'){
                                echo '<option value="0">Cliente</option>
                                <option value="1">Funcionario</option>';
                            } else {
                                echo '<option value="0">Funcionario</option>
                                <option value="2">Cliente</option>';
                            }
                            ?>

                        </select>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success mb-3" name="editar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

        if(isset($_POST['editar'])){
            // $id = $_POST['numero_id'];
            $nome_inp = $_POST['nome'];
            $senha_inp = $_POST['senha'];
            $nivel_inp = $res['nivel_usuario'];
            $select = $_POST['select'];

            if($select == 1){
                $nivel_inp = 'funcionario';
            } else if ($select == 2){
                $nivel_inp = 'cliente';
            } else {
                $nivel_inp = $res['nivel_usuario'];   
            }
            
            // $res['nome_usuario'];
            // $res['senha_usuario'];
            // $res['nivel_usuario'];

            if($res['nome_usuario'] != $nome_inp){
                $query = "SELECT nome_usuario FROM usuarios WHERE nome_usuario = '$nome_inp' ";
                $aciona = mysqli_query($conn, $query);
                $row = mysqli_num_rows($aciona);
                if($row > 0){
                    echo "<script language='javascript'>alert('Nome de usuario ja existente');</script>";
                    
                } else {
                    $query = "UPDATE usuarios SET nome_usuario = '$nome_inp', senha_usuario = '$senha_inp', nivel_usuario = '$nivel_inp' WHERE id = '$id' ";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        echo "<script>window.alert('Atualizado com sucesso!!!');window.location.href ='AdminUsers.php?';</script>";
                        exit();   
                    }
                }
            }
        }
    }
}

if(@$_GET['pesquisar'] != null){
    $_SESSION['pesq'] = $_GET['pesquisar'];

    echo "<script>
    window.location.href = 'PesqUser.php?';
    </script>";
}

?>

<!-- MODAL ADICIONAR -->

<?php 

if(@$_GET['newuser']){
    
    $query = 'SELECT id FROM usuarios';
    $conct = mysqli_query($conn, $query);

    while($idc = mysqli_fetch_array($conct)){
        $id = $idc['id'];
    }

    $idLast = $id + 1;

?>

<div id="modalAdicionar" style="opacity: 100%; top: 100px;" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title">Novo Usuário</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">

                    <div class="form-group">
                        <label for="id_produto">Numero de usuario</label>
                        <input type="text" id="iduser" class="form-control mr-2" name="numero_id"
                            value="<?php echo $idLast ?>" placeholder="Nome" required>
                    </div>
                    <!-- Nome do usuario -->
                    <div class="form-group">
                        <label for="id_produto">Nome</label>
                        <input type="text" class="form-control mr-2" name="nome" value="" placeholder="Nome" required>
                    </div>
                    <!-- Senha do usuario -->
                    <div class="form-group">
                        <label for="id_produto">Senha</label>
                        <input type="text" class="form-control mr-2" name="senha" placeholder="Senha" value="" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="fornecedor">Nivel de Usuario</label>
                        <!-- <input type="text" class="form-control mr-2" name="nivel_usuario" placeholder="Senha"
                            value="<?php echo $nivel ?>" required> -->

                        <select name="select">
                            <?php 
                            if($nivel == 'cliente'){
                                echo '<option value="0">Cliente</option>
                                <option value="1">Funcionario</option>';
                            } else {
                                echo '<option value="0">Funcionario</option>
                                <option value="2">Cliente</option>';
                            }
                            ?>

                        </select>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success mb-3" name="adicionar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['adicionar'])){
        
        // recuperando valores

        $nome_inpt = $_POST['nome'];
        $senha_inpt = $_POST['senha'];
        $select = $_POST['select'];

        // echo "<script>alert('$select')</script>";
        
        $query = "SELECT * FROM usuarios";
	    $result = mysqli_query($conn, $query);
    
        while($res = mysqli_fetch_array($result)){
            $id = $res['id'];
            $nome = $res['nome_usuario'];
            $senha = $res['senha_usuario'];
            $nivel = $res['nivel_usuario'];
        }

        if($select == 0 || $select == 1){
            $nivel_inp = 'funcionario';
        } else if ($select == 2){
            $nivel_inp = 'cliente';
        }

        // echo "<script>window.alert('ENTROOOOOOOOOOOOO')</script>";

        if($res['nome_usuario'] != $nome_inpt){

            $query = "SELECT nome_usuario FROM usuarios WHERE nome_usuario = '$nome_inpt' ";
            $conct = mysqli_query($conn, $query);
            $aciona = mysqli_num_rows($conct);

            if($aciona > 0){
                echo "<script>window.alert('Nome de Usuario Ja Existente')</script>";     
                
            } else {
                
                $query = "INSERT INTO usuarios (nome_usuario, senha_usuario, nivel_usuario)
                VALUES ('$nome_inpt', '$senha_inpt', '$nivel_inp')";

                $conct = mysqli_query($conn, $query);
                if($conct){
                    echo "<script>window.alert('Adicionado com sucesso!!!');window.location.href ='AdminUsers.php?';</script>";
                    exit();   
                }
            }
        }
    }
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script>
$('#modalEditar').modal('show');

$('#modalAdicionar').modal('show');

var input = document.querySelector("#iduser");
input.disabled = true;
</script>