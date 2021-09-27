# Teste Nofaro

Este projeto é destinado a pôr em exercício o teste solicitado pela empresa Nofaro.

  

## Breifing

### Objetivo

- Criar uma API que permita a inclusão, listagem e remoção de pets e de atendimentosrealizados.

  

### Descrição

Um pet possui nome e espécie (cão ou gato). Quando um pet realiza um atendimento são registradas a data do atendimento e uma descrição.

A descrição é um campo de texto utilizado para informar o que foi realizado no atendimento.

  

### Um exemplo de informação que pode ser montada

“Em03/06/2020 o pet Bolinha (cão) ‘recebeu a primeira dose da vacina da gripe’”

### Cada pet pode realizar vários atendimentos:

- Inclusão

Ao incluir um pet ou seus atendimentos as seguintes validações devem ser feitas - Nome: obrigatório, com no mínimo 2 caracteres; - Espécie: obrigatório, sendo ‘C’ ou ‘G’ representado, respectivamente, cão ou gato; - Data do atendimento: obrigatório, com formato Y-m-d; - Descrição do atendimento: opcional, campo texto;

- Listagem

A lista de pets deve retornar todas as informações cadastradas de forma paginada.Deve ser possível filtrar os resultados pelo nome do pet.O nome poderá ser buscado por strings parciais.

- Remoção

Quando um pet é removido os atendimentos associados ao pet também devem ser removidos.

### Regras

- Utilizar Laravel

- Utilizar MySQL como base de dados

- Entregar o resultado através de um sistema de controle de versão (Github, Bitbucket, ...)

- Ter instruções de como utilizar os recursos da API

  

## Estrutura
Para resolução do problema foi criada uma api utilizando a estrutura padrão do Laravel para a abordagem.
Foram criadas 3 tabelas na base de dados para salvar os dados necessários.
![](https://i.ibb.co/zVMGN4z/nofaro-database.png)

Para fazer a arquitetura do projeto se seguiu uma arquitetura simples, no qual, existem 2 camadas de comunicação com a `Model`.
  ![enter image description here](https://i.ibb.co/JWYRmQ0/nofaro-arch.png)

## Uso
Para rodar o projeto é necessário ter o **docker** configurador e um terminal **bash**. Após o clonar o repositório, deve ser acessada a pasta raiz do projeto e rodado o comando: `sh run.sh` no terminal. Feito isso, só aguardar o projeto rodar e executar todos os scripts necessários.

Para consumir API, foi criada uma collection no Postman e disponibilizada pelo link: https://www.getpostman.com/collections/6f6fca9b6ea74c20cb95
Caso ocorra algum problema na visualização da collection, a lista de rotas segue abaixo:


**PETS:**

Buscar todos pets: **[GET]** `/api/pets`

Buscar todos pets filtrando pelo nome: **[GET]** `/api/pets/{name}`

Salvar novos pets: **[POST]** `/api/pets` ex corpo: `{ "name": "Thomas", "petType": "G" }`

Deletar pets: **[DELETE]** `/api/pets/{id}`



**ATTENDANCE:**

Buscar todos atendimentos: **[GET]** `/api/attendance`

Buscar todos atendimentos formatados no padrão solicitado: **[GET]** `/api/attendance/formatted`

Salvar novos atendimentos: **[POST]** `/api/attendance` ex corpo: `{ "name": "Kiko", "petType": "G", "dateAttendance": "2020-10-03", "description": "Feita visita" }`
  

Por fim, é isso. Qualquer dúvida estou a disposição:
