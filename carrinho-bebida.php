<?php

require "conexao.php";
require "sessao.php";

$id = $_GET['n1'] ?? null;

if (!isset($_SESSION['carrinhoItem'])) {
	$_SESSION['carrinhoItem'] = null;
}

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM bebida WHERE id_bebida = $id";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

if (is_null($_SESSION['carrinhoItem'])) {
	$_SESSION['carrinhoItem'] = "Bebida " . $linha['nome_bebida'];
	$_SESSION['carrinhoPreco'] = $linha['preco_bebida'];
} else {
	$_SESSION['carrinhoItem'] = $_SESSION['carrinhoItem'] . "<br>" ."Bebida ". $linha['nome_bebida'];
	$_SESSION['carrinhoPreco'] = $_SESSION['carrinhoPreco'] + $linha['preco_bebida'];
}

header('LOCATION: bebida-menu.php');
?>

