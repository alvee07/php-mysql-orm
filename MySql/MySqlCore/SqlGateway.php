<?php
namespace MySql\MySqlCore;

//use MySql\MySqlCore\MySqlConnection as MySqlConnection;

//require "../MySql/autoloader.php";

class SqlGateway
{
    private SqlConnection $MySqlConnection;

    function __construct()
    {
        $this->MySqlConnection = new SqlConnection();
    }
    
    public function Query($DatabaseApiMethodName, mixed $args) : mixed
    {
        $MySqlConnection = new SqlConnection();

        $returned = $DatabaseApiMethodName($MySqlConnection);

        return $returned;
        //$return = DatabaseApi::SelectAllUsers($MySqlConnection, 'Student');
    }

    public function Execute($DatabaseApiMethodName, mixed $args) : mixed
    {
        $MySqlConnection = new SqlConnection();

        $returned = $DatabaseApiMethodName($MySqlConnection, $args);

        return $returned;
    }

    public function Exec($classAndFunction, mixed $args) : mixed
    {
        $this->MySqlConnection->OpenConnection();
        //array_unshift($args, $this->MySqlConnection);

        $ret = call_user_func($classAndFunction, $this->MySqlConnection, $args);

        //$this->MySqlConnection->close();

        return $ret;
    }

}