<?php

require "conexao.php";
require "navbar.php"; // MENU DO SITE

$erro = null;

if (isset($_POST['email']) && strlen($_POST['email']) > 0) {

	if (!isset($_SESSION)) {
		session_start();
	}

	$_SESSION['email'] = $mysqli->escape_string($_POST['email']);
	$_SESSION['senha'] = $_POST['senha'];

	$sql_code = "SELECT senha_cliente, id_cliente FROM cliente WHERE login_cliente = '$_SESSION[email]'";
	$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;

	if ($total == 0) {
		$erro = "Este email nao pertence a nenhum usuario";
	} else {

		if ($dado['senha_cliente'] == $_SESSION['senha']) {
			$_SESSION['usuario'] = $dado['id_cliente'];
			

		} else {

			$erro = "Senha incorreta";

		}

	}

}

?>
<title>Entrar</title>

<div class="container">

    <div class="row justify-content-center mb-5 my-5">
        
                               <?php if ($erro == "Este email nao pertence a nenhum usuario") {?>

                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                  <strong>Falha!: </strong>O Usuario não existe ou esta incorreto!
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php } elseif ($erro == "Senha incorreta") {?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Falha!: </strong>A senha esta incorreta!
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php } else{?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Sucesso!: </strong>Voçê esta logado!
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                          <?php }?>

    	<div class="col-sm-12 col-md-10 col-lg-8">

    		<h1 class="text-center text-white mt-5 mb-3 display-4">Entrar</h1>

                <form action="" method="post">

                  <div class="form-row rounded" id="pizza-modal">
                  	<div class="col-sm-12">


                    <div class="form-group col-sm-12 text-white mt-4">
                            <label for="inputName">Login: </label>
                            <input type="text" class="form-control shadow-sm" name="email" id="inputName" placeholder="Digite o login aqui:" required>
                    </div>

                    <div class="form-group col-sm-12 text-white my-3">
                            <label for="inputSenha">Senha: </label>
                            <input type="password" class="form-control shadow-sm" name="senha" id="inputSenha" placeholder="Digite a senha aqui:" required>
                    </div>


                    <div class="form-group col-sm-4 m-auto">
                        	<input type="submit" class="btn btn-danger btn-block shadow-sm" value="Entrar">
                    </div>

					<div class="mb-4"></div>


					</div>


                  </div>
                  <p class="text-white text-center my-3 mb-5">Não tem uma conta ainda? Clique <a href="cadastrar.php"><strong>Aqui</strong></a> para Cadastrar-se</p>
                </form>

		</div>
    </div>

</div>

<?php
require 'rodape.php'; // RODAPE DO SITE
?>