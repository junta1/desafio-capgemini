# desafio-capgemini

## Baixando projeto

`git clone https://github.com/junta1/desafio-capgemini.git`

## Levantar o Container

Acesse ao projeto e lavante o container: 

`docker-compose up -d`

Acesse ao container: 

`docker exec -it desafio-capgemini-php-fpm bash`

_Obs: Configure o projeto nos próximos passos._ 

## Configurando projeto

Depedências via composer:

`composer install`

Gere as migrations com as seeds:

`php artisan migrate:refresh --seed`

Altere as permissões:

`chmod -R 777 storage/ bootstrap/`

Copiar e colar o arquivo .env.example 
situado em (testeanalistajr/www/.env.example) para .env no mesmo local.

Defina a chave da aplicação:

`php artisan key:generate`

Depedências via nodejs:

`npm install && npm run dev`

Execute:
`npm run watch` 

Link para acessar a página inicial do projeto: <http://localhost:7979>

***Acesse com o usuário e senha:***

Usuário: admin@gmail.com

Senha: 12345678