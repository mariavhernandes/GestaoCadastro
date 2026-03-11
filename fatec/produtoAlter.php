<?php
  include_once('config.php');

  if (isset($_POST['botao'])) {
    // Faz conexão
    $conexao = db_connect();

    // Recupera os dados
    $nome_original = $_POST['nome_original']; // vem do campo hidden
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];
    $quant = $_POST['quant'];
    $setor = $_POST['setor'];

    // Monta o UPDATE usando PDO
    $sqlUpdate = "UPDATE produto SET proDescricao=:descricao, proValor=:valor, proStatus=:status, proQuantidade=:quant, proSetor=:setor
      WHERE proDescricao = :nome_original";

    $stmt = $conexao->prepare($sqlUpdate);

    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':quant', $quant);
    $stmt->bindParam(':setor', $setor);
    $stmt->bindParam(':nome_original', $nome_original);

    if ($stmt->execute()) {
      header('Location: produto.php');
      exit;
    } else {
      echo "Erro ao atualizar.";
    }
  }
?>
