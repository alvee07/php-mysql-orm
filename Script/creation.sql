
drop table if exists user;
create table user (
user_id int auto_increment not null,
user_name varchar(255) not null,
user_dob datetime  not null,
user_updated date  not null,
user_gender char(1) not null,
user_salary float not null,
user_is_deleted bit  not null,
user_is_minor tinyint  not null,
constraint pk__user_id primary key(user_id)
);



