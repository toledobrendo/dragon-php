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

INSERT INTO author (name) 
VALUES 
	('Michael Morgan'), 
	('George RR Martin');

INSERT INTO book (title, isbn, author_id)
VALUES
	('Java for Professional Developers', '0-672-12313', 1),
	('A Game of Thrones', '2-3-123123', 2);

ALTER TABLE book ADD COLUMN img_url VARCHAR(255);

UPDATE book SET img_url = 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1562726234l/13496.jpg' WHERE id = 1;
UPDATE book SET img_url = 'https://images-na.ssl-images-amazon.com/images/I/41F6QB7SWFL._SX258_BO1,204,203,200_.jpg' WHERE id = 2;

UPDATE book SET img_url = 'http://localhost/dragon-php/book-catalog/images/agot-Martin_grr.jpg' WHERE id = 1;
UPDATE book SET img_url = 'http://localhost/dragon-php/book-catalog/images/j2fpd-Morgan_m.jpg' WHERE id = 2;