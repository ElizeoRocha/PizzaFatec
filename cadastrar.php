<?php

require "conexao.php";
require "navbar.php"; // MENU DO SITE

$erro = null;

if (isset($_POST['cadastrar'])) {



	foreach ($_POST as $chave => $valor) {
		$_SESSION[$chave] = $mysqli->real_escape_string($valor);
	}
	
// VERIFICANDO SE AS SENHA E CONFIRMAR SENHA SAO IDENTICAS
	if (strcmp($_SESSION['inputSenha'], $_SESSION['inputConfirmarSenha']) != 0) {
		$erro = "Senhas nao batem";
	}

	if ($erro == null) {
		$sql_code = "INSERT INTO cliente (nome_cliente,
                                          endereco_cliente,
                                          cidade_cliente,
                                          numero_cliente,
                                          login_cliente,
                                          senha_cliente,
                                          bairro_cliente)
                                          VALUES
                                          ('$_SESSION[inputNome]',
                                           '$_SESSION[inputEndereco]',
                                           '$_SESSION[inputCidade]',
                                           '$_SESSION[inputNumero]',
                                           '$_SESSION[inputLogin]',
                                           '$_SESSION[inputSenha]',
                                           '$_SESSION[inputBairro]')";

		$confirma = $mysqli->query($sql_code);

		if ($confirma) {
			$erro = "Noticia Cadastrada com Sucesso!";
		} else {
			$erro = $erro = "falha ao salvar dados";
		}

	}
}
?>

<title>Cadastrar-se</title>

          <div class="container">

				<h1 class="display-4 text-white text-center my-5">Cadastrar</h1>

                   <div class="row justify-content-center mb-5 my-5">
                       
                       <?php if ($erro == "Noticia Cadastrada com Sucesso!") {?>

                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                  <strong>Sucesso!: </strong>O cadastro foi realizado com Sucesso.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php } elseif ($erro == "falha ao salvar dados") {?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Falha!: </strong>Ocorreu uma falha durante o cadastro tente de novo.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php } elseif ($erro == "Senhas nao batem") {?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Falha!: </strong>As senhas não batem por favor colocar senhas identicas.
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

                                <div class="form-group col-sm-12 text-white">
                                  <label for="inputLogin">Email: </label>
                                  <input type="text" class="form-control shadow-sm" name="inputLogin" id="inputLogin" placeholder="Digite o email aqui:" required>
                                </div>

                               <div class="form-group col-sm-6 text-white">
                                    <label for="inputSenha">Senha: </label>
                                    <input type="Password" class="form-control shadow-sm" id="inputSenha" name="inputSenha" placeholder="Digite a Senha aqui:" required>
                                </div>
                                <div class="form-group col-sm-6 text-white">
                                    <label for="inputConfirmarSenha">Confirmar Senha: </label>
                                    <input type="Password" class="form-control shadow-sm" id="inputConfirmarSenha" name="inputConfirmarSenha" placeholder="Confirme a senha" required>
                                </div>


                                      <div class="form-group col-3 text-right">
                                     </div>

                                  <div class="inputWithIcon form-group col-sm-3 mt-3">
                                      <input type="submit" class="btn btn-danger btn-block shadow-sm" name="cadastrar" value="Cadastrar">
                                </div>

                                <div class="inputWithIcon form-group col-sm-3 mt-3">
                                      <input type="reset" class="btn btn-dark btn-block shadow-sm" value="Limpar">
                                </div>

                            </div>

                          </form>

                        </div>

                   </div>

              </div>

<?php require 'rodape.php'; // RODAPE DO SITE?>