create database mlb;
use  mlb;
create user mlb identified by 'admin123';
Grant required  privilege to mlb;

-- Login as mlb and create the following table in mlb database


create table mlb.users
(
    user_id  int auto_increment primary key,
    name     varchar(100) null,
    email    varchar(100) null,
    password varchar(100) null,
    sex varchar(100) null,
    age int,
    file     varchar(200) null,
    constraint email unique (email)
);
select * from users;
