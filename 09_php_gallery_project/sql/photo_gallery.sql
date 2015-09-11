create database photo_gallery;
use photo_gallery;

grant all privileges on photo_gallery.*
to 'gallery'@'localhost'
identified by 'gallery';

create table users (
  id int(11) not null auto_increment,
  username varchar(50) not null,
  password varchar(40) not null,
  first_name varchar(30) not null,
  last_name varchar(30) not null,
  primary key (id)
);
