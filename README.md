# x - Loja Online

Meu site do TCC - Desenvolvimento de Sistemas Profissionalizante

## Sobre o Projeto

Aplicação web de e-commerce desenvolvida em PHP com MySQL, permitindo cadastro de produtos, gerenciamento de carrinho e clientes.

## Requisitos

- PHP 8.1+
- MySQL 5.7+
- Apache com mod_rewrite

## Instalação Local

1. Clone o repositório
```bash
git clone <seu-repositorio>
cd x
```

2. Configure o arquivo `.env`
```bash
cp .env.example .env
```

3. Atualize as credenciais do banco de dados no `.env`

4. Importe o banco de dados
```bash
mysql -u root -p < database_x.sql
```

5. Acesse em `http://localhost`

## Deploy no Railway

### Opção 1: Via Railway CLI

```bash
npm install -g @railway/cli
railway login
railway link
railway up
```

### Opção 2: Via Dashboard Railway

1. Acesse [railway.app](https://railway.app)
2. Clique em "New Project"
3. Selecione "Deploy from GitHub"
4. Conecte seu repositório
5. Configure as variáveis de ambiente (MySQL)
6. Deploy automático

### Variáveis de Ambiente do Railway

O Railway fornecerá automaticamente:
- `MYSQLHOST`
- `MYSQLPORT`
- `MYSQLUSER`
- `MYSQLPASSWORD`
- `MYSQLDATABASE`

Essas variáveis são utilizadas pelo arquivo `conexao.php`.

## Estrutura do Projeto

```
x/
├── index.php              # Página principal
├── login.php              # Login
├── cadastro_login.php     # Cadastro de usuário
├── carrinho.php           # Carrinho de compras
├── conexao.php            # Conexão com BD
├── clientes/              # Gestão de clientes
├── produtos/              # Gestão de produtos
├── css/                   # Arquivos CSS
├── js/                    # Arquivos JavaScript
├── Dockerfile             # Configuração Docker
├── railway.toml           # Configuração Railway
└── .env.example           # Exemplo de variáveis
```

## Banco de Dados

Os arquivos de inicialização do banco de dados:
- `database_x.sql` - Schema principal
- `railway.sql` - Schema para Railway

## Suporte

Para dúvidas ou problemas, verifique a documentação do Railway: https://docs.railway.app
