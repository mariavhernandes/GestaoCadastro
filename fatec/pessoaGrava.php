<?php

$data = $_REQUEST;
extract($data);

include_once("config.php");
$conexao = db_connect();

// Insert com todos os campos
$sql = "INSERT INTO pessoa (
            pesNome, pesTipo, pesCliente, pesFornecedor, pesFunc, pesTransp,
            pesCEP, pesRua, pesNumero, pesComplemento, pesBairro, pesCidade, pesUF
        ) VALUES (
            :nome, :tipo, :cliente, :fornecedor, :funcao, :transporte,
            :cep, :rua, :numero, :complemento, :bairro, :cidade, :uf
        )";

$comando = $conexao->prepare($sql);

// Bind dos parâmetros
$comando->bindParam(':nome', $nome);
$comando->bindParam(':tipo', $tipo);
$comando->bindParam(':cliente', $cliente);
$comando->bindParam(':fornecedor', $fornecedor);
$comando->bindParam(':funcao', $funcao);
$comando->bindParam(':transporte', $transporte);
$comando->bindParam(':cep', $cep);
$comando->bindParam(':rua', $rua);
$comando->bindParam(':numero', $numero);
$comando->bindParam(':complemento', $complemento);
$comando->bindParam(':bairro', $bairro);
$comando->bindParam(':cidade', $cidade);
$comando->bindParam(':uf', $uf);

// Executa
$comando->execute();

// Redireciona
header('Location: pessoa.php');
exit;
?>
