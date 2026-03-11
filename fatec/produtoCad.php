<?php
    include_once("cabec.php");
?>

<div class="container">
  <div class="row justify-content-center">
    <h2 class="text-center mt-5 font-courier text-primary"><?php echo $lng['dadosProdutos']; ?></h2>

    <div>
        &nbsp;
    </div>

    <form action="produtoGrava.php">
        <div class="row justify-content-center text-light">
            <!-- 3 inputs -->
            <div class="col-5">
                <div class="mb-3">
                    <label for="nome"><?php echo $lng['colDescricao']; ?>:</label>
                    <input type="text" autocomplete="off" name="descricao" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="cliente"><?php echo $lng['colValor']; ?>:</label>
                    <input type="text" autocomplete="off" name="valor" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="fornecedor"><?php echo $lng['colStatus']; ?>:</label>
                    <input type="text" autocomplete="off" name="status" list="opstatus" class="form-control">
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
                    <input type="number" name="quant" class="form-control" min="0">
                </div>

                <div class="mb-3">
                    <label for="transporte"><?php echo $lng['colSetor']; ?>:</label>
                    <input type="number" name="setor" class="form-control" min="0">
                </div>

                    <div class="text-left">
                        <input type="submit" class="mb-5 col-lg-4 btn btn-primary" value="<?php echo $lng['gravar']; ?>">
                    </div>
            </div>
        </div>

        
    </form>
</div>
</div>

<?php
    include_once("rodape.php");
?>