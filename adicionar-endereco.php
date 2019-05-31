<?php

require "conexao.php";
require "navbar.php"; // MENU DO SITE

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
                                          item_pedido)
                                          VALUES
                                          ('$_SESSION[inputNome]',
                                           '$_SESSION[inputEndereco]',
                                           '$_SESSION[inputCidade]',
                                           '$_SESSION[inputNumero]',
                                           '$_SESSION[inputBairro]',
                                           '$_SESSION[carrinhoPreco]',
                                           '$_SESSION[carrinhoItem]')";

		$confirma = $mysqli->query($sql_code);

		if ($confirma) {
			$erro = "Noticia Cadastrada com Sucesso!";
		} else {
			$erro = $erro = "falha ao salvar dados";
		}

	}
}
?>

<title>Adicionar Endereço</title>

          <div class="container">

				<h1 class="display-4 text-white text-center my-5">Adicionar Endereço</h1>
				

                   <div class="row justify-content-center mb-5 my-5">
                       
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


                        <div class="col-sm-12 col-md-10 col-lg-8 rounded" id="pizza-modal">

                          <form action="" method="post">

                            <div class="form-row my-4">

                               <div class="form-group col-sm-12 text-white">
                                  <label for="inputNome">Nome: </label>
                                  <input type="text" class="form-control shadow-sm" name="inputNome" id="inputNome" placeholder="Digite o nome aqui:" required>
                              </div>

                              <div class="form-group col-sm-12 text-white">
                                      <label for="inputEndereco">Endereço: </label>
                                      <input type="text" class="form-control shadow-sm" name="inputEndereco" id="inputEndereco" placeholder="Digite o Endereço aqui:" required>

                              </div>

                              <div class="form-group col-sm-5 text-white">
                                      <label for="inputCidade">Cidade: </label>
                                      <input type="text" class="form-control shadow-sm" id="inputCidade" name="inputCidade" placeholder="Digite a Cidade aqui:" required>
                              </div>
                              <div class="form-group col-sm-5 text-white">
                                      <label for="inputBairro">Bairro: </label>
                                      <input type="text" class="form-control shadow-sm" id="inputBairro" name="inputBairro" placeholder="Digite o Bairro aqui:" required>
                              </div>

                             	<div class="form-group col-sm-2 text-white">
                                    <label for="inputNumero">Numero: </label>
                                    <input type="number" class="form-control shadow-sm" id="inputNumero" name="inputNumero" placeholder="N°" required>
                                </div>
                                
                                <div class="card col-12" id="pizza-modal">
                                  <div class="card-body text-center" >
                                        <h3 class="card-title text-white mt-1">Confirmação de Pedido</h3>
                                        <p class="card-text text-white"><?php echo $_SESSION['carrinhoItem'] ?></p>
                                        <h1 class="text-white">Total R$: <?php echo $_SESSION['carrinhoPreco'] ?></h1>
                                        <input type="hidden" name="carrinhoItem" value="<?php echo $_SESSION['carrinhoItem'] ?>">
                                        <input type="hidden" name="carrinhoPreco" value="<?php echo $_SESSION['carrinhoPreco'] ?>">
                                  </div>
                                 </div>

                                      <div class="form-group col-4 text-right">
                                     </div>

                                  <div class="inputWithIcon form-group col-sm-4">
                                      <input type="submit" class="btn btn-danger btn-block shadow-sm" name="comprar" value="Comprar">
                                </div>

                            </div>

                          </form>

                        </div>

                   </div>

              </div>

<?php require 'rodape.php'; // RODAPE DO SITE?>