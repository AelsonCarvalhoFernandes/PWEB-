<?php

class DatabaseConnection{

    public $connection;

    public $DATABASE_HOST = "localhost";
    public $DATABASE_USERNAME = "root"; 
    public $DATABASE_PASSWORD = "12345"; 
    public $DATABASE_NAME = "mozana";
    public $DATABASE_PORT = "3306";

    function __construct()
    {
        $this->connection = new mysqli($this->DATABASE_HOST, $this->DATABASE_USERNAME, $this->DATABASE_PASSWORD, $this->DATABASE_NAME, $this->DATABASE_PORT);
    }

    public function getConnection(){
        return $this->connection;
    }

}