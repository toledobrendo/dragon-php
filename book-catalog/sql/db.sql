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

INSERT INTO author (name) VALUES ('Michael Morgan'), ('George RR Martin');

INSERT INTO book (title, isbn, author_id) VALUES ('Java for Professional Developers', '0-672-316123-8', 1);
INSERT INTO book (title, isbn, author_id) VALUES ('A Game of Thrones', '1-783-427234-9', 2);

ALTER TABLE book ADD COLUMN pic_url VARCHAR(255);
UPDATE book SET pic_url = 'image/java-for-professional-developers.jpg' WHERE id = 1;
UPDATE book SET pic_url = 'image/a-game-of-thrones.webp' WHERE id = 2;
