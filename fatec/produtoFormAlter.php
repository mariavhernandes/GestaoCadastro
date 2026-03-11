<?php
  include_once("cabec.php");
?>

<?php
  include_once("cabec.php");
  include_once("config.php");

  $descricao = "";
  $valor = "";
  $status = "";
  $quant = "";
  $setor = "";

  if (isset($_GET["descricao"])) {
    $descricao = $_GET["descricao"];

    // Conectando com PDO
    $conexao = db_connect();

    $sql = "SELECT * FROM produto WHERE proDescricao = :descricao";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->execute();

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        $descricao = $produto["proDescricao"];
        $valor = $produto["proValor"];
        $status = $produto["proStatus"];
        $quant = $produto["proQuantidade"];
        $setor = $produto["proSetor"];
    }

  }
?>


<div class="container">
  <div class="row justify-content-center">
    <h2 class="text-center mt-5 font-courier text-primary"><?php echo $lng['alteraDadosPessoa']; ?></h2>

    <div>
        &nbsp;
    </div>

    <form method="POST" action="produtoAlter.php">
        <div class="row justify-content-center text-light">
            <!-- 3 inputs -->
            <div class="col-5">
                <div class="mb-3">
                    <label for="nome"><?php echo $lng['colDescricao']; ?>:</label>
                    <input type="text" autocomplete="off" name="descricao" value="<?php echo $descricao ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="cliente"><?php echo $lng['colValor']; ?>:</label>
                    <input type="text" autocomplete="off" name="valor" value="<?php echo $valor ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="fornecedor"><?php echo $lng['colStatus']; ?>:</label>
                    <input type="text" autocomplete="off" name="status" list="opstatus" value="<?php echo $status ?>" class="form-control">
                    <datalist id="opstatus">
                    <option value="A"><?php echo $lng['statusAtivo']; ?></option>
                    <option value="I"><?php echo $lng['statusInativo']; ?></option>
                    </datalist>
                </div>
            </div>

            <!-- outros 2 inputs -->
            <div class="col-5">
                <div class="mb-3">
                    <label for="funcao"><?php echo $lng['colQuantidade']; ?>:</label>
                    <input type="number" name="quant" value="<?php echo $quant ?>" class="form-control" min="0">
                </div>

                <div class="mb-3">
                    <label for="transporte"><?php echo $lng['colSetor']; ?>:</label>
                    <input type="number" name="setor" value="<?php echo $setor ?>" class="form-control" min="0">
                </div>

                    <div class="text-left">
                        <input type="hidden" name="nome_original" value="<?php echo $descricao ?>">
                        <input type="submit" name="botao" class="mb-5 col-lg-4 btn btn-primary" value="<?php echo $lng['alterar']; ?>">
                    </div>
            </div>
        </div>

        
    </form>

<?php
  include_once("rodape.php");
?>