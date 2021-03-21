CREATE DATABASE php_lesson_db;

USE php_lesson_db;

CREATE TABLE IF NOT EXISTS author (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS book (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255),
	pic_url VARCHAR(255),
	isbn VARCHAR(255),
	author_id INT(6) UNSIGNED,
	FOREIGN KEY (author_id) REFERENCES author(id)
);

INSERT INTO author (name) 
VALUES 
	('Michael Morgan'), 
	('George RR Martin');

INSERT INTO book (pic_url, title, isbn, author_id)
VALUES
	('http://localhost/dragon-php/book-catalog/images/java_for_devs.jpg', 'Java for Professional Developers', '0-672-316123-8', 1),
	('http://localhost/dragon-php/book-catalog/images/game_of_thrones.jpg', 'A Game of Thrones', '1-141-5143123-5', 2);

ALTER TABLE author ADD CONSTRAINT un_author_name UNIQUE (name);