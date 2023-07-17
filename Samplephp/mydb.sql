--Login as Root and Run the following
create database mlb;
use database mlb;
create user mlb identifiied by 'admin123';

-- Login as mlb and create the following table in mlb database


create table mlb.users
(
    user_id  int auto_increment primary key,
    name     varchar(100) null,
    email    varchar(100) null,
    password varchar(100) null,
    file     varchar(200) null,
    constraint email unique (email)
);

