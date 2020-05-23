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

INSERT INTO author (name) VALUES 
	('Sui Ishida'),
	('Tite Kubo'),
	('Koyoharu Gotoge'),
	('Masashi Kishimoto');

INSERT INTO book (title, isbn, author_id) VALUES 
	('Tokyo Ghoul :re Volume 7', '1421595028',  1),
	('Tokyo Ghoul :re Volume 2', '9781421594972', 1),
	('Bleach Volume 48: God is Dead', '9781421543017', 2),
	('Demon Slayer Volume 2', '9781974700530', 3),
	('Naruto Volume 23 (Shueisha Jump Remix)', '9784081135257', 4);

ALTER TABLE book ADD COLUMN image_src VARCHAR(255);
UPDATE book SET image_src = 'http://localhost/dragon-php/book-catalog/images/book1.jpg' WHERE id = 1;
UPDATE book SET image_src = 'http://localhost/dragon-php/book-catalog/images/book2.jpeg' WHERE id = 2;
UPDATE book SET image_src = 'http://localhost/dragon-php/book-catalog/images/book3.jpg' WHERE id = 3;
UPDATE book SET image_src = 'http://localhost/dragon-php/book-catalog/images/book4.png' WHERE id = 4;
UPDATE book SET image_src = 'http://localhost/dragon-php/book-catalog/images/book5.jpg' WHERE id = 5;