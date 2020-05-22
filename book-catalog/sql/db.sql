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
  FOREIGN KEY (author_id) REFERENCES author(id),
  pic_url VARCHAR(255)
);

INSERT INTO author (name)
VALUES
  ('George RR Martin'),
  ('Tomohito Oda'),
  ('Jitakukeibihei'),
  ('Michael Morgan');

INSERT INTO book (title, isbn, author_id, pic_url)
VALUES
  ('A Game of Thrones', '1-141-5143123-5', 1, 'https://i.pinimg.com/originals/71/05/c1/7105c1a8165ae9040fa3e1d795dfbc40.jpg'),
  ('Komi Can\'t Communicate', '1-9747-0712-6', 2, 'https://estuajiblog.files.wordpress.com/2018/09/komi-san-wa-komyushou-desu-03-e1536941145787.jpg'),
  ('KonoSuba: God\'s Blessing on this Wonderful World!', '0-31-655337-7', 3, 'https://vignette.wikia.nocookie.net/konosuba/images/e/e5/Konosuba_Volume_1_Cover.jpg');

INSERT INTO book (title, isbn, author_id, pic_url)
VALUES
  ('Java for Professional Developers', '0-672-316123-8', 4, 'https://images-na.ssl-images-amazon.com/images/I/41F6QB7SWFL._SX258_BO1,204,203,200_.jpg');
