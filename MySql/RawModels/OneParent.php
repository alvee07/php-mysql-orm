<?php
namespace MySql\RawModels;

class OneParent {
	public int $parent_id;
	public string $parent_first_name;
	public string $parent_last_name;
	public string $parent_gender;
	public string $parent_phone_number;
	public string $parent_email_address;

	function __construct(){}

	function toString(){
		echo $this->id . "</br>";
		echo $this->name . "</br>";
	}
}