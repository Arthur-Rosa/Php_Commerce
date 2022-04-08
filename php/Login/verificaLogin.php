<?php 

session_start();
include_once('../conexao.php');

if($_POST){
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $nomeclear = filter_var($nome, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);

    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha = preg_replace('/[^[:alnum:]_]/', '', $senha);

    $query = "SELECT * FROM usuarios WHERE nome_usuario = '".$nomeclear."' ";
    $row = mysqli_query($conn, $query);

    if(mysqli_num_rows($row)){
        while($user = $row->fetch_assoc()){
            if($senha == $user['senha_usuario']){
                $hierc = $user['nivel_usuario'];

                if($hierc == "admin"){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['nome'] = $user['nome_usuario'];

                    $_SESSION['hierc'] = $user['nivel_usuario'];
                    header('Location: ../Admin/AdminPedidos.php');
                    
                } else if ($hierc == "cliente"){
                    $_SESSION['id'] = $user['id'];
                    $hierc = $user['nivel_usuario'];

                    $_SESSION['hierc'] = $user['nivel_usuario'];
                    $_SESSION['nome'] = $user['nome_usuario'];

                    header('Location: ../Cliente/ClientePedidos.php');
                } else if ($hierc == "funcionario"){
                    $_SESSION['id'] = $user['id'];
                    $hierc = $user['nivel_usuario'];

                    $_SESSION['hierc'] = $user['nivel_usuario'];
                    $_SESSION['nome'] = $user['nome_usuario'];

                    header('Location: ../Funcionario/FuncPedidos.php');
                } else {
                    echo "<script>alert('usuario ou senha incorreta');location.href=\"Login.php\";</script>";
                }
            } else {
                echo "<script>alert('usuario ou senha incorreta');location.href=\"Login.php\";</script>";
            }
        }
    }  else {
        echo "<script>alert('usuario ou senha incorreta');location.href=\"Login.php\";</script>";
    }
}

?>