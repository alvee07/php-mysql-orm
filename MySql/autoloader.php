<?php

spl_autoload_register('callable_function');

function callable_function(string $className)
{
    $fullPathName = $_SERVER['DOCUMENT_ROOT'] . '/php_mysql_orm/' .$className .".php";
    $fullPathName = str_replace("\\", DIRECTORY_SEPARATOR, $fullPathName);

    if(!file_exists($fullPathName)){
        return false;
    }
    
    include $fullPathName;
}