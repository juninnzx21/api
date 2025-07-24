# 🛍️ API REST de Produtos em PHP

Esta é uma API REST simples desenvolvida em PHP puro. Ela retorna uma lista de produtos em formato JSON e permite filtragem pelo nome via query string (`search`).

---

## 📌 Endpoints

### `GET /api/produtos`

Retorna uma lista com 25 produtos simulados (mock), contendo os seguintes campos:

- `id` (int)
- `nome` (string)
- `descricao` (string)
- `preco` (float)
- `categoria` (string)

---

## 🔍 Filtro por nome (`search`)

Você pode passar um parâmetro `search` via GET para filtrar os produtos pelo nome.

### Exemplo:

GET /api/produtos?search=camiseta


### Resposta:
```json
[
  {
    "id": 1,
    "nome": "Camiseta Branca",
    "descricao": "100% algodão, unissex",
    "preco": 59.9,
    "categoria": "Roupas"
  },
  {
    "id": 18,
    "nome": "Camiseta Estampada",
    "descricao": "Arte exclusiva",
    "preco": 69.9,
    "categoria": "Roupas"
  }
]
```

🚫 Requisições inválidas
Caso o método HTTP não seja GET, a API retorna a seguinte resposta:



{
  "erro": "Método não permitido"
}


Com o código HTTP:



405 Method Not Allowed



🚀 Como usar

1. Clone este repositório:


git clone https://github.com/seu-usuario/api-produtos-php.git



2. Coloque o arquivo index.php em um servidor com suporte a PHP, como:

    * XAMPP

    * WAMP

    * Apache    

    * Nginx

Ou utilize o servidor embutido do PHP


3. Acesse a API via navegador ou por ferramentas como Postman ou cURL:

```bash

curl http://localhost/api-produtos/index.php

```

🛠 Requisitos

    *PHP 7.4 ou superior

    *Servidor HTTP (Apache/Nginx ou embutido com php -S)

💡 Executar localmente com servidor embutido do PHP

    Se quiser testar sem Apache/Nginx, execute o comando abaixo dentro da pasta do projeto:
      
            php -S localhost:8000
      
    E acesse no navegador:

    http://localhost:8000/index.php

