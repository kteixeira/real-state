# MOVING - REAL STATE [BETA]

Sistema de gerenciamento de Imobiliárias.
- O sistema está dividido em duas partes, uma API Rest, com autenticação Oauth 2.0 e um sistema web.

## Tecnologias
* PHP
* MySQL
* Laravel 5.5
* Guzzle
* Composer

## Instalação

* Composer
  - Caso não tenha, veja como instalar na [Documentação Oficial](https://getcomposer.org/download/)
  
* Npm
  - Caso não tenha, veja como instalar na [Documentação Oficial](https://www.npmjs.com/get-npm/)

* Instruções
  - Clone o projeto em seu local.
  - Rode o comando composer install.
  - Rode o comando npm install.
  - Faça uma cópia do arquivo */.env.example* para /.emv e configure sua base de dados.
  - Gere a APP_KEY com o comando php artisan key:generate.
  - Rode o comando php artisan migrate para gerar as tabelas do banco de dados.
  - Faça a inserção dos clients da API com o arquivo **oauth_clients.sql** que encontra-se
  na raiz do projeto.
  - Dê start em um servidor de testes com o comando: php artisan serve, o comando dará start em
  um servidor na porta 8000, use-a para utilizar a API.
  - Dê start em outro servidor de testes com o comando php artisan serve --port=8080,
  use esta porta para utilizar o sistema Web.

#### Observação
- O arquivo  **ouauth_clients.sql** encontra-se na raiz do projeto e é um script em SQL 
a criação de clients na API.

-------------------------------------------------------------------------------------------------------


# API

### Real State

#### Create Real State

* URL
  * /real_states
  
* Method
  * POST
  
* URL Params required: [name, description] 

* Body
  * {"name":"Imobiliária 1","description":"Imobiliária Número Um"}
  
* Success Response
  * Code: 200
  * Content: {"id":1,"name":"Imobiliária 1","description":"Imobiliária Número Um"}
  
#### Update Real State

* URL
  * /real_states/:id
  
* Method
  * PUT
  
* Body
  * {"name":"Imobiliária 1","description":"Imobiliária Número 1"}
  
* Success Response
  * Code: 200
  * Content: {"id":1,"name":"Imobiliária 1","description":"Imobiliária Número 1"}
  
#### Get Real State

* URL
  * /real_states/:id
  
* Method
  * GET
    
* Success Response
  * Code: 200
  * Content: [{"id":1,"name":"Imobiliária 1","description":"Imobiliária Número 1"}]

#### Get Real States

* URL
  * /real_states
  
* Method
  * GET
    
* Success Response
  * Code: 200
  * Content: [{"id":1,"name":"Imobiliária 1","description":"Imobiliária Número 1"}, {"id":2,"name":"Imobiliária 2","description":"Imobiliária Número 2"},
  {"id":3,"name":"Imobiliária 3","description":"Imobiliária Número 3"}]

#### Delete Real State

* URL
  * /real_states/:id
  
* Method
  * DELETE
  
* Success Response
  * Code: 200
  * Content: {error:false,"message":"Imobiliária deletada com sucesso"}


### Properties

#### Create Property

* URL
  * /properties
  
* Method
  * POST
  
* URL Params required: [real_states_id, type, description, address] 

* Body
  * {"real_state_id": 1,"type": 1,"description":"Apartamento da Imobiliária 1","address":"Rua teste, 102"}
  
* Success Response
  * Code: 200
  * Content: {"id":1,"real_state_id": 1,"type": 1,"description":"Apartamento da Imobiliária 1","address":"Rua teste, 102"}
  
#### Update Property

* URL
  * /properties/:id
  
* Method
  * PUT
  
* Body
  * {"real_state_id": 1,"type": 0,"description":"Casa da Imobiliária 1","address":"Rua teste, 102"}
  
* Success Response
  * Code: 200
    * {"id":"1","real_state_id": 1,"type": 0,"description":"Casa da Imobiliária 1","address":"Rua teste, 102"}
  
#### Get Real State

* URL
  * /properties/:id
  
* Method
  * GET
    
* Success Response
  * Code: 200
  * Content: [{"real_state_id": 1,"type": 0,"description":"Casa da Imobiliária 1","address":"Rua teste, 102"}]

#### Get Real States

* URL
  * /properties
  
* Method
  * GET
    
* Success Response
  * Code: 200
  * Content: [{"id":1,"real_state_id": 1,"type": 0,"description":"Casa da Imobiliária 1","address":"Rua teste, 102"},
  {"id":2,"real_state_id": 2,"type": 1,"description":"Apartaento da Imobiliária 2","address":"Rua teste, 1202"},
  {"id":3,"real_state_id": 1,"type": 1,"description":"Apartaento da Imobiliária 1","address":"Rua teste, 10222"}]

#### Delete Real State

* URL
  * /properties/:id
  
* Method
  * DELETE
  
* Success Response
  * Code: 200
  * Content: {error:false,"message":"Propriedade deletada com sucesso"}

