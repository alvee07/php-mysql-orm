<?php

class Database
{
    public string $ConnectionString = '';
    public mysqli $mysqli;

    function __construct(string $connection)
    {
        $ConnectionString = $connection;
        $this->Execute("asd", "asd", "asd");

    }

    public function Execute(string $class, string $method, mixed $params)
    {
        try
        {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "test_db";

            // Create connection
            $mysqli = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($mysqli->connect_error) {         
                die("Connection failed: " . $mysqli->connect_error);
            } 
            echo "Connected successfully " . "</br>";

            //$sql = "SELECT id, name FROM users;";
            $sql = "call select_users();";

            $result = $mysqli->query($sql);

			// $row = $result->fetch_assoc()
            while ($row = $result->fetch_object('user')) {
				echo "<pre>";
				print_r($row);
				echo "</pre>";
			  	echo "</br> </br>";
            }


            $mysqli->close();
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }
}
class user{
	public $user_id;
	public $user_name ;
	public $user_dob;
	public $user_updated;
	public $user_gender;
	public $user_salary;
	public $user_is_deleted;
	public $user_is_minor;

	function __construct(){}

	function toString(){
		echo $this->id . "</br>";
		echo $this->name . "</br>";
	}
}
$db = new Database("asd","Asd");