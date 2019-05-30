<?php

require "conexao.php";
require "navbar.php"; // MENU DO SITE

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM combo";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

?>
<title>Menu</title>

 <!-- CARROSEL -->
     <div id="CarroselMenu" class="carousel slide" data-ride="carousel">
      <!-- COLOCANDO INDICE DO CARROCEL -->
       <ol class="carousel-indicators">
          <li data-target="#CarroselMenu" data-slide-to="0" class="active"></li> <!-- COLOCANDO INDICE DO CARROCEL -->
          <li data-target="#CarroselMenu" data-slide-to="1"></li>
          <li data-target="#CarroselMenu" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">

        <div class="carousel-item active">

          <img src="imagens/pizza-slide01.jpg" class="img-fluid d-block"> <!-- COLOCANDO IMAGEN -->

          <div class="carousel-caption d-none d-md-block">

              <h1 class="display-4" id="h1">Pizza Fatec</h1>
              <h5 id="h5">Porque tudo acaba em Pizza</h5>
          </div>


        </div>

        <div class="carousel-item">

          <img src="imagens/pizza-slide02.jpg" class="img-fluid d-block">

          <div class="carousel-caption d-none d-md-block">

              <h1 class="display-4" id="h1">Qualidade e Preços Otimos</h1>
              <h5 id="h5">Porque o não basta ser bom tem que ser bom e barato!</h5>
          </div>

        </div>

        <div class="carousel-item">
          <img src="imagens/pizza-slide03.jpg" class="img-fluid d-block">

          <div class="carousel-caption d-none d-md-block">

			  <h1 class="display-4" id="h1">Pizza Vegetarianas</h1>
              <h5 id="h5">Pizza feita com produtos 100% natural</h5>

          </div>

        </div>

        <!-- BOTAO DE RECUAR -->
        <a class="carousel-control-prev" href="#CarroselMenu" role="button" data-slide="prev">

          <span class="carousel-control-prev-icon"></span>
          <span class="sr-only">Anterior</span>

        </a>
        <!-- BOTAO DE AVANCAR -->
        <a class="carousel-control-next" href="#CarroselMenu" role="button" data-slide="next">
          <span class="carousel-control-next-icon"></span>
          <span class="sr-only">Avançar</span>
        </a>
      </div>
    </div>
	<h1 class="col-sm-12 display-4 my-5 text-center text-white" ><i class="fas fa-utensils"></i> Principais</h1>
    

<div class="container">
	<hr class="bg-white">
	<div class="row mb-5">
	    
	     <?php do {?>
	    
	    <?php 

        	if ($linha['nome_combo'] == "MegaCombo") {
        		$cardFoto = "imagens/combo/combo1.jpg";
        	} elseif ($linha['nome_combo'] == "TripleCombo") {
        		$cardFoto = "imagens/combo/combo2.jpg";
        	}elseif ($linha['nome_combo'] == "HiperCombo") {
        		$cardFoto = "imagens/combo/combo3.jpg";
        	}
        
         ?>

		<div class="col-sm-4">
                    <div class="card mb-3" id="pizza-modal">
                          <div class="card-body text-center" >
                                <img class="card-img-top rounded" src="<?php echo $cardFoto ?>">
                                <h3 class="card-title text-white mt-3"><?php echo $linha['nome_combo'] ?></h3>
                               
                                <p class="card-text text-white">R$ <?php echo $linha['preco_pizza'] ?> Grande</p>
                                <a href="#" class="card-link text-danger " data-toggle="modal" data-target="#<?php echo $linha['nome_combo'] ?>" >Ver detalhes</a>
                                <a href="#" class="card-link text-danger" data-toggle="modal" data-target="#<?php echo $linha['categoria_ntc'] ?>" ><i class="fas fa-shopping-cart"></i> Comprar</a>
                          </div>
                    </div>
        </div>

        <div class="modal fade" id="<?php echo $linha['nome_combo'] ?>" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title"><?php echo $linha['nome_combo'] ?></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
                <span>X</span>
              </div>

              <div class="modal-body">
                <p><?php echo $linha['desc_pizza'] ?></p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger col-sm-3" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary col-sm-3" data-dismiss="modal"><i class="fas fa-shopping-cart"></i> Comprar</button>
              </div>
            </div>
          </div>
        </div>
        <?php } while ($linha = $sql_query->fetch_assoc());?>
	</div>
</div>

<?php require 'rodape.php'; // RODAPE DO SITE?>
