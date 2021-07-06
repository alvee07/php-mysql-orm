<?php

require_once realpath('vendor/autoload.php');

use MySql\MySqlCore\SqlGateway as SqlGateway;
use MySql\RawModels\Student;

//require_once "autoloader.php";
function PreVarDump($object)
{
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}

class DBService
{
    /**
     * The Singleton's instance is stored in a static field. This field is a
     * instance of its own type. 
     */
    private static DBService $instance;
    private SqlGateway $SqlGateway;
    /**
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct() { $this->SqlGateway = new SqlGateway(); }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): DBService
    {
        $cls = static::class;
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Finally, any singleton should define some business logic, which can be
     * executed on its instance.
     */
    public function SelectAllStudents()
    {
        $ret = $this->SqlGateway->Exec('MySql\MySqlCore\SqlApi::SelectAllStudents', array());
        PreVarDump($ret);
    }

    public function SelectAllStudentsWithParents()
    {
        $ret =$this->SqlGateway->Exec('MySql\MySqlCore\SqlApi::SelectAllStudentsWithParents', array());
        PreVarDump($ret);
    }

    public function SelectAllParents()
    {
        $ret = $this->SqlGateway->Exec('MySql\MySqlCore\SqlApi::SelectAllParents', array());
        PreVarDump($ret);
    }

    public function InsertIntoStudent(Student $student)
    {
        $studentArray = get_object_vars($student);

        $ret = $this->SqlGateway->Exec('MySql\MySqlCore\SqlApi::InsertStudent', $student);

        PreVarDump($ret);
    }
}

/**
 * The client code.
 */
echo $_SERVER['DOCUMENT_ROOT'];
    $s1 = DBService::getInstance();
    $s2 = DBService::getInstance();
    if ($s1 === $s2) {
        echo "Singleton works, both variables contain the same instance." . "</br>";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }

//DBService::getInstance()->SelectAllStudents();
//$student = new Student('object','creation','M',77, '1995-01-08 12:12:12', 0);
//DBService::getInstance()->InsertIntoStudent($student);
DBService::getInstance()->SelectAllStudents();