<?php

require(dirname(__FILE__) . '/../libs/phpDataMapper/Base.php');
require(dirname(__FILE__) . "/../libs/phpDataMapper/Adapter/Mysql.php");

class Model
{
    public $adapter;
    
    public function __construct($hostname, $username, $password, $database)
    {
        try
        {
            $this->adapter = new phpDataMapper_Adapter_Mysql($hostname, 
                                                             $database,
                                                             $username,
                                                             $password);
        }
        catch(Exception $e)
        {
            echo 'Bad database settings';
            exit();
        }
    }
}