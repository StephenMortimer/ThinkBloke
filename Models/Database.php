<?php

class Database {

    protected static $_dbInstance = null;
    protected $_dbHandle;

    public static function getInstance() {
        $username = 'sth742';
        $password = '2spwMips!';
        $host = 'helios.csesalford.com';
        $dbName = 'sth742';

        if (self::$_dbInstance === null) { //checks if the PDO exists, if not create it with the connection info
            self::$_dbInstance = new self($username, $password, $host, $dbName);
        }

        return self::$_dbInstance;
    }

    private function __construct($username, $password, $host, $database) {
        try {
            $this->_dbHandle = new PDO("mysql:host=$host; dbname=$database", $username, $password); // creates database handle with connection info
        } catch (PDOException $e) { // catch any failure to connect to database
            echo $e->getMessage();
        }
      
    }

    public function getdbConnection() {
        return $this->_dbHandle; // returns the database handle to be used elsewhere
    }

    public function __destruct() {
        $this->_dbHandle = null; // destroys the destroys the database handle
    }

}
