<?php

require "conexao.php";
require "sessao.php";

$id = $_GET['n1'] ?? null;

if (!isset($_SESSION['carrinhoItem'])) {
	$_SESSION['carrinhoItem'] = null;
}

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM combo WHERE id_combo = $id";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

if (is_null($_SESSION['carrinhoItem'])) {
	$_SESSION['carrinhoItem'] = "Combo " . $linha['nome_combo'];
	$_SESSION['carrinhoPreco'] = $linha['preco_combo'];
} else {
	$_SESSION['carrinhoItem'] = $_SESSION['carrinhoItem'] . "<br>" ."Combo ". $linha['nome_combo'];
	$_SESSION['carrinhoPreco'] = $_SESSION['carrinhoPreco'] + $linha['preco_combo'];
}

header('LOCATION: index.php');
?>

