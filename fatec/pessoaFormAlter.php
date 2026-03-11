<?php
include_once("cabec.php");
include_once("config.php");

$nome = $tipo = $cliente = $fornecedor = $funcao = $transporte = "";
$cep = $rua = $numero = $complemento = $bairro = $cidade = $uf = "";

if (isset($_GET["nome"])) {
    $nome = $_GET["nome"];

    // Conectando com PDO
    $conexao = db_connect();

    $sql = "SELECT * FROM pessoa WHERE pesNome = :nome";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();

    $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pessoa) {
        $tipo = $pessoa["pesTipo"];
        $cliente = $pessoa["pesCliente"];
        $fornecedor = $pessoa["pesFornecedor"];
        $funcao = $pessoa["pesFunc"];
        $transporte = $pessoa["pesTransp"];
        $cep = $pessoa["pesCEP"];
        $rua = $pessoa["pesRua"];
        $numero = $pessoa["pesNumero"];
        $complemento = $pessoa["pesComplemento"];
        $bairro = $pessoa["pesBairro"];
        $cidade = $pessoa["pesCidade"];
        $uf = $pessoa["pesUF"];
    }
}
?>

<div class="container">
  <div class="row justify-content-center">
    <h2 class="text-center mt-5 font-courier text-primary"><?php echo $lng['alteraDadosPessoa']; ?></h2>
    <div>&nbsp;</div>

    <form name="form_alter" method="POST" action="pessoaAlter.php">
        <div class="row justify-content-center text-light">
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nome"><?php echo $lng['colNome']; ?>:</label>
                    <input type="text" name="nome" autocomplete="off" value="<?php echo htmlspecialchars($nome) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="tipo"><?php echo $lng['colTipo']; ?>:</label>
                    <input type="text" id="tipo" name="tipo" autocomplete="off" list="optipo" value="<?php echo htmlspecialchars($tipo) ?>" class="form-control">
                    <datalist id="optipo">
                        <option value="F">Física</option>
                        <option value="J">Jurídica</option>
                    </datalist>
                </div>
                
                <div class="mb-3">
                    <label for="cliente"><?php echo $lng['colCliente']; ?>:</label>
                    <input type="text" id="cliente" name="cliente" autocomplete="off" list="opcli" value="<?php echo htmlspecialchars($cliente) ?>" class="form-control">
                    <datalist id="opcli">
                        <option>Sim</option>
                        <option>Não</option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="transporte"><?php echo $lng['colTransporte']; ?>:</label>
                    <input type="text" id="transporte" name="transporte" autocomplete="off" list="optrans" value="<?php echo htmlspecialchars($transporte) ?>" class="form-control">
                    <datalist id="optrans">
                        <option>Sim</option>
                        <option>Não</option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="fornecedor"><?php echo $lng['colFornecedor']; ?>:</label>
                    <input type="text" id="fornecedor" name="fornecedor" autocomplete="off" list="opfor" value="<?php echo htmlspecialchars($fornecedor) ?>" class="form-control">
                    <datalist id="opfor">
                        <option>Sim</option>
                        <option>Não</option>
                    </datalist>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" value="<?php echo htmlspecialchars($cep) ?>" class="form-control"> 
                </div>

                <div class="mb-3">
                    <label for="rua"><?php echo $lng['colRua']; ?>:</label>
                    <input type="text" name="rua" value="<?php echo htmlspecialchars($rua) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="numero"><?php echo $lng['colNumero']; ?>:</label>
                    <input type="text" name="numero" value="<?php echo htmlspecialchars($numero) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="complemento"><?php echo $lng['colComplemento']; ?>:</label>
                    <input type="text" name="complemento" value="<?php echo htmlspecialchars($complemento) ?>" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="cidade"><?php echo $lng['colCidade']; ?>:</label>
                    <input type="text" name="cidade" value="<?php echo htmlspecialchars($cidade) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="uf"><?php echo $lng['colUF']; ?>:</label>
                    <input type="text" name="uf" value="<?php echo htmlspecialchars($uf) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="bairro"><?php echo $lng['colBairro']; ?>:</label>
                    <input type="text" name="bairro" value="<?php echo htmlspecialchars($bairro) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="funcao"><?php echo $lng['colFuncao']; ?>:</label>
                    <input type="text" id="funcao" name="funcao" autocomplete="off" list="opfun" value="<?php echo htmlspecialchars($funcao) ?>" class="form-control">
                    <datalist id="opfun">
                        <option>Sim</option>
                        <option>Não</option>
                    </datalist>
                </div>
                
                <div class="text-center mt-4">
                    <input type="hidden" name="nome_original" value="<?php echo htmlspecialchars($nome) ?>">
                    <input type="submit" name="botao" class="mb-5 col-lg-6 btn btn-primary" value="<?php echo $lng['alterar']; ?>">
                </div>
            </div>
        </div> 
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('cep');

    if (cepInput) {
        // Função para buscar e preencher o endereço
        const buscarCep = function() {
            let cep = cepInput.value.replace(/\D/g, '');

            if (cep.length === 8) {
                // Se o campo estiver vazio, não faz nada ao sair
                if (cepInput.value.trim() === '') return; 

                fetch(`pesquisaCEP.php?cep=${cep}`)
                    .then(response => response.json())
                    .then(dados => {
                        if (dados.erro) {
                            // Limpa os campos em caso de erro
                            document.querySelector('input[name="rua"]').value = '';
                            document.querySelector('input[name="bairro"]').value = '';
                            document.querySelector('input[name="cidade"]').value = '';
                            document.querySelector('input[name="uf"]').value = '';
                            document.querySelector('input[name="complemento"]').value = '';
                            
                            alert(dados.erro);
                            return;
                        }

                        // Preenche os campos com os dados da API
                        document.querySelector('input[name="rua"]').value = dados.rua || '';
                        document.querySelector('input[name="bairro"]').value = dados.bairro || '';
                        document.querySelector('input[name="cidade"]').value = dados.cidade || '';
                        document.querySelector('input[name="uf"]').value = dados.uf || '';
                        document.querySelector('input[name="complemento"]').value = dados.complemento || '';
                        
                        // Opcional: Foca no campo número após preencher
                        document.querySelector('input[name="numero"]').focus();
                    })
                    .catch(() => alert('Erro na comunicação com o servidor de CEP.'));
            }
        };
        
        // Evento 1: Ao sair do campo (Tab ou clique fora)
        cepInput.addEventListener('blur', buscarCep);

        // Evento 2: Ao pressionar Enter no campo CEP
        cepInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Impede o envio do formulário
                buscarCep();
                // O blur (que já chama buscarCep) também faria isso, mas buscarCep() é mais direto.
            }
        });
    } else {
        console.error("ERRO JS: Campo com ID 'cep' não encontrado. O preenchimento automático não funcionará.");
    }
});
</script>
<?php
include_once("rodape.php");
?>