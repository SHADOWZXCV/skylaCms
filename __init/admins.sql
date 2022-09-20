DROP TABLE IF EXISTS admins;
CREATE TABLE admins
(
    id smallint unsigned not null auto_increment,
    creationDate date not null,
    username varchar(255) not null,
    password varchar(255) not null,
    PRIMARY KEY (id)
);
