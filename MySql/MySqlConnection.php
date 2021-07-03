﻿<?php

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

			$this->Execute();

		}		
		catch(\Exeception $ex)
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