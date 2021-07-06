<?php
namespace MySql\MySqlCore;

interface ISqlGateway
{
    public function Query($DatabaseApiMethodName, mixed $args) : mixed;

    //public function Query_Single();

    //public function Query_Insert();

    public function Execute($DatabaseApiMethodName, mixed $args) : mixed;

    public function Exec($function, mixed $args) : mixed;
    
}