create database AriName;

USE AriName;

create table users(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255)	NOT NULL,
	pass		varchar(255)	NOT NULL,
	appername	varchar(255),
	banned		BOOLEAN,
	groups		varchar(6)		NOT NULL,
	roles		varchar(23)		NOT NULL
);

create table roles(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255)
);

-- Chuong
create table user_role(
	user_id			varchar(10)	NOT NULL,
	role_id			varchar(10)	NOT NULL,
	CONSTRAINT pk_UR PRIMARY KEY (user_id,role_id)
);

-- Hai
create table banned(
	user_id		varchar(10)		PRIMARY KEY,
	tfrom		varchar(10)		NOT NULL,
	tlong		varchar(5)		NOT NULL
);

-- Duc
create table groups(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255)
);

-- Chau
create table catagories(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(255),
	parrent_id	varchar(10)
);

-- Chuong
create table articles(
	id			varchar(10)		PRIMARY KEY,
	catagory_id	varchar(10)		NOT NULL,
	subject		varchar(255)	NOT NULL,
	content		varchar(255),
	writter_id	varchar(10)		NOT NULL
);

-- Hai
create table files(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(10)		NOT NULL,
	url			varchar(255)	NOT NULL,
	type_id		varchar(10)		NOT NULL
);

-- Chau
create table types(
	id			varchar(10)		PRIMARY KEY,
	name		varchar(10)		NOT NULL
);