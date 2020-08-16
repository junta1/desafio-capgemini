# Desafio Capgemini

## Baixando projeto

`git clone https://github.com/junta1/desafio-capgemini.git`

## Levantar o Container

Acesse ao projeto e lavante o container: 

`docker-compose up -d`

Verifique se todos os containers foram levantados executando:

`docker ps`

Estes containers devem estar em funcionamento:

`desafio-capgemini-mysql`
`desafio-capgemini-webserver`
`desafio-capgemini-php-fpm`

Acesse ao container: 

`docker exec -it desafio-capgemini-php-fpm bash`

## Configurando projeto

Depedências via composer:

`composer install`

Altere as permissões:

`chmod -R 777 storage/ bootstrap/`

Copiar e colar o arquivo .env.example 
situado em (testeanalistajr/www/.env.example) para .env no mesmo local ou executar o comando:

`cp .env.example  .env`

Defina a chave da aplicação:

`php artisan key:generate`

Gere as migrations com as seeds:

`php artisan migrate:refresh --seed`

Depedências via nodejs:

`npm install && npm run dev`

Execute:
`npm run watch` 

Link para acessar a página inicial do projeto: <http://localhost:7979>

***Acesse com o usuário e senha:***

Usuário: admin@gmail.com

Senha: 12345678
