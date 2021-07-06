<?php
namespace MySql\MySqlCore;

class SqlConnection extends \mysqli
{
    private $servername = "localhost";
	private $username = "root";
	private $password = "root";
	private $database = "test_db";


	function __construct()
	{
		// try {
			parent::init();
		// } catch (Exception $ex) {
		// 	echo $ex->message;
		// }
	}

	public function OpenConnection()
	{
		try {
			if (!parent::real_connect($this->servername, $this->username, $this->password, $this->database)) {
				die("<h1>" 
					.'Connect Error (' . mysqli_connect_errno() . ') '
					. mysqli_connect_error()
					. "</h1>");
			}
		} catch (\Exception $ex) {
			echo "<h1>" . $ex->message . "</h1>"; exit;
		}
	}
}
