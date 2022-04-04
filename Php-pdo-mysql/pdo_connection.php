<?php

//Database configs

//DB-Hostname
define('dbhost','localhost');

//DB-User
define('dbuser','root');

//DB-Password
define('dbpassword','your-password');

//DB-name
define('dbname','your-database-name');

class DB {

    private $connection;
    private static $_instance;

    private $dbhost = dbhost;
    private $dbuser = dbuser;
    private $dbpass = dbpassword;
    private $dbname = dbname;

    //Get an instance of the database @return Instance

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //Constructor
    private function __construct(){
        try{
            $this->connection = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname,$this->dbuser,$this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Error handling
        }catch(PDOException $e){
            die("Failed to connect: ".$e->getMessage());
        }
    }

    //Magic method clone is empty to prevent duplication of connection
    private function __clone(){}

    //Get the connection
    public function getConnection(){
        return $this->connection;
    }

}

$db = DB::getInstance();

$conn = $db->getConnection();
