<?php

class User {
	public int $user_id;
	public string $user_name ;
	public string $user_dob;
	public bool $user_updated;
	public string $user_gender;
	public float $user_salary;
	public bool $user_is_deleted;
	public bool $user_is_minor;

	function __construct(){}

	function toString(){
		echo $this->id . "</br>";
		echo $this->name . "</br>";
	}
}