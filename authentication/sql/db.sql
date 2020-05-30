CREATE TABLE IF NOT EXISTS user_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
);

ALTER TABLE user_info ADD UNIQUE KEY unique_username (username)

ALTER TABLE user_info ADD active TINYINT(1) NOT NULL