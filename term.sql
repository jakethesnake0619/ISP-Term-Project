DROP TABLE IF EXISTS Mainpage;

CREATE TABLE mainpage (
	id INT(7),
	name CHAR(20),
	price DECIMAL(7,2),
	quantity INT(3),
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS Cart;

CREATE TABLE Cart (
	id INT(7),
	name CHAR(20),
	price DECIMAL(7,2),
	quantity INT(3),
	PRIMARY KEY (id)
)

INSERT INTO mainpage VALUES
(0000001, 'Blender', 45.67, 21),
(0000002, 'iPhone', 997.45, 345);

INSERT INTO Cart VALUES
(0000001, 'Blender', 45.67, 0),
(0000002, 'iPhone', 997.45, 0);
