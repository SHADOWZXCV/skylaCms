DROP TABLE IF EXISTS articles;
CREATE TABLE articles
(
    id smallint unsigned not null auto_increment,
    publicationDate date not null,
    title varchar(255) not null,
    description text not null,
    content mediumtext not null,

    PRIMARY KEY (id)
);