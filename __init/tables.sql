DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS articles;

CREATE TABLE admins
(
    id smallint unsigned not null auto_increment,
    creationDate TIMESTAMP not null default CURRENT_TIMESTAMP,
    username varchar(255) not null,
    password varchar(255) not null,
    PRIMARY KEY (id)
);

CREATE TABLE articles
(
    id smallint unsigned not null auto_increment,
    publicationDate TIMESTAMP not null default CURRENT_TIMESTAMP,
    title varchar(255) not null,
    description text not null,
    content mediumtext not null,

    PRIMARY KEY (id)
);
