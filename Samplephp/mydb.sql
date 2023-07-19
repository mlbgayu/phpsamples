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
DELETE from users where user_id="11";
insert into users (name , email, password, sex, age, file) values("manju","manjula@gmail.com","4848","female",20,"");
update users set name="biya" where name="bhavya";
select (name,user_id,)

