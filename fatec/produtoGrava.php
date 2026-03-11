<?php

	$data = $_REQUEST;

	extract($data);

	include_once("config.php");

	$conexao = db_connect();

	$sql = "insert into produto(proDescricao, proQuantidade, proValor, proSetor, proStatus) 
			values(:descricao, :quant, :valor, :setor, :status)";
	
	$comando = $conexao->prepare($sql);

	$comando->bindParam(':descricao', $descricao);
    $comando->bindParam(':quant', $quant);
	$comando->bindParam(':valor', $valor);
	$comando->bindParam(':setor', $setor);
    $comando->bindParam(':status', $status);

	$comando->execute();

	header('location: produto.php');
	
?>