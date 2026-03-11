<?php
include_once('config.php');

if (isset($_POST['botao'])) {
    // Faz conexão
    $conexao = db_connect();

    // Recupera os dados do formulário
    $nome_original = $_POST['nome_original']; // vem do campo hidden
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $cliente = $_POST['cliente'];
    $fornecedor = $_POST['fornecedor'];
    $funcao = $_POST['funcao'];
    $transporte = $_POST['transporte'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    // Monta o UPDATE usando PDO
    $sqlUpdate = "UPDATE pessoa SET 
        pesNome = :nome, 
        pesTipo = :tipo, 
        pesCliente = :cliente, 
        pesFornecedor = :fornecedor, 
        pesFunc = :funcao, 
        pesTransp = :transporte,
        pesCEP = :cep,
        pesRua = :rua,
        pesNumero = :numero,
        pesComplemento = :complemento,
        pesBairro = :bairro,
        pesCidade = :cidade,
        pesUF = :uf
    WHERE pesNome = :nome_original";

    $stmt = $conexao->prepare($sqlUpdate);

    // Faz o bind dos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':fornecedor', $fornecedor);
    $stmt->bindParam(':funcao', $funcao);
    $stmt->bindParam(':transporte', $transporte);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':uf', $uf);
    $stmt->bindParam(':nome_original', $nome_original);

    // Executa a query
    if ($stmt->execute()) {
        header('Location: pessoa.php');
        exit;
    } else {
        echo "Erro ao atualizar.";
    }
}
?>
