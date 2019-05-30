<?php

require "conexao.php";
require "sessao.php";

$id = $_GET['n1'] ?? null;

if (!isset($_SESSION['carrinhoItem'])) {
	$_SESSION['carrinhoItem'] = null;
}

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM Pizza WHERE id_pizza = $id";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

if (is_null($_SESSION['carrinhoItem'])) {
	$_SESSION['carrinhoItem'] = $linha['nome_pizza'];
	$_SESSION['carrinhoPreco'] = $linha['preco_pizza'];
} else {
	$_SESSION['carrinhoItem'] = $_SESSION['carrinhoItem'] . "<br>" . $linha['nome_pizza'];
	$_SESSION['carrinhoPreco'] = $_SESSION['carrinhoPreco'] + $linha['preco_pizza'];
}

header('LOCATION: pizza-menu.php');
?>

