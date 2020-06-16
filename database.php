<?php
class Database
{
    private $host;
    private $user;
    private $password;
    private $bdd;
    
    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'phpmyadmin';
        $this->password = 'root';
        $this->bdd = 'my_meetup';
    }
    public function getConnection() 
    {
        $dsn = 'mysql:dbname='.$this->bdd.';host='.$this->host;
        try {
            $pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo = $pdo;
            return $pdo;
        }
        catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL; 
        }
    }
}