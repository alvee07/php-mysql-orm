<?php

class Database
{
    public string $ConnectionString = '';
    public mysqli $mysqli;

    function __construct(string $connection)
    {
        $ConnectionString = $connection;
    }

    public function Execute(string $class, string $method, mixed $params) : mixed
    {
        try
        {
            $mysqli = new mysqli('localhost', 'root', 'root', 'test_db');
            echo $mysqli;
            
        }
        catch(\Exception $ex)
        {
            echo $ex->message;
        }
    }
}

