Projeto para estudar Laravel8, utilizando infra montada no Docker

Ao baixar o projeto, verificar:

1 - Alterar o arquivo docker-compose.yml (OPCIONAL, necessário apenas se alguma das portas que os containers usam já estiver sendo utilizado por outra aplicação. Também é possível alterar o nome dos containers)

2 - Supondo que nada foi alterado no docker-compose, montar as imagens e subir os containers (docker-compose up -d)

3 - Executar os seguintes comandos no container que roda o apache, através do comando docker-compose exec nome_do_container comando (na opção padrão é o php-apache, logo, todos os comandos começam com docker-compose exec php-apache2 comando):

- compose install

- php artisan migrate

- cp .env.example .env

Além de copiar esse arquivo, alterar as configurações para conectar com o container do banco. Se nada foi alterado, fica:

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=MYSQL_DATABASE
DB_USERNAME=MYSQL_USER
DB_PASSWORD=MYSQL_PASSWORD

- php artisan key:generate

O projeto estará disponível na máquina host, através do endereço:

http://localhost/