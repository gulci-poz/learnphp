create database widget_corp;

grant all privileges on widget_corp.*
to 'widget_cms'@'localhost'
identified by 'widget_cms';

create table subjects (
  id int(11) not null auto_increment,
  menu_name varchar(30) not null,
  position int(3) not null,
  visible tinyint(1) not null,
  primary key (id)
);

insert into subjects (menu_name, position, visible)
values ('About Widget Corp', 1, 1);
insert into subjects (menu_name, position, visible)
values ('Products', 2, 1);
insert into subjects (menu_name, position, visible)
values ('Services', 3, 1);
insert into subjects (menu_name, position, visible)
values ('Misc', 4, 0);

create table pages (
  id int(11) not null auto_increment,
  subject_id int(11) not null,
  menu_name varchar(30) not null,
  position int(3) not null,
  visible tinyint(1) not null,
  content text,
  primary key (id),
  index (subject_id)
);

insert into pages (subject_id, menu_name, position, visible, content)
values (1, 'Our Mission', 1, 1, 'Our mission has always been...');
insert into pages (subject_id, menu_name, position, visible, content)
values (1, 'Our History', 2, 1, 'Founded in 1898 by two enterprising engineers...');
insert into pages (subject_id, menu_name, position, visible, content)
values (2, 'Large Widgets', 1, 1, 'Our large widgets have to be seen to be believed...');
insert into pages (subject_id, menu_name, position, visible, content)
values (2, 'Small Widgets', 2, 1, 'They say big things come in small packages...');
insert into pages (subject_id, menu_name, position, visible, content)
values (3, 'Retrofitting', 1, 1, 'We love to replace widgets...');
insert into pages (subject_id, menu_name, position, visible, content)
values (3, 'Certification', 2, 1, 'We can certify any widget, not just our own...');
