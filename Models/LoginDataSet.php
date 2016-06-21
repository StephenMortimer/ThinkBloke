<?php

require_once ('Models/UserData.php');
require_once ('Models/Database.php');

class loginDataSet {
    protected $_dbHandle, $_dbInstance = null;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }
    //Encrypts password, logs user in if there's a match
    public function fetchAccountDetails($username, $password) {
        $password = hash("sha512", $password);
        $sqlQuery = 'SELECT * FROM tb_account WHERE (username= :username AND password= :password)';        
        
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute([':username'=> "$username", ':password' => "$password"]); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
           
        }
        $_SESSION['username'] = $username;
        return $dataSet;
       
}
   
}