<?php
header('Content-Type: application/json');

$cep = $_REQUEST['cep'] ?? '';

$cep = preg_replace('/[^0-9]/', '', $cep);

if (strlen($cep) !== 8) {
    echo json_encode(['erro' => 'CEP inválido ou não informado']);
    exit;
}

$url = "https://brasilapi.com.br/api/cep/v1/{$cep}";

$dados_json = @file_get_contents($url);

if ($dados_json === FALSE) {
    echo json_encode(['erro' => 'Erro ao consultar. Tente novamente.']);
    exit;
}

$dados = json_decode($dados_json, true);

if (isset($dados['errors']) || isset($dados['message'])) {
    $mensagem_erro = $dados['message'] ?? 'CEP não encontrado ou inválido.';
    echo json_encode(['erro' => $mensagem_erro]);
    exit;
}

$rua = $dados['street'] ?? '';
$bairro = $dados['neighborhood'] ?? '';
$cidade = $dados['city'] ?? '';
$uf = $dados['state'] ?? '';
$complemento = ''; 

echo json_encode([
    'cep' => $cep,
    'rua' => $rua,
    'complemento' => $complemento,
    'bairro' => $bairro,
    'cidade' => $cidade,
    'uf' => $uf
]);
?>