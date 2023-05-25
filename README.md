# API GrupoA

Este é um guia sobre como executar o projeto da API em Laravel utilizando Docker. Para executar o projeto, é necessário ter o Docker instalado em sua máquina e seguir as instruções abaixo.

## Clonando o repositório

Clone o repositório do projeto Laravel utilizando o seguinte comando:

```bash
git clone git@github.com:henriquensco/backend-grupoa.git
```

Em seguida, acesse a pasta do projeto:

```bash
cd backend-grupoa
```

## Executando o container Docker

Para criar um container Docker, execute o seguinte comando estando na pasta do projeto:

```bash
docker-compose up -d
```

Isso criará o container para a API Laravel, o banco de dados MySQL e o servidor Nginx.

Verifique os containers criados executando o comando:

```bash
docker ps
```

## Instalando dependências e configurando a API

Para instalar as dependências do Laravel, execute o seguinte comando:

```bash
docker exec -t grupo-allo-backend-app-1 composer install
```

Em seguida, crie as tabelas no banco de dados:

```bash
docker exec -t grupo-allo-backend-app-1 php artisan migrate
```

## Executando a API

Para iniciar a API, execute o seguinte comando:

```bash
docker exec -t grupo-allo-backend-app-1 php artisan serve
```

## Executando testes

Para executar os testes da API, utilize o seguinte comando:

```bash
docker exec -t grupo-allo-backend-app-1 php artisan test
```

## Rotas

A API possui as seguintes rotas disponíveis:

### Autenticação e Registro

- POST `/api/auth/login`
- POST `/api/auth/register`
- GET `/api/auth/me`
- POST `/api/auth/logout`

### Rotas de Tarefas

- GET `/api/tasks`
- GET `/api/tasks/{uuid}`
- POST `/api/tasks/create`
- PUT `/api/tasks/update/{uuid}`
- DELETE `/api/tasks/delete/{uuid}`

Certifique-se de utilizar o endpoint correto para cada rota, substituindo `{uuid}` pelo identificador único da tarefa desejada.

Espero que essas instruções sejam úteis para executar o projeto Laravel utilizando Docker!