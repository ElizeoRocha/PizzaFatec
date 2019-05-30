<?php

$host = "localhost";
$usuario = "id9554029_pizzafatec";
$senha = "pizzafatec";
$bd = "id9554029_pizza";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if ($mysqli->connect_errno) {
	echo "Falha na conexao (" . $mysqli->connect_errno . ") " . $mysqli->connect_errno;
}

?>