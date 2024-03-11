<?php
class DataBase{
    private $host;
    private $dbname;
    private $port;
    private $user;
    private $password;

    function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'tabacaria';
        $this->port = '3306';
        $this->user = 'root';
        $this->password = '';        
    }
    
    public function getCx(){
        return new PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->port", $this->user, $this->password);   
    }
}