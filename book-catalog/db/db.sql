CREATE DATABASE php_lesson_db; 

USE php_lesson_db; 

CREATE TABLE IF NOT EXISTS author(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS books(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255),
    isbn VARCHAR(255),
    author_id INT(6) UNSIGNED,
    FOREIGN KEY(author_id) REFERENCES author(id)
);

INSERT INTO author(name)
VALUES ('Michael Morgan'), ('George Martin')
;

INSERT INTO books(title, isbn, author_id)
VALUES ('Java for Professional Developers', '0-123-1234567-1', 1); 

INSERT INTO books(title, isbn, author_id)
VALUES ('Game of Thrones', '0-123-1234567-2', 2);

ALTER TABLE books 
ADD COLUMN pic_resource 
VARCHAR(255);

UPDATE books 
SET pic_resource = 'http://localhost/dragon-php/book-catalog/images/java-book.jpg'
WHERE isbn = '0-123-1234567-1'; 

UPDATE books 
SET pic_resource = 'http://localhost/dragon-php/book-catalog/images/game-of-thrones-book.png'
WHERE isbn = '0-123-1234567-2'; 

ALTER TABLE author 
ADD CONSTRAINT un_author_name
UNIQUE(name); 