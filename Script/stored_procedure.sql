drop procedure if exists insert_user;
DELIMITER //

CREATE PROCEDURE insert_user(
	IN in_name varchar(255),
    IN in_dob datetime,
    IN in_updated date,
    IN in_gender char(1),
    IN in_salary float,
    IN in_deleted bit,
    IN in_minor tinyint
    )
BEGIN
	insert into user
    (
    user_name,
	user_dob,
	user_updated ,
	user_gender,
	user_salary ,
	user_is_deleted ,
	user_is_minor
    )
    VALUES
    (
	in_name ,
    in_dob,
    in_updated,
    in_gender ,
    in_salary,
    in_deleted ,
    in_minor
    );
    
    select last_insert_id() as last_inserted_id;
    
END //

DELIMITER ;

drop procedure if exists select_users;
DELIMITER //

CREATE PROCEDURE select_users ()
BEGIN
	SELECT * 
 	FROM user;
END //

DELIMITER ;


drop procedure if exists filter_user;
DELIMITER //

CREATE PROCEDURE filter_user (user_salary float, is_deleted Bit, is_minor tinyint, dob datetime)
BEGIN
	SELECT * 
 	FROM user
    where
			user.user_salary < user_salary
		AND
			user.user_is_deleted = is_deleted
		AND
			user.user_is_minor = is_minor
		AND
			user.user_dob < dob;
END //

DELIMITER ;