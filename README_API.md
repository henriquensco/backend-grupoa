# Api GrupoA

Este é um guia de como executar o projeto de API em Laravel utilizando Docker.
Para realizar a execução do projeto, é necessário ter Docker instalado na sua máquina e seguir as instruções abaixo.

### Clonando o repositório:

```bach
git clone git@github.com:henriquensco/backend-grupoa.git
```

Em seguida, acesse a pasta do projeto:
```bach
backend-grupoa
```

### Executando Container Docker
Para criar um container Docker, execute o comando abaixo, estando na pasta do projeto.
```bach
docker-compose up -d
```

A partir desse ponto, será criado o container da API Laravel, do Banco de Dados MySQL e também no Nginx.

```bach
docker ps
```
Ao executar esse comando, será listado os containers criados.

### Instalando dependências e configurações da API

Instalar pacotes do Laravel:

```bach
docker exec -t gropo-allo-backend-app-1 composer install
```
Criando as tabelas no banco de dados:
```bach
docker exec -t gropo-allo-backend-app-1 php artisan migrate
```

Executando a API:
```bach
docker exec -t gropo-allo-backend-app-1 php artisan serve
```

Executando testes:
```bach
docker exec -t gropo-allo-backend-app-1 php artisan test
```


## Rotas

Autenticação e Registro
```
/api/auth/login
/api/auth/register
/api/auth/me
/api/auth/logout
```

Rotas de Tarefas
```
api/tasks
api/tasks/{uuid}
api/tasks/create
api/tasks/update/{uuid}
api/tasks/delete/{uuid}
```