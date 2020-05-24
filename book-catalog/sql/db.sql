CREATE DATABASE php_lesson_db;

USE php_lesson_db;

CREATE TABLE IF NOT EXISTS author (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_name (name)
);

ALTER TABLE `author` ADD INDEX( `name`);

CREATE TABLE IF NOT EXISTS book (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    isbn VARCHAR(255) NOT NULL,
    author_name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    FOREIGN KEY (author_name) REFERENCES author(name),
    UNIQUE KEY unique_title (title)
);

ALTER TABLE book ADD image varchar(255) AFTER isbn

ALTER TABLE book DROP FOREIGN KEY author_id

TRUNCATE TABLE book

INSERT INTO author (name)
VALUES
    ('Michael Morgan'),
    ('George RR Martin');

INSERT INTO book (title, isbn, author_name,image)
VALUES
    ('Java for Professional Developers', '0-671-719421-9', 'Michael Morgan','resource/image/game-of-thrones.jpg'),
    ('Game of Thrones', '7-211-312312-2', 'George RR Martin','resource/image/java-book.jpg');