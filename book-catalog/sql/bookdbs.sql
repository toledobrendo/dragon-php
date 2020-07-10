CREATE DATABASE bookdbs;

USE bookdbs;


CREATE TABLE IF NOT EXISTS author (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  CONSTRAINT un_author_name UNIQUE (name)
);


CREATE TABLE IF NOT EXISTS book (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  isbn VARCHAR(255),
  author_id INT(6) UNSIGNED,
  imgSrc VARCHAR(255),
  FOREIGN KEY (author_id) REFERENCES author(id)
);




INSERT INTO author (name)
VALUES
  ('Michael Morgan'),
  ('George RR Martin'),
  ('Kentaro Miura');


-- V1
-- INSERT INTO book (title, isbn, author_id) VALUES
--   ('Java for Professional Developers', '0-672-316123-8', 1),
--   ('A Game of Thrones', '1-141-5143123-5', 2),
--   ('Berserk Vol 1', '3-9781593070205-1', 3);

-- UPDATE book SET imgSrc = '/url.png' WHERE id = 1;


-- V2
INSERT INTO book (title, isbn, author_id, imgSrc) VALUES
  ('Java for Professional Developers', '0-672-316123-8', 1, 'image/javaDev.jpg'),
  ('A Game of Thrones', '1-141-5143123-5', 2, 'image/GoT.jpg'),
  ('Berserk Vol 1', '3-9781593070205-1', 3,'image/berserk.jpg');

  -- UPDATE book SET imgSrc = '/url.png' WHERE id = 1;


