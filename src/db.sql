CREATE DATABASE ddl;
CREATE TABLE country (
    id int(4) auto_increment primary key,
    country_name varchar(30) unique not null
    );
CREATE TABLE ville (
    id int(4) auto_increment primary key,
    city_name varchar(30) unique not null
    country_id int(4) not null
    constraint fk_pays  Foreign key (country_id) REFERENCES country(id)
);
