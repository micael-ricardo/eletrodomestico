# Eletrodomestico

Este é um projeto de API Restful e frontend simples para cadastro, edição, listagem e exclusão de eletrodomésticos.<p>
A API foi desenvolvida utilizando o framework Laravel e o frontend foi construído com Vue.js.<p>

## Funcionalidades

- Adicionar eletrodomésticos à lista
- Remover eletrodomésticos da lista
- Atualizar informações de eletrodomésticos existentes
- Visualizar a lista de eletrodomésticos

## Pré-requisitos

Antes de executar o projeto, certifique-se de ter as seguintes ferramentas instaladas em seu sistema:<p>
- PHP (versão 8.2.4)
- Composer (versão 2.5.4)
- Servidor Web (Apache, Nginx, etc.)
- Banco de dados MariaDB
- Node.js

## Instalação

1. Clone este repositório: `git clone https://github.com/micael-ricardo/eletrodomestico.git`
2. Navegue até o diretório do projeto: `cd eletrodomestico`
3. Instale as dependências do projeto usando o Composer: ` composer install`
4. Instale as dependências do frontend usando o NPM: `npm install`
5. Copie o arquivo de configuração .env.example para .env: `cp .env.example .env`
6. Gere a chave de criptografia do Laravel:`php artisan key:generate`
7. Execute as migrações do banco de dados: `php artisan migrate`
8. Inicie o servidor de desenvolvimento do Laravel: `php artisan serve`
9. Em outro terminal, navegue até o diretório do projeto e execute o comando para compilar os arquivos JavaScript do Vue.js: `npm run dev`


## Uso

- Acesse a aplicação no seu navegador: `http://localhost:8000/`


