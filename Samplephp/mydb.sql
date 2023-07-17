--Login as Root and Run the following
create database mlb;
use database mlb;
create user mlb identifiied by 'admin123';
Grant required privilege to mlb

-- Login as mlb and create the following table in mlb database
create table users ( name varchar(100), email varchar (100) , password varchar( 100 ) , file varchar(200))
