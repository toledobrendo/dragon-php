CREATE TABLE IF NOT EXISTS user_info (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255),
	password VARCHAR(255),
	isActive INT(1)
)