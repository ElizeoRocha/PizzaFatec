<?php
require "conexao.php";
require "navbar.php"; // MENU DO SITE

?>
<title>Confirmar Pedido</title>

<h1 class="col-sm-12 display-4 my-5 text-center text-white" ><i class="fas fa-pizza-slice"></i> Confirmar Pedido</h1>


<div class="container">
  <hr class="bg-white">
  <div class="row mb-5">

    <div class="col-sm-6">
                    <div class="card my-5" id="pizza-modal">
                          <div class="card-body text-center" >
                            <form action="" method="post">
                                <h3 class="card-title text-white mt-3">Confirmação de Pedido</h3>
                                <p class="card-text text-white"><?php echo $_SESSION['carrinhoItem'] ?></p>
                                <h1 class="text-white">Total R$: <?php echo $_SESSION['carrinhoPreco'] ?></h1>
                                <input type="hidden" name="carrinhoItem" value="<?php echo $_SESSION['carrinhoItem'] ?>">
                                <input type="hidden" name="carrinhoPreco" value="<?php echo $_SESSION['carrinhoPreco'] ?>">
                                <input type="submit" class="btn btn-danger" value="Confirmar Pedido">
                            </form>
                          </div>
                    </div>
        </div>
  </div>
</div>



<?php
require 'rodape.php'; // RODAPE DO SITE
?>