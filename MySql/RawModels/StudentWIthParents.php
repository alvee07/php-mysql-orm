<?php
namespace MySql\RawModels;

class StudentWithParents {
	public string $student_first_name;
	public string $student_last_name;
	public string $student_dob;
	public string $parent_first_name;
	public string $parent_last_name;

	function __construct(){}

	function toString(){
		echo $this->id . "</br>";
		echo $this->name . "</br>";
	}
}