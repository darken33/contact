-- creation de la table users
create table users (
cuser varchar(10) not null,
passwd varchar(10),
primary key(cuser));

-- creation administrateur
insert into contact.users values ('root','');

-- creation de la table contacts
create table contacts (
ident mediumint not null default 0 auto_increment,
cuser varchar(10) not null,
nom varchar(25) not null,
prenom varchar(25),
dnaiss date,
pseudo varchar(15),
nature char(1),
type char(1),
adresse1 varchar(128),
adresse2 varchar(128),
cdpost char(5),
ville varchar(15) not null,
teldom char(10),
empers varchar(255),
telbur char(10),
emprof varchar(255),
telpor char(10),
fax char(10),
primary key (ident,cuser));
