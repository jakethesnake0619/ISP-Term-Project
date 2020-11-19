DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
	id INT AUTO_INCREMENT  NOT NULL,
	fname CHAR(20),
    lname CHAR(20),
	email CHAR(30),
	addy CHAR(30),
    city CHAR(20),
    Stat CHAR(2),
    zipcode VARCHAR(5),
    phone VARCHAR(20),
	PRIMARY KEY (id)
);


