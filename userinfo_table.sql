DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
	id INT(7),
	fname CHAR(20),
    lname CHAR(20),
	email CHAR(30),
	addy CHAR(30),
    city CHAR(20),
    Stat CHAR(2),
    zipcode INT,
    phone INT,
	PRIMARY KEY (id)
);


