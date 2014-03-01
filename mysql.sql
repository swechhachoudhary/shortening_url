#A new database named new is created
CREATE DATABASE new;

USE new;
#A table named url_table is created with fields id, url_input and base_url, id being the primary key.
CREATE TABLE url_table (
	id int not null auto_increment,
	url_input varchar(1000),
	base_url varchar(10),
	primary key(id)
	);