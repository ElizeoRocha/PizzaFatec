<?php
require "sessao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> <!-- ICONES CSS -->

    <link rel="stylesheet" href="estilo-site.css">

    <link rel="icon" href="imagens/pizza.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/pizza.ico" type="image/x-icon" />

  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark ">

        <div class="container">

            <a class="navbar-brand h1 mb-0" href="index.php"><i class="fas fa-pizza-slice"></i> PF </a>

            <button class="navbar-toggler" tipy="button" data-toggle="collapse" data-target="#navbarSite">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">

                <ul class="navbar-nav mr-2">

                  <li class="nav-item">
                      <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Inicio </a>
                  </li>
                  <li class="nav-ite mr-2">
                      <a class="nav-link" href="pizza-menu.php"><i class="fas fa-utensils"></i> Pizzas</a>
                  </li>
                   <li class="nav-item mr-2">
                      <a class="nav-link" href="bebida-menu.php"><i class="fas fa-wine-glass-alt"></i> Bebidas</a>
                  </li>
                  <li class="nav-item mr-2">
                      <a class="nav-link" href="contato.php"><i class="fas fa-phone"></i> Contato</a>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                 <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navdrop">
                      <i class="fas fa-shopping-cart"></i> Meu Carrinho</a>

                      <div class="dropdown-menu">

                        <p class="dropdown-item">ITENS:</p>


                         <?php if (isset($_SESSION['carrinhoItem'])) {?>
                              <p class="dropdown-item"><?php echo $_SESSION['carrinhoItem'] ?></p>
                         <?php }?>

                        <p class="dropdown-item">TOTAL:
                         <?php if (isset($_SESSION['carrinhoItem'])) {?>
                              <?php echo $_SESSION['carrinhoPreco'] ?>
                         <?php }?>
                        </p>

                        <?php if (isset($_SESSION['usuario'])) {?>
                            <a href="confirmar-pedido.php" class="btn btn-danger col-12">Finalizar</a>
                        <?php } else {?>
                            <a href="adicionar-endereco.php" class="btn btn-danger col-12">Finalizar</a>
                        <?php }?>

                      </div>
                  </li>


                </ul>

                <?php if (isset($_SESSION['usuario'])) {?>

                  <ul class="navbar-nav ml-auto">
                 <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navdrop">
                      <i class="fas fa-user-circle"></i> Perfil</a>

                      <div class="dropdown-menu">
                        <a class="dropdown-item " href="editar-perfil-adm.php"><i class="fas fa-edit"></i> Editar</a>
                        <a class="dropdown-item " href="sair.php"><i class="fas fa-power-off"></i> Sair</a>

                      </div>
                  </li>


                </ul>

                <?php } else {?>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-2">
                      <a class="nav-link" href="login.php"><i class="fas fa-door-open"></i> Entrar</a>
                  </li>
                </ul>
              <?php }?>

            </div>

        </div>

    </nav>


    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
