<?php
namespace MySql\MySqlCore;

use MySql\RawModels\Student;

class SqlApi 
{
    public static function SelectAllStudents(SqlConnection $mySqlConnection, mixed $params = '') : mixed
    {
        $array_of_users = array();

        $result = $mySqlConnection->query('call select_all_students();');

        while ($row = $result->fetch_object('MySql\RawModels\Student')) {
            $array_of_users[] = $row;
        }
        return $array_of_users;
    }

    public static function SelectAllParents(SqlConnection $mySqlConnection, mixed $params = '') : mixed
    {
        $array_of_users = array();

        $result = $mySqlConnection->query('call select_all_parents();');

        while ($row = $result->fetch_object('MySql\RawModels\OneParent')) {
            $array_of_users[] = $row;
        }
        return $array_of_users;
    }

    public static function SelectAllStudentsWithParents(SqlConnection $mySqlConnection, mixed $params = '') : mixed
    {
        $array_of_students_with_parents = array();

        $result = $mySqlConnection->query('call select_all_students_with_parents();');

        while ($row = $result->fetch_object('MySql\RawModels\StudentWithParents')){
            $array_of_students_with_parents [] = $row;
        }

        return $array_of_students_with_parents;
    }
    
    public static function InsertStudent(SqlConnection $mySqlConnection, Student $student) : mixed
    {
        $inserted_id = array();

        $stmt = $mySqlConnection->prepare( "call insert_student(?, ?, ?, ?, ?, ?);" );
        $stmt->bind_param("sssssi", $in_first_name, $in_last_name, $in_gender, $in_grade, $in_dob, $in_is_deleted);

        $in_student_id = $student->student_id;
        $in_first_name = $student->student_first_name;
        $in_last_name = $student->student_last_name;
        $in_gender = $student->student_gender;
        $in_grade = $student->student_grade;
        $in_dob = $student->student_dob;
        $in_is_deleted = $student->student_is_deleted;

        $stmt->execute();
        $result = $stmt->get_result();

        $inserted_id = $result->fetch_array(MYSQLI_BOTH);

        return $inserted_id;
    }

    public static function UpsertStudent(SqlConnection $mySqlConnection, mixed $params = '') : mixed
    {
        $inserted_id = array();

        $stmt = $mySqlConnection->prepare( "call upsert_student(?, ?, ?, ?, ?, ?, ?);" );
        $stmt->bind_param("isssssi", $in_id, $in_first_name, $in_last_name, $in_gender, $in_grade, $in_dob, $in_is_deleted);

        $in_id = $params[0];
        $in_first_name = strval($params[1]);
        $in_last_name = $params[2];
        $in_gender = $params[3];
        $in_grade = $params[4];
        $in_dob = $params[5];
        $in_is_deleted = $params[6];

        $stmt->execute();
        $result = $stmt->get_result();

        $inserted_id = $result->fetch_array(MYSQLI_BOTH);

        return $inserted_id;
    }
}
