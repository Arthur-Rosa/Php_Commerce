<?php
session_start();
include_once('../conexao.php');

if (!verificaSessao()) {
    header('Location: ../Login/Login.php');
}
if ($_SESSION['hierc'] == 'funcionario') {
    header('Location: ../Funcionario/FuncPedidos.php');
}

if($_POST){
    /**
     * Conexao com o BD
     * @param Conexao com db
     * @return liveConnection
     */
    include_once('../conexao.php');

    /**
     * Variável que recebe valor INT
     * em quantidade de páginas 
     * salvo como String caso
     * o primeiro valor digitado seja 0
     */

    $qtdPagina = filter_input(INPUT_POST, 'qtdPagina', FILTER_SANITIZE_STRING);
    $qtdPagina = preg_replace('/[^[:alnum:]_]/', '', $qtdPagina);
    /**
     * Pinça de chapa 
     * Váriavel que recebe valor
     * do tipo String 
     */

    $pincaChapa = filter_input(INPUT_POST, 'pincaChapa', FILTER_SANITIZE_STRING);
    $pincaChapa = preg_replace('/[^[:alnum:]_]/', '', $pincaChapa);

    /**
     * Tipo de Trabalho
     * Váriavel que recebe valor
     * do tipo String
     */
    $typeWork = filter_input(INPUT_POST, 'typeWork', FILTER_SANITIZE_STRING);
    $typeWork = preg_replace('/[^[:alnum:]_]/', '', $typeWork);

    /**
     * Formato de chapa 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $formatChapa = filter_input(INPUT_POST, 'formatChapa', FILTER_SANITIZE_STRING);
    $formatChapa = preg_replace('/[^[:alnum:]_]/', '', $formatChapa);

    /**
     * Abertura ? 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $abertura = filter_input(INPUT_POST, 'abertura', FILTER_SANITIZE_STRING);
    $abertura = preg_replace('/[^[:alnum:]_]/', '', $abertura);

    /**
     * Quantidade de Chapas 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $qtdChapas = filter_input(INPUT_POST, 'qtdChapas', FILTER_SANITIZE_STRING);
    $qtdChapas = preg_replace('/[^[:alnum:]_]/', '', $qtdChapas);

    /**
     * Montagem FV 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $montFV = filter_input(INPUT_POST, 'montFV', FILTER_SANITIZE_STRING);
    $montFV = preg_replace('/[^[:alnum:]_]/', '', $montFV);

    /**
     * Converte CMYK 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $conCMYK = filter_input(INPUT_POST, 'conCMYK', FILTER_SANITIZE_STRING);
    $conCMYK = preg_replace('/[^[:alnum:]_]/', '', $conCMYK);

    /**
     * Quantidade de cores 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $qtdCores = filter_input(INPUT_POST, 'qtdCores', FILTER_SANITIZE_STRING);
    $qtdCores = preg_replace('/[^[:alnum:]_]/', '', $qtdCores);

    /**
     * Montagem TR 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $montTR = filter_input(INPUT_POST, 'montTR', FILTER_SANITIZE_STRING);
    $montTR = preg_replace('/[^[:alnum:]_]/', '', $montTR);

    /**
     * Valor em Branco ainda 
     * Não definido 
     * Váriavel que recebe valor
     * do tipo String 
     */
    $nsei = filter_input(INPUT_POST, 'nsei', FILTER_SANITIZE_STRING);
    $nsei = preg_replace('/[^[:alnum:]_]/', '', $nsei);

    /**
     * Formato do Arquivo 
     * Váriavel que recebe valor
     * do tipo String 
     */

    // Possivel SELECT

    $formatArqv = filter_input(INPUT_POST, 'formatArqv', FILTER_SANITIZE_STRING);
    $formatArqv = preg_replace('/[^[:alnum:]_]/', '', $formatArqv);

    /**
     * Formato do papel 
     * Váriavel que recebe valor
     * do tipo String 
     */

    // Possivel SELECT

    $formatPapel = filter_input(INPUT_POST, 'formatPapel', FILTER_SANITIZE_STRING);
    $formatPapel = preg_replace('/[^[:alnum:]_]/', '', $formatPapel);

    /***
     * 
     * query
     * Query Com 14 Váriaveis Distintas e Separadas Para serem
     * Inseridas na Tabela PEDIDOS
     * Todas as Váriaveis foram declaradas acima
     * Com seus Nomes e Respectivos Valores
     */

    $arquivo = $_FILES['file'];

    $nomeArq = $arquivo['name'];
    $date = date('mdYhis', time());
    $arquivo['name'] = $date . '_GaelGraf_' . $nomeArq;
    $nomeArq = $date . '_GaelGraf_' . $nomeArq;

    $arquivoNovo = explode('.',$arquivo['name']);

    echo $arquivoNovo[sizeof($arquivoNovo)-1];

    if($arquivoNovo[sizeof($arquivoNovo)-1] != 'pdf'){
        echo 'entrou';
        die('');
    } else {
        move_uploaded_file($arquivo['tmp_name'],'../Arquivos/'.$arquivo['name']); 
    }

    echo $nomeArq;
    // pedido 1 = enviado
    $status = 1;
    $id = $_SESSION['id'];
    $username = $_SESSION['nome'];

    $msg = false;


    $query = "INSERT INTO pedidos (numero_da_ordem, tipo_de_trabalho, qtdChapas, qtdCores, formato_arquivos, qtdPaginas, formato_chapas, formatoFV, formatoTR, pinca_de_chapa, abertura, converteCMYK, formatoPapel, arquivo, status_pedido, id_usuario, nome_usuario) 
    VALUES ('$nsei', '$typeWork', '$qtdChapas', '$qtdCores', '$formatArqv', '$qtdPagina', '$formatChapa', '$montFV', '$montTR', '$pincaChapa', '$abertura', '$conCMYK', '$formatPapel', '$nomeArq', '$status', '$id', '$username')";

    // var_dump($query);

    /**
     * 
     * mysqli_querys
     * @param Executando a Query
     * Para Inserir as informações 
     * na Tabela PEDIDOS
     * @return retorna a Requisição se não for completa
     * ou não atendida retorna 0 caso contrario retorna 1
     */
    $result_query = mysqli_query($conn, $query);

    /**
     * 
     * my_sqli_insert_id
     * @param verifica succes
     * @return 0 Caso não tenha Conexão com o banco ou os Parametros
     * Não sejam Atendidos
     */
    if(mysqli_insert_id($conn)){
        
        // Joga um Alert na tela com Cadastro Realizado
        header('Location: ClientePedidos.php');
    } else {

        // Joga um Alert na tela com Cadastro não Realizado
        echo "<script>alert('Cadastro não Realizado!');location.href=\"ClienteNewPedido.php\";</script>";

    }
}