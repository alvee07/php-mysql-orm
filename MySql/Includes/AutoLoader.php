<?php

spl_autoload_register('MySqlAutoLoader');

function MySqlAutoLoader(string $className)
{
    $path = "RawModels/";
    $fullPathName = $path . $className .".php";

    if(!file_exists($fullPathName)){
        return false;
    }
    include $fullPathName;
}