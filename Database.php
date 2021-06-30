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
            $db_name = "test_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password);

            // Check connection
            if ($conn->connect_error) {         
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "Connected successfully";

            $sql = "SELECT id, name FROM test_db.users;";
            
            $result = $conn->query($sql);
            var_dump($result);
            
            if ($result->num_rows > 0) {
              echo "<table><tr><th>ID</th><th>Name</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
              }
              echo "</table>";
            } else {
              echo "0 results";
            }
            $conn->close();
            
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }
}

$db = new Database("asd","Asd");