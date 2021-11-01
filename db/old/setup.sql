-- drop table if exists MYSQL_DATABASE.users;
-- create table MYSQL_DATABASE.users (
--     id int not null auto_increment,
--     username text not null,
--     password text not null,
--     primary key (id)
-- );
-- insert into MYSQL_DATABASE.`users` (username, password) values
--     ("admin","password"),
--     ("Alice","this is my password"),
--     ("Job","12345678");

drop table if exists MYSQL_DATABASE.employees;
create table MYSQL_DATABASE.employees (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    salary INT(10) NOT NULL
);
-- insert into MYSQL_DATABASE.`employees` (username, password) values
--     ("admin","password"),
--     ("Alice","this is my password"),
--     ("Job","12345678");