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
  ('Michael Morgan'),
  ('George RR Martin');

INSERT INTO book (title, isbn, author_id) VALUES
  ('Java for Professional Developers', '0-672-316123-8', 1),
  ('A Game of Thrones', '1-141-5143123-5', 2);

ALTER TABLE book ADD COLUMN thumbnail VARCHAR(255);

UPDATE book SET thumbnail='https://images-na.ssl-images-amazon.com/images/I/41F6QB7SWFL._SX382_BO1,204,203,200_.jpg' WHERE id=1;
UPDATE book SET thumbnail='http://img3.wikia.nocookie.net/__cb20130302001049/iceandfire/images/b/b6/Game_of_thrones.jpeg' WHERE id=2;
