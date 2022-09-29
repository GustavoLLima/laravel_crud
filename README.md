Projeto no Laravel8, utilizando infra própria montada no Docker. Trata-se de um protótipo de um sistema de cadastro/pesquisa da qualidade de itens em um MMORPG (nesse caso, pensou-se nos atributos relacionados ao Diablo II: Resurrected). O sistema conta com CRUD de tipos, níveis e itens. Cada item está relacionado à um tipo, um nível, além de outros atributos.

A estrutura das pastas é a seguinte:

- apache - Contém o arquivo de configuração do servidor web utilizado para rodar o Laravel.
- src - Pasta que contém o projeto a ser executado, nesse caso, o Laravel.
- db - Contém o Dockerfile referente ao container do banco de dados. Nesse projeto foi utilizado o MySQL.
- php - Contém o Dockerfile referente ao container do servidor web. Esta estrutura usa o apache.

Além das pastas, o docker-compose.yml está na raíz do projeto. Nesse arquivo é possível ver como o projeto foi estruturado no Docker. Toda a configuração das portas de uso (80 para o servidor web, 8080 para o SGBD phpmyadmin e 3306 para o db) é feita nesse arquivo. É necessário verificar se as portas não irão entrar em conflito por outros projetos que já estejam sendo executado no host. Também é possível alterar o nome dos containers nesse arquivo. É recomendado ter cuidado ao alterar esse arquivo, tanto no nome dos containers quanto nas portas, pois esses dados são utilizados em várias prates do sistema. Por exemplo, o laravel usa o nome do container do banco de dados (db) para conectar.

Para baixar e executar o projeto, basta seguir os passos abaixo:

1 - Clonar o projeto.

2 - Montar as imagens e os containers no Docker através do comando:

```
docker-compose up -d
```

ps: Se for no windows, pode necessário adicionar a pasta no "file sharing resources", mais dicas em: https://stackoverflow.com/questions/60754297/docker-compose-failed-to-build-filesharing-has-been-cancelled

3 - Abrir um terminal interativo com o container do servidor web para executar todos os comandos seguintes:

```
docker exec -it php-apache /bin/bash
```

4 - Uma vez que a estrutura esteja montada, instalar os pacotes necessários para rodar o projeto:

```
composer install
```

5 - Gerar o arquivo .env (pode ser copiando o example: cp .env.example .env) e alterar essas linhas:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=MYSQL_DATABASE
DB_USERNAME=MYSQL_USER
DB_PASSWORD=MYSQL_PASSWORD
```

6 - Gerar uma chave de segurança para o Laravel, limpar o cache das rotas e executar o migrate com seed para montar o banco e popular a tabela:

```
php artisan key:generate
php artisan route:cache
php artisan migrate:fresh --seed
```

Se tudo ocorreu corretamente, a home do Laravel estará disponível na máquina host, através do endereço:

http://localhost/

A home está em:

http://localhost/dashboard

O seed gera alguns dados iniciais apenas para ter uma visão geral do sistema. No login, o usuário criado por padrão utiliza como login/senha:
```
testuser@gmail.com
123456789
```

O cadastro de um novo usuário pode ser feito em:

http://localhost/register
