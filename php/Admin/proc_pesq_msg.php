<?php
/*

$query_clientes = 'SELECT id FROM pedidos WHERE id LIKE "$id" ';

$result_clientes = mysqli_query($conn, $query_clientes);

while ($linhas_clientes = mysqli_fetch_assoc($result_clientes)){
    
    $id = htmlentities($linhas_clientes['id']); // Tratamento de caracteres especiais
    echo $id;
}

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT nome_usuario FROM pedidos WHERE nome_usuario LIKE '%$assunto%' ";

//Seleciona os registros
$resultado_msg_cont = $conn->prepare($result_msg_cont);

$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_cont['nome_usuario'];
}

echo json_encode($data);  */

include_once '../conexao.php';

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT id FROM pedidos WHERE id LIKE '%".$assunto."%' ORDER BY assunto ASC LIMIT 12";

//Seleciona os registros
$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_cont['id'];
}
echo json_encode($data);

?>