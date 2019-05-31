<?php
require "conexao.php";
require "navbar.php"; // MENU DO SITE

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM cliente WHERE id_cliente = '$_SESSION[usuario]'";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

$erro = null;

if (isset($_POST['comprar'])) {

	foreach ($_POST as $chave => $valor) {
		$_SESSION[$chave] = $mysqli->real_escape_string($valor);
	}
	
	if ($erro == null) {
		$sql_code = "INSERT INTO pedido   (nome_pedido,
                                          endereco_pedido,
                                          cidade_pedido,
                                          numero_pedido,
                                          bairro_pedido,
                                          preco_pedido,
                                          item_pedido,
                                          id_cliente_fk)
                                          VALUES
                                          ('$_SESSION[inputNome]',
                                           '$_SESSION[inputEndereco]',
                                           '$_SESSION[inputCidade]',
                                           '$_SESSION[inputNumero]',
                                           '$_SESSION[inputBairro]',
                                           '$_SESSION[carrinhoPreco]',
                                           '$_SESSION[carrinhoItem]',
                                           '$_SESSION[usuario]')";

		$confirma = $mysqli->query($sql_code);

		if ($confirma) {
			$erro = "Noticia Cadastrada com Sucesso!";
		} else {
			$erro = $erro = "falha ao salvar dados";
		}

	}
}

?>
<title>Confirmar Pedido</title>

<h1 class="col-sm-12 display-4 my-5 text-center text-white" ><i class="fas fa-pizza-slice"></i> Confirmar Pedido</h1>


<div class="container">
  <hr class="bg-white">
  <div class="row mb-5">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        
        <?php if ($erro == "Noticia Cadastrada com Sucesso!") {?>

                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                  <strong>Sucesso!: </strong>O Pedido foi realizado com Sucesso e chegara em sua residencia por falta de 40 minutos.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php } elseif ($erro == "falha ao salvar dados") {?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Falha!: </strong>Ocorreu uma falha durante o pedido tente de novo.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php }?>
        
                    <div class="card my-5" id="pizza-modal">
                          <div class="card-body text-center" >
                            <form action="" method="post">
                                <h3 class="card-title text-white mt-3">Confirmação de Pedido</h3>
                                <p class="card-text text-white"><?php echo $_SESSION['carrinhoItem'] ?></p>
                                <h1 class="text-white">Total R$: <?php echo $_SESSION['carrinhoPreco'] ?></h1>
                               
                                <input type="hidden" name="nome" value="<?php echo $linha['nome_cliente'] ?>">
                                <input type="hidden" name="endereco" value="<?php echo $linha['endereco_cliente'] ?>">
                                <input type="hidden" name="cidade" value="<?php echo $linha['cidade_cliente'] ?>">
                                <input type="hidden" name="numero" value="<?php echo $linha['numero_cliente'] ?>">
                                <input type="hidden" name="bairro" value="<?php echo $linha['bairro_cliente'] ?>">
                                <input type="hidden" name="item" value="<?php echo $_SESSION['carrinhoItem'] ?>">
                                <input type="hidden" name="preco" value="<?php echo $_SESSION['carrinhoPreco'] ?>">
                                <input type="hidden" name="cliendeId" value="<?php echo $_SESSION['usuario'] ?>">
                                <input type="submit" class="btn btn-danger my-5" name="comprar" value="Confirmar Pedido">
                            </form>
                          </div>
                    </div>
        </div>
  </div>
</div>



<?php
require 'rodape.php'; // RODAPE DO SITE
?>