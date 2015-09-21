create database AgriName;

USE AgriName;

create table users(
	id							varchar(10)		PRIMARY KEY,
	user_name					varchar(255)	NOT NULL,
	user_password				varchar(255)	NOT NULL,
	groups						varchar(6)		NOT NULL,
	first_name					varchar(255)	NOT NULL,
	last_name					varchar(255)	NOT NULL
);

create table user_meta(
	id							varchar(10)		PRIMARY KEY,
	user_id						varchar(10)		NOT NULL,
	meta_key					varchar(255)	NOT NULL,
	meta_value					varchar(255),
	
	FOREIGN KEY (user_id) REFERENCES users(id)
);

create table crop_catagories(
	id							varchar(10)		PRIMARY KEY,
	crop_catagory_name			varchar(255)	NOT NULL,
	crop_catagory_title			varchar(255) 	NOT NULL,
	crop_catagory_parent		varchar(10),
	
	FOREIGN KEY (crop_catagory_parent) REFERENCES crop_catagories(id)
);

create table crops(
	id							varchar(10) 	PRIMARY KEY,
	crop_name					varchar(255)	NOT NULL,
	crop_title					varchar(255)	NOT NULL,
	crop_description			varchar(255),
	crop_catagory				varchar(10)		NOT NULL,
	crop_status					INTEGER			NOT NULL,
	crop_author					varchar(10)		NOT NULL,
	
	FOREIGN KEY (crop_catagory) REFERENCES crop_catagories(id)
);

create table crop_meta(
	id							varchar(10)		PRIMARY KEY,
	crop_id						varchar(10)		NOT NULL,
	meta_key					varchar(255)	NOT NULL,
	meta_value					varchar(255),
	
	FOREIGN KEY (crop_id) REFERENCES crops(id)
);

create table capabilities(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255)
);

create table user_capability(
	user_id			varchar(10)	NOT NULL,
	capabilities	varchar(10)	NOT NULL,
	
	FOREIGN KEY (user_id) REFERENCES users(id)
);

create table banned(
	user_id		varchar(10)		PRIMARY KEY,
	tfrom		varchar(10)		NOT NULL,
	tlong		varchar(5)		NOT NULL,
	
	FOREIGN KEY (user_id) REFERENCES users(id)
);

create table groups(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255)	NOT NULL,
	capabilities varchar(23)
);

create table catagories(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255),
	parrent_id	varchar(10),
	
	FOREIGN KEY (parrent_id) REFERENCES catagories(id)
);

create table articles(
	id			varchar(10)		PRIMARY KEY,
	catagory_id	varchar(10)		NOT NULL,
	title		varchar(255)	NOT NULL,
	content		varchar(255),
	status		integer,
	writter_id	varchar(10)		NOT NULL,
	
	FOREIGN KEY (catagory_id) REFERENCES catagories(id),
	FOREIGN KEY (writter_id) REFERENCES users(id)
);

create table article_meta(
	id			varchar(10)		PRIMARY KEY,
	article_id	varchar(10)		NOT NULL,
	meta_key	varchar(255)	NOT NULL,
	meta_value	varchar(255),
	
	FOREIGN KEY (article_id) REFERENCES articles(id)
);

create table file_types(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(10)		NOT NULL
);

create table files(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(10)		NOT NULL,
	url			varchar(255)	NOT NULL,
	type_id		varchar(10)		NOT NULL,
	
	FOREIGN KEY (type_id) REFERENCES file_types(id)
);