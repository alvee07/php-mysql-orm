drop database if exists test_db;
create database test_db;
use test_db;


-- TABLE CREATION
-- ----------------------------------------------
drop table if exists student;
create table student (
    student_id int auto_increment not null,
    student_first_name varchar(255) not null,
    student_last_name varchar(255) not null,
    student_gender char(1) not null,
    student_grade tinyint not null,
    student_dob datetime not null,
    student_is_deleted bit(1) not null,
    constraint pk__student_id primary key (student_id)
);

drop table if exists parent;
create table parent (
	parent_id int auto_increment not null,
	parent_first_name varchar(255) not null,
    parent_last_name varchar(255) not null,
    parent_gender char(1) not null,
    parent_phone_number varchar(15) not null,
    parent_email_address varchar(255) not null,
    constraint pk__parent_id primary key (parent_id)
);

drop table if exists student_parent;
create table student_parent (
	student_parent_id int auto_increment not null,
    student_id int not null,
    parent_id int not null,
    constraint pk__student_parent_id primary key (student_parent_id),
    constraint fk__student_id foreign key (student_id) references student(student_id) on delete cascade,
    constraint fk__parent_id foreign key (parent_id) references parent(parent_id) on delete cascade
);


-- inserting into student table
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('alvee', 'useless', 'M', '88', '1999-12-02 10:10:10', 0);
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('liam', 'irish green beer', 'M', '50', '1970-05-05 00:00:00', 1);
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('ainsley', 'only php', 'F', '60', '1980-07-07 05:10:40', 1);
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('austin', 'only php', 'M', '70', '1995-03-03 09:04:04', 1);
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('chris', 'bro1', 'M', '33', '1950-09-01 10:10:10', 0);
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('steve', 'bro2', 'M', '33', '1950-09-01 10:10:10', 0);
insert into student (student_first_name, student_last_name, student_gender, student_grade, student_dob, student_is_deleted) values ('anna', 'is she cool banana', 'F', '20', '1999-05-01 02:10:10', 0);

-- inserting into parent table
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('G_delbert', 'delbert', 'M', '780-who-cares', 'gdelbert@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('liam_mummy', 'mom', 'F', '+44-00-uk', 'liam_parents@co.uk');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('liam_papa', 'papa', 'M', '+44-00-uk', 'liam_parents@co.uk');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('ainsley_mum', 'mum', 'F', '780-ainsley', 'ainsley_parents@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('ainsley_dad', 'dad', 'M', '780-ainsley', 'ainsley_parents@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('austin_ma', 'ma', 'F', '236-672-BC', 'austin_parents@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('austin_pa', 'pa', 'M', '236-672-BC', 'austin_parents@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('cs_mom', 'mommy', 'M', '587-calgary', 'momloveschris@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('cs_dad', 'daddy', 'M', '587-calgary', 'dadlovessteve@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('anna_mommy', 'mommy', 'F', '306-SK-sakatoon', 'we_are_schroeders@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('anna_daddy', 'daddy', 'M', '306-SK-sakatoon', 'we_are_schroeders@gmail.com');
insert into parent (parent_first_name, parent_last_name, parent_gender, parent_phone_number, parent_email_address) values ('D_Dianne', 'dianne', 'F', '780-who-cares', 'dduek@gmail.com');

-- insertin into student_parent table
insert into student_parent (student_id, parent_id) values (1, 12);
insert into student_parent (student_id, parent_id) values (2, 2);
insert into student_parent (student_id, parent_id) values (2, 3);
insert into student_parent (student_id, parent_id) values (3, 4);
insert into student_parent (student_id, parent_id) values (3, 5);
insert into student_parent (student_id, parent_id) values (4, 6);
insert into student_parent (student_id, parent_id) values (4, 7);
insert into student_parent (student_id, parent_id) values (5, 8);
insert into student_parent (student_id, parent_id) values (5, 9);
insert into student_parent (student_id, parent_id) values (6, 8);
insert into student_parent (student_id, parent_id) values (6, 9);
insert into student_parent (student_id, parent_id) values (7, 10);
insert into student_parent (student_id, parent_id) values (7, 11);
insert into student_parent (student_id, parent_id) values (1, 1);
