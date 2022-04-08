<?php

include_once '../conexao.php';

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT id FROM usuarios WHERE id LIKE '%".$assunto."%' ORDER BY assunto ASC LIMIT 12";

//Seleciona os registros
$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_cont['id'];
}
echo json_encode($data);

?>