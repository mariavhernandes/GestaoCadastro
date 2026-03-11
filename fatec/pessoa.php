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

  $sql = "SELECT pesNome, pesTipo, 
               pesCliente, pesFornecedor, pesFunc, pesTransp,
               pesCEP, pesRua, pesNumero, pesComplemento, pesBairro, pesCidade, pesUF
           FROM pessoa
           WHERE pesNome LIKE :pesquisa
           ORDER BY pesNome ";
  
  $comando = $conexao->prepare($sql);
  $comando->bindParam(':pesquisa', $pesquisa);
  $comando->execute();
        
  $dados = $comando->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid">
  <h3 class="text-center mt-5 font-courier text-primary"><?php echo $lng['cadPessoas']; ?></h3>

  <p>&nbsp;</p>

  <div class="col-12">
    <form name="pesquisa" action="pessoa.php" method="GET">
      <div class="row align-items-center mb-5 mx-3 g-3">
        <label for="pesquisa" class="col-auto col-form-label text-light"><?php echo $lng['nomePesquisar']; ?></label>
        <div class="col">
          <input type="text" name="pesquisa" id="pesquisa" class="form-control">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-outline-primary me-3"><?php echo $lng['pesquisar']; ?></button>
          <a href="pessoaCad.php?op=I" class="btn btn-primary"><?php echo $lng['novoRegistro']; ?></a>
        </div>
      </div>
    </form>
  </div>

  <div id="dados" class="mx-3">
    <div class="table-responsive">
      <table align="center" border=1 class="table table-light table-hover">
        <thead>
          <tr>
            <th><?php echo $lng['colNome']; ?></th>
            <th><?php echo $lng['colTipo']; ?></th>
            <th><?php echo $lng['colCliente']; ?></th>
            <th><?php echo $lng['colFornecedor']; ?></th>
            <th><?php echo $lng['colFuncao']; ?></th>
            <th><?php echo $lng['colTransporte']; ?></th>
            <th>CEP</th>
            <th><?php echo $lng['colRua']; ?></th>
            <th><?php echo $lng['colNumero']; ?></th>
            <th><?php echo $lng['colComplemento']; ?></th>
            <th><?php echo $lng['colBairro']; ?></th>
            <th><?php echo $lng['colCidade']; ?></th>
            <th><?php echo $lng['colUF']; ?></th>
            <th><?php echo $lng['colOpcoes']; ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $dados as $linha ) { ?>
          <tr>
            <td><?php echo htmlspecialchars( $linha->pesNome ); ?></td>
            <td><?php echo ($linha->pesTipo == 'F') ? "Fis" : "Jur"; ?></td>
            <td><?php echo $linha->pesCliente; ?></td>
            <td><?php echo $linha->pesFornecedor; ?></td>
            <td><?php echo $linha->pesFunc; ?></td>
            <td><?php echo $linha->pesTransp; ?></td>
            <td><?php echo htmlspecialchars( $linha->pesCEP ); ?></td>
            <td><?php echo htmlspecialchars( $linha->pesRua ); ?></td>
            <td><?php echo htmlspecialchars( $linha->pesNumero ); ?></td>
            <td><?php echo htmlspecialchars( $linha->pesComplemento ); ?></td>
            <td><?php echo htmlspecialchars( $linha->pesBairro ); ?></td>
            <td><?php echo htmlspecialchars( $linha->pesCidade ); ?></td>
            <td><?php echo htmlspecialchars( $linha->pesUF ); ?></td>
            <td>
              <a href="pessoaFormAlter.php?nome=<?php echo urlencode($linha->pesNome); ?>" class="btn btn-primary btn-sm"><?php echo $lng['alterar']; ?></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div> </div>
</div> <?php
  include_once("rodape.php");
?>