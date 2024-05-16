CREATE DATABASE eventManager_db;

create table events(
    events_id int PRIMARY key not null AUTO_INCREMENT,
    date_events DATE,
    time_events TIME,
    lieu_events VARCHAR(50),
    description_events VARCHAR(50)
    usersId int,
    CONSTRAINT `fk_events_users`
    FOREIGN KEY (usersId) REFERENCES users (users_id)
);

create table users(
    users_id int primary key not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    email varchar(50),
    password varchar(50),
    role varchar(50),

    );