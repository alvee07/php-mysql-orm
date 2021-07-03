<?php

include "Includes/AutoLoader.php";

class MySqlConnection extends \mysqli
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "root";
	private $database = "test_db";

    public mysqli $SqlConnection;

    function __construct()
    {
		try
		{
			parent::init();
			$this->SqlConnection = new mysqli(
				$this->servername, $this->username, $this->password, $this->database);

			// Check connection
            if ($this->SqlConnection->connect_error) {         
                die("Connection failed: " . $SqlConnection->connect_error);
				exit;
            }

			$this->Execute_filter();

		}		
		catch(\Exeception $ex)
		{
			echo $ex->message;
		}
    }

	public function Execute_filter(string $sqlQuery = '')
    {
        try
        {
			$salary = 99999.99;
			$date = date('Y-m-d H:i:s');

            $sql = "CALL filter_user('$salary', 1, 0, '$date');";

            $result = $this->SqlConnection->query($sql);
			// $returned = $result->fetch_assoc();
			var_dump($result);

			while ($row = $result->fetch_array()) {
				echo "<pre>";
				print_r($row);
				echo "</pre>";
			  	echo "</br> </br>";
            }

            $this->SqlConnection->close();
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }


	public function Execute_insert(string $sqlQuery = '')
    {
        try
        {
            $sql = "CALL insert_user('from PHP Another', current_time(), current_date(), 'F', 3333, 1, 1);";

            $result = $this->SqlConnection->query($sql);
			$returned = $result->fetch_assoc();

			var_dump($returned);

            $this->SqlConnection->close();
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }


    public function Execute(string $sqlQuery = '')
    {
        try
        {
            $sql = "call select_users();";

            $result = $this->SqlConnection->query($sql);

			// $row = $result->fetch_assoc()
            while ($row = $result->fetch_object('user')) {
				echo "<pre>";
				print_r($row);
				echo "</pre>";
				gettype($row->user_is_deleted);
			  	echo "</br> </br>";
            }
            $this->SqlConnection->close();
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }
}


$db = new MySqlConnection("asd","Asd");