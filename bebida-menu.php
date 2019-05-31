<?php
require "conexao.php";
require "navbar.php"; // MENU DO SITE

// FAZENDO SELECT NO BANCO E JOGANDO EM UMA VARIAVEL CHAMADA LINHA
$sql_code = "SELECT * FROM bebida";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

?>
<title>Cardapio Bebidas</title>

<h1 class="col-sm-12 display-4 my-5 text-center text-white" ><i class="fas fa-wine-glass-alt"></i> Bebidas</h1>


<div class="container">
	<hr class="bg-white">
	<div class="row mb-5">
	    
	     <?php do {	?>
        
        
        <?php 
        
            if ($linha['nome_bebida'] == "CocaCola") {
        		$cardFoto = "imagens/bebida/coca.jpg";
        	} elseif ($linha['nome_bebida'] == "Fanta") {
        		$cardFoto = "imagens/bebida/fanta.jpg";
        	} elseif ($linha['nome_bebida'] == "Sprite") {
        		$cardFoto = "imagens/bebida/sprite.jpg";
        	}elseif ($linha['nome_bebida'] == "7Up") {
        		$cardFoto = "imagens/bebida/7up.jpg";
        	}elseif ($linha['nome_bebida'] == "Schweppes") {
        		$cardFoto = "imagens/bebida/schweppes.jpg";
        	}elseif ($linha['nome_bebida'] == "Pepsi") {
        		$cardFoto = "imagens/bebida/pepsi.jpg";
        	}
         ?>

		<div class="col-sm-4">
                    <div class="card mb-3" id="pizza-modal">
                          <div class="card-body text-center" >
                                <img class="card-img-top rounded" src="<?php echo $cardFoto ?>">
                                <h3 class="card-title text-white mt-3"><?php echo $linha['nome_bebida'] ?></h3>
                                <p class="card-text text-white">R$ <?php echo $linha['preco_bebida'] ?> Media</p>
                            
                                <a href="carrinho-bebida.php" class="card-link text-danger" data-toggle="modal" data-target="#<?php echo $linha['nome_bebida'] ?>" ><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho</a>
                          </div>
                    </div>
        </div>

        <div class="modal fade" id="<?php echo $linha['nome_bebida'] ?>" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title"><?php echo $linha['nome_bebida'] ?></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
                <span>X</span>
              </div>

              <div class="modal-body">
                  <p>Tem certeza que deseja adcionar este produto ao carrinho?</p>
                <p><?php echo $linha['desc_bebida'] ?></p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger col-sm-3" data-dismiss="modal">Fechar</button>
                <a href="carrinho-bebida.php?n1=<?php echo $linha['id_bebida'] ?>" class="btn btn-primary col-sm-3"><i class="fas fa-shopping-cart"></i> Adicionar</a>
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