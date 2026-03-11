<?php
  include_once("cabec.php");

  $data = $_REQUEST;

	extract($data);

  if( isset($pesquisa) )
  {
    $pesquisa = "%" . $pesquisa . "%";
  }
  else
  {
    $pesquisa = "%";
  }

	include_once("config.php");

	$conexao = db_connect();

	$sql = "SELECT proDescricao, proQuantidade, 
                 proValor, proSetor, proStatus
			    FROM produto
			    WHERE proDescricao LIKE :pesquisa
			    ORDER BY proDescricao ";
	
	$comando = $conexao->prepare($sql);

	$comando->bindParam(':pesquisa', $pesquisa);

	$comando->execute();
			
	$dados = $comando->fetchAll(PDO::FETCH_OBJ);

?>

    <div id="container-fluid">
      <h3 class="text-center mt-5 font-courier text-primary"><?php echo $lng['cadProdutos']; ?></h3>

      <p>&nbsp;</p>

      <div class="col-12">
        <form name="pesquisa" action="produto.php" method="GET">
          <div class="row align-items-center mb-5 mx-3 g-3">
            <label for="pesquisa" class="col-auto ms-5 col-form-label text-light"><?php echo $lng['produtoPesquisar']; ?></label>
            <div class="col">
              <input type="text" name="pesquisa" id="pesquisa" class="form-control">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-outline-primary me-3"><?php echo $lng['pesquisar']; ?></button>
              <a href="produtoCad.php" class="btn btn-primary"><?php echo $lng['novoRegistro']; ?></a>
            </div>
          </div>
        </form>
      </div>


    <div id="dados" class="mx-3">
      <div class="table-responsive">
        <table align="center" border=1 class="table table-light table-hover">
          <tr>
            <th><?php echo $lng['colDescricao']; ?>
            <th><?php echo $lng['colQuantidade']; ?>
            <th><?php echo $lng['colValor']; ?>
            <th><?php echo $lng['colSetor']; ?>
            <th><?php echo $lng['colStatus']; ?>
            <th><?php echo $lng['colOpcoes']; ?>
          </tr>

          <?php
            foreach( $dados as $linha )
            {
          ?>
          <tr>
            <td><?php echo htmlspecialchars( $linha->proDescricao ); ?></td>
            <td><?php echo $linha->proQuantidade; ?></td>
            <td><?php echo $linha->proValor; ?></td>
            <td><?php echo $linha->proSetor; ?></td>
            <td><?php echo $linha->proStatus; ?></td>
            <td><a href="produtoFormAlter.php?descricao=<?php echo urlencode($linha->proDescricao); ?>" class="btn btn-primary"><?php echo $lng['alterar']; ?></a></td>
          </tr>
          <?php
            }
          ?>
        </table>
      </div>
    </div>

<?php
  include_once("rodape.php");
?>