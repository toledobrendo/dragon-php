  CREATE DATABASE phplesson_h6_db;

  USE phplesson_h6_db;

  CREATE TABLE IF NOT EXISTS author (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
  );

  CREATE TABLE IF NOT EXISTS book(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    isbn VARCHAR(255),
    pic_url VARCHAR(255),
    author_id INT(6) unsigned,
    FOREIGN KEY (author_id) REFERENCES author(id)
  );

    INSERT INTO author (name)
    VALUES
    ('Michael Morgan'),
    ('George R Martin');

    INSERT INTO book (title, isbn, pic_url,author_id)
    VALUES
    ('Java for Professional Developers', '0-6720-31697-8','https://images-na.ssl-images-amazon.com/images/I/41F6QB7SWFL._SX258_BO1,204,203,200_.jpg', 1),
    ('Game of Thrones', '1-141-2315123-5','https://images-na.ssl-images-amazon.com/images/I/51PAQCH4ZRL._SX293_BO1,204,203,200_.jpg', 2);
