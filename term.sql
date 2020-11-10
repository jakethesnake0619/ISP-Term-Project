CREATE DATABASE term;
USE term;

DROP TABLE IF EXISTS Main;

CREATE TABLE Main (
	id INT(8),
	name CHAR(20), 
	price FLOAT, 
	quantity INT(3), 
)