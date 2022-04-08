<?php

$server = 'localhost';

$name = 'root';

$pssw = '';

$dbname = 'projetogael';

/**
 * 
 * Executando a Conexão
 * com mysqli_connect
 * @return conexao
 */
$conn = mysqli_connect($server, $name, $pssw, $dbname) or die(mysqli_error($conn));

/**
 * Caso o DB acima tenha algum
 * tipo de problema ou ocasião
 * inexperada ele irá retornar um erro
 */

function verificaSessao (){
	if(!$_SESSION['id']){
		$contador = false;
	} else {
		$contador = true;
	}	
	return $contador;
}
?>