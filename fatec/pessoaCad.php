<?php
include_once("cabec.php");
?>

<div class="container">
  <div class="row justify-content-center">
    <h2 class="text-center mt-5 font-courier text-primary"><?php echo $lng['dadosPessoa']; ?></h2>
    <div>&nbsp;</div>

    <form action="pessoaGrava.php" method="POST">
        <div class="row justify-content-center text-light">
            <!-- Primeira coluna -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nome"><?php echo $lng['colNome']; ?>:</label>
                    <input type="text" name="nome" autocomplete="off" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="funcao"><?php echo $lng['colFuncao']; ?>:</label>
                    <input type="text" id="funcao" name="funcao" autocomplete="off" list="opfun" class="form-control">
                    <datalist id="opfun">
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="fornecedor"><?php echo $lng['colFornecedor']; ?>:</label>
                    <input type="text" id="fornecedor" name="fornecedor" autocomplete="off" list="opfor" class="form-control">
                    <datalist id="opfor">
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="cliente"><?php echo $lng['colCliente']; ?>:</label>
                    <input type="text" id="cliente" name="cliente" autocomplete="off" list="opcli" class="form-control">
                    <datalist id="opcli">
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="transporte"><?php echo $lng['colTransporte']; ?>:</label>
                    <input type="text" id="transporte" name="transporte" autocomplete="off" list="optrans" class="form-control">
                    <datalist id="optrans">
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </datalist>
                </div>
            </div>

            <!-- Segunda coluna -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="tipo"><?php echo $lng['colTipo']; ?>:</label>
                    <input type="text" id="tipo" name="tipo" autocomplete="off" list="optipo" class="form-control">
                    <datalist id="optipo">
                        <option value="F"><?php echo $lng['fisica']; ?></option>
                        <option value="J"><?php echo $lng['juridica']; ?></option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="rua"><?php echo $lng['colRua']; ?>:</label>
                    <input type="text" name="rua" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="numero"><?php echo $lng['colNumero']; ?>:</label>
                    <input type="text" name="numero" class="form-control">
                </div>    
            </div>

            <!-- Terxceira coluna -->
            <div class="col-4">
                <div class="mb-3">
                    <label for="cidade"><?php echo $lng['colCidade']; ?>:</label>
                    <input type="text" name="cidade" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="uf"><?php echo $lng['colUF']; ?>:</label>
                    <input type="text" name="uf" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="bairro"><?php echo $lng['colBairro']; ?>:</label>
                    <input type="text" name="bairro" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="complemento"><?php echo $lng['colComplemento']; ?>:</label>
                    <input type="text" name="complemento" class="form-control">
                </div>

                <div class="text-left">
                    <input type="submit" class="mb-5 col-lg-4 btn btn-primary" value="<?php echo $lng['gravar']; ?>">
                </div>
            </div>
        </div> 
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('cep');

    cepInput.addEventListener('blur', function() {
        let cep = cepInput.value.replace(/\D/g, '');

        if (cep.length === 8) {
            fetch(`pesquisaCEP.php?cep=${cep}`)
                .then(response => response.json())
                .then(dados => {
                    if (dados.erro) {
                        alert(dados.erro);
                        return;
                    }

                    document.querySelector('input[name="rua"]').value = dados.rua || '';
                    document.querySelector('input[name="bairro"]').value = dados.bairro || '';
                    document.querySelector('input[name="cidade"]').value = dados.cidade || '';
                    document.querySelector('input[name="uf"]').value = dados.uf || '';
                    document.querySelector('input[name="complemento"]').value = dados.complemento || '';
                })
                .catch(() => alert('Erro ao buscar o CEP. Verifique sua conexão.'));
        }
    });

    cepInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            cepInput.blur();
        }
    });
});
</script>

<?php
include_once("rodape.php");
?>
