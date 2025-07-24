<?php
// Permite o acesso de qualquer origem (CORS)
header("Access-Control-Allow-Origin: *");
// Define o tipo de retorno como JSON
header("Content-Type: application/json");

// Verifica se o método da requisição é GET. Caso contrário, retorna erro 405 (Método não permitido)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Código HTTP para método não permitido
    echo json_encode(['erro' => 'Método não permitido']);
    exit;
}

// Lista fixa de produtos (mock)
$produtos = [
  ["id" => 1, "nome"  => "Camiseta Branca", "descricao"     => "100% algodão, unissex", "preco"    => 59.90, "categoria"  => "Roupas"],
  ["id" => 2, "nome"  => "Calça Jeans", "descricao"         => "Azul escuro, corte slim", "preco"  => 120.00, "categoria" => "Roupas"],
  ["id" => 3, "nome"  => "Tênis Esportivo", "descricao"     => "Ideal para corrida", "preco"       => 230.50, "categoria" => "Calçados"],
  ["id" => 4, "nome"  => "Jaqueta Corta-Vento", "descricao" => "Impermeável e leve", "preco"       => 179.99, "categoria" => "Roupas"],
  ["id" => 5, "nome"  => "Boné Preto", "descricao"          => "Ajustável, aba curva", "preco"     => 39.90, "categoria"  => "Acessórios"],
  ["id" => 6, "nome"  => "Meia Esportiva", "descricao"      => "Pacote com 3 pares", "preco"       => 29.90, "categoria"  => "Roupas"],
  ["id" => 7, "nome"  => "Camisa Social", "descricao"       => "Branca, manga longa", "preco"      => 89.00, "categoria"  => "Roupas"],
  ["id" => 8, "nome"  => "Cinto de Couro", "descricao"      => "Couro legítimo, marrom", "preco"   => 65.00, "categoria"  => "Acessórios"],
  ["id" => 9, "nome"  => "Relógio Digital", "descricao"     => "À prova d’água", "preco"           => 150.00, "categoria" => "Acessórios"],
  ["id" => 10, "nome" => "Óculos de Sol", "descricao"       => "Proteção UV 400", "preco"          => 99.90, "categoria"  => "Acessórios"],
  ["id" => 11, "nome" => "Mochila Escolar", "descricao"     => "Vários compartimentos", "preco"    => 139.00, "categoria" => "Bolsas/Mochilas"],
  ["id" => 12, "nome" => "Tênis Casual", "descricao"        => "Estilo urbano", "preco"            => 200.00, "categoria" => "Calçados"],
  ["id" => 13, "nome" => "Camisa Polo", "descricao"         => "Algodão premium", "preco"          => 79.90, "categoria"  => "Roupas"],
  ["id" => 14, "nome" => "Bermuda Sarja", "descricao"       => "Cinza, bolsos laterais", "preco"   => 89.90, "categoria"  => "Roupas"],
  ["id" => 15, "nome" => "Pulseira Fitness", "descricao"    => "Contador de passos", "preco"       => 99.00, "categoria"  => "Tecnologia"],
  ["id" => 16, "nome" => "Gorro de Lã", "descricao"         => "Ideal para inverno", "preco"       => 25.00, "categoria"  => "Acessórios"],
  ["id" => 17, "nome" => "Chinelo Slide", "descricao"       => "Confortável e leve", "preco"       => 45.00, "categoria"  => "Calçados"],
  ["id" => 18, "nome" => "Camiseta Estampada", "descricao"  => "Arte exclusiva", "preco"           => 69.90, "categoria"  => "Roupas"],
  ["id" => 19, "nome" => "Jaqueta Jeans", "descricao"       => "Azul claro, estilo retrô", "preco" => 160.00, "categoria" => "Roupas"],
  ["id" => 20, "nome" => "Carteira Masculina", "descricao"  => "Couro sintético", "preco"          => 49.90, "categoria"  => "Acessórios"],
  ["id" => 21, "nome" => "Saia Jeans", "descricao"          => "Com botão frontal", "preco"        => 95.00, "categoria"  => "Roupas"],
  ["id" => 22, "nome" => "Blusa Cropped", "descricao"       => "Manga bufante", "preco"            => 59.00, "categoria"  => "Roupas"],
  ["id" => 23, "nome" => "Sandália Rasteira", "descricao"   => "Tiras cruzadas", "preco"           => 89.90, "categoria"  => "Calçados"],
  ["id" => 24, "nome" => "Vestido Floral", "descricao"      => "Curto e leve", "preco"             => 119.00, "categoria" => "Roupas"],
  ["id" => 25, "nome" => "Macacão Feminino", "descricao"    => "Modelo pantacourt", "preco"        => 149.90, "categoria" => "Roupas"],
];

// Filtragem de produtos pelo parâmetro "search", se fornecido
if (isset($_GET['search'])) {
    // Remove espaços e normaliza para minúsculo
    $search = strtolower($_GET['search']);
    // Filtra os produtos cujo nome contenha o termo pesquisado
    $produtos = array_filter($produtos, fn($p) => str_contains(strtolower($p['nome']), $search));
    // Reindexa os resultados filtrados para manter índice sequencial
    $produtos = array_values($produtos);
}

// Retorna os dados como JSON com formatação bonita e suporte a acentuação
echo json_encode($produtos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
