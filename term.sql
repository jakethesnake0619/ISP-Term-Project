DROP TABLE IF EXISTS Mainpage;

CREATE TABLE mainpage (
	image CHAR(255),
	id INT(7),
	name CHAR(20),
	description CHAR(255),
	price DECIMAL(7,2),
	quantity INT(3),
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS Cart;

CREATE TABLE Cart (
	id INT(7),
	name CHAR(20),
	description CHAR(255),
	price DECIMAL(7,2),
	quantity INT(3),
	PRIMARY KEY (id)
);

INSERT INTO mainpage VALUES
('http://localhost/isp/prj/blender.png', 0000001, 'Blender', 'Kitchenware blender 4HP, 250W, 5 liters, 2019 model', 45.67, 21),
('http://localhost/isp/prj/iphone.png', 0000002, 'iPhone', 'iPhone 4S (Refurbished) 5 year warrenty', 997.45, 345),
('http://localhost/isp/prj/mattress.png', 0000003, 'Mattress', 'UltraComfort Queen size memory foam mattress, 2019 model', 406.78, 43),
('http://localhost/isp/prj/hanger.png', 0000004, 'Blender', 'Durable plastic hanger 7-pack, fits all clothes', 5.06, 344),
('http://localhost/isp/prj/jacket.png', 0000005, 'Jacket', 'Gucci jacket, real panther fur jacket size S-XL', 1005.54, 14),
('http://localhost/isp/prj/laptop.png', 0000006, 'Laptop', 'Samsung core i7 4 core portable computer (2019 model)(Refurbished)', 567.98, 200);

INSERT INTO Cart VALUES
(0000001, 'Blender', 'Kitchenware blender 4HP, 250W, 5 liters, 2019 model', 45.67, 0),
(0000002, 'iPhone', 'iPhone 4S (Refurbished) 5 year warrenty', 997.45, 0),
(0000003, 'Mattress', 'UltraComfort Queen size memory foam mattress, 2019 model', 406.78, 0),
(0000004, 'Blender', 'Durable plastic hanger 7-pack, fits all clothes', 5.06, 0),
(0000005, 'Jacket', 'Gucci jacket, real panther fur jacket size S-XL', 1005.54, 0),
(0000006, 'Laptop', 'Samsung core i7 4 core portable computer (2019 model)(Refurbished)', 567.98, 0);
