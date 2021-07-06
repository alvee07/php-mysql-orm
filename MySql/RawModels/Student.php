<?php
namespace MySql\RawModels;

class Student {
	public int $student_id;
	public string $student_first_name;
	public string $student_last_name;
	public string $student_gender;
	public int $student_grade;
	public string $student_dob;
	public int $student_is_deleted;

	function __construct()
	{
		$arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
	}

	function __construct6(string $in_first_name, string $in_last_name, string $in_gender, int $in_grade, string $in_dob, int $in_is_deleted)
	{
		$this->student_id = 0;
		$this->student_first_name = $in_first_name;
		$this->student_last_name = $in_last_name;
		$this->student_gender = $in_gender;
		$this->student_grade = $in_grade;
		$this->student_dob = $in_dob;
		$this->student_is_deleted = $in_is_deleted;
	}

	function toString(){
		echo $this->id . "</br>";
		echo $this->name . "</br>";
	}
}