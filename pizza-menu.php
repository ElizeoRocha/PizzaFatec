<?php
require "conexao.php";
require "navbar.php"; // MENU DO SITE

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM Pizza";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

?>
<title>Cardapio Pizza</title>

<h1 class="col-sm-12 display-4 my-5 text-center text-white" ><i class="fas fa-pizza-slice"></i> Pizzas</h1>


<div class="container">
	<hr class="bg-white">
	<div class="row mb-5">
	    
	    
	    <?php do {	?>
        
        
        <?php 

	if ($linha['nome_pizza'] == "Bauru") {
		$cardFoto = "imagens/pizza/bauru.jpg";
	} elseif ($linha['nome_pizza'] == "Peperoni") {
		$cardFoto = "imagens/pizza/peperoni.jpg";
	} elseif ($linha['nome_pizza'] == "Brocolis") {
		$cardFoto = "imagens/pizza/brocolis.jpg";
	}elseif ($linha['nome_pizza'] == "Teriake") {
		$cardFoto = "imagens/pizza/teriake.jpg";
	}elseif ($linha['nome_pizza'] == "Chocolate") {
		$cardFoto = "imagens/pizza/chocolate.jpg";
	}elseif ($linha['nome_pizza'] == "Espinafre") {
		$cardFoto = "imagens/pizza/espinafre.jpg";
	}elseif ($linha['nome_pizza'] == "Vegetariana") {
		$cardFoto = "imagens/pizza/vegetariana.jpg";
	}elseif ($linha['nome_pizza'] == "CarneSeca") {
		$cardFoto = "imagens/pizza/carne-seca.jpg";
	}elseif ($linha['nome_pizza'] == "Picante") {
		$cardFoto = "imagens/pizza/picante.jpeg";
	}
         ?>
        
      
        
		<div class="col-sm-4">
                    <div class="card mb-3" id="pizza-modal">
                          <div class="card-body text-center" >
                                <img class="card-img-top rounded" src="<?php echo $cardFoto ?>">
                                <h3 class="card-title text-white mt-3"><?php echo $linha['nome_pizza'] ?></h3>
                                <p class="card-text text-white">R$ <?php echo $linha['preco_pizza'] ?> Grande</p>
                                
                                <a href="#" class="card-link text-danger" data-toggle="modal" data-target="#<?php echo $linha['nome_pizza'] ?>" ><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho</a>
                          </div>
                    </div>
        </div>

        <div class="modal fade" id="<?php echo $linha['nome_pizza'] ?>" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title"><?php echo $linha['nome_pizza'] ?></h4>
                
                <button type="button" class="close" data-dismiss="modal"></button>
                <span>X</span>
              </div>

              <div class="modal-body">
                  <p>Tem certeza que deseja adcionar este produto ao carrinho?</p>
                <p><?php echo $linha['desc_pizza'] ?></p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger col-sm-3" data-dismiss="modal">Fechar</button>
                <a href="carrinho.php?n1=<?php echo $linha['id_pizza'] ?>" class="btn btn-primary col-sm-3"><i class="fas fa-shopping-cart"></i> Adicionar</a>
              </div>
            </div>
          </div>
        </div>
        

        <?php } while ($linha = $sql_query->fetch_assoc());?>

	</div>
</div>



<?php
require 'rodape.php'; // RODAPE DO SITE
?>