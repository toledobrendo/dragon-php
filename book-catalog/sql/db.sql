CREATE DATABASE IF NOT EXISTS php_lesson_db;

USE php_lesson_db;

CREATE TABLE IF NOT EXISTS author (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS book (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255),
	isbn VARCHAR(255),
	img VARCHAR(255),
	author_id INT(6) UNSIGNED,
	FOREIGN KEY (author_id) REFERENCES author(id)	
);

INSERT INTO author(name)
	VALUES 
		('Michael Morgan'),
		('George JR Martin');

INSERT INTO book(title, isbn, img, author_id)
	VALUES
		('Java for Professional Develeopers', '0-762-658754-9', 'https://covers.openlibrary.org/w/id/916256-M.jpg', 1),
		('A Game of Thrones', '1-625443-23-1', 'https://covers.openlibrary.org/w/id/8773509-M.jpg', 2);
		


