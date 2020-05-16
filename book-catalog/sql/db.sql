CREATE DATABASE php_lesson_db;

USE php_lesson_db;

CREATE TABLE IF NOT EXISTS author (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS book (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    isbn VARCHAR(255),
    author_id INT(6) UNSIGNED,
    FOREIGN KEY (author_id) REFERENCES author(id)
);

ALTER TABLE book ADD image varchar(255) AFTER isbn

TRUNCATE TABLE book

INSERT INTO author (name)
VALUES
    ('Michael Morgan'),
    ('George RR Martin');

INSERT INTO book (title, isbn, image, author_id)
VALUES
    ('Java for Professional Developers', '0-671-719421-9','resource/image/game-of-thrones.jpg', 1),
    ('Game of Thrones', '7-211-312312-2', 'resource/image/java-book.jpg', 2);