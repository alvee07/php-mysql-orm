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

            $sql = "SELECT id, name FROM users;";
            
            $result = $mysqli->query($sql);
            var_dump($result);
            
            if ($result->num_rows > 0) {
              echo "<table><tr><th>ID</th><th>Name</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]." "."</td></tr>";
              }
              echo "</table>";
            } else {
              echo "0 results";
            }
            $mysqli->close();
            
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }
}

$db = new Database("asd","Asd");