
-- SELECTING ALL STUDENTS stored procedure
drop procedure if exists select_all_students;
DELIMITER //

CREATE PROCEDURE select_all_students ()
BEGIN
	SELECT * 
 	FROM student;
END //

DELIMITER ;

-- ---------------------------------------------------------------------------------------------------------

-- SELECTING ALL PARENTS stored procedure
drop procedure if exists select_all_parents;
DELIMITER //

CREATE PROCEDURE select_all_parents ()
BEGIN
	SELECT * 
 	FROM parent;
END //

DELIMITER ;

-- ---------------------------------------------------------------------------------------------------------

-- SELECTING ALL STUDENTS WITH PARENTS stored procedure
drop procedure if exists select_all_students_with_parents;
DELIMITER //

CREATE PROCEDURE select_all_students_with_parents ()
BEGIN
	SELECT 
	s.student_first_name,
    s.student_last_name,
    s.student_dob,
    p.parent_first_name,
    p.parent_last_name
 	FROM student_parent as sp
    JOIN student as s
    ON sp.student_id = s.student_id
    JOIN parent as p
    ON sp.parent_id = p.parent_id;
END //

DELIMITER ;

-- ---------------------------------------------------------------------------------------------------------

-- INSERT ONE NEW STUDENT
drop procedure if exists insert_student;
DELIMITER //

CREATE PROCEDURE insert_student(
	IN in_first_name varchar(255),
    IN in_last_name varchar(255),
    IN in_gender char(1),
    IN in_grade tinyint,
    IN in_dob datetime,
    IN in_is_deleted bit(1)
    )
BEGIN
	insert into student
    (
    student_first_name,
	student_last_name,
	student_gender,
	student_grade,
	student_dob,
	student_is_deleted
    )
    VALUES
    (
	in_first_name,
    in_last_name,
    in_gender,
    in_grade,
    in_dob,
    in_is_deleted
    );
    
    select last_insert_id() as last_inserted_id;
    
END //

DELIMITER ;

call insert_student('nowshin', 'ahmed', 'F', '18', '1995-01-08 12:12:12', 0);

-- ---------------------------------------------------------------------------------------------------------

-- UPSERTING ONE STUDENT
drop procedure if exists upsert_student;
DELIMITER //

CREATE PROCEDURE upsert_student(
	IN in_id int,
	IN in_first_name varchar(255),
    IN in_last_name varchar(255),
    IN in_gender char(1),
    IN in_grade tinyint,
    IN in_dob datetime,
    IN in_is_deleted bit(1)
    )
BEGIN
-- SET sql_mode = '';
	INSERT INTO student 
    (
    student_id, 
    student_first_name,
    student_last_name,
    student_gender,
    student_grade,
    student_dob,
    student_is_deleted
    ) 
    VALUES 
    (
    in_id,
    in_first_name,
    in_last_name,
    in_gender,
    in_grade,
    in_dob,
    in_is_deleted
    )
	ON DUPLICATE KEY UPDATE 
    student_first_name = VALUES(student_first_name),
    student_last_name = VALUES(student_last_name),
    student_gender = VALUES(student_gender),
    student_grade = VALUES(student_grade),
    student_dob = VALUES(student_dob),
    student_is_deleted = VALUES(student_is_deleted);
    
    select last_insert_id() as last_inserted_id;
    
END //

DELIMITER ;

CALL upsert_student(9, 'someone', 'again', 'F', 55, '2000-01-01 10:10:10', 0);

-- ---------------------------------------------------------------------------------------------------------







