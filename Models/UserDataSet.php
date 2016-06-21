<?php

require_once ('Models/UserData.php');
require_once ('Models/Database.php');

class userDataSet {

    public static $rows;
    public static $check;
    public static $accounts;
    public static $changed;
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    //Fetch all accounts
    public function fetchAllAccounts() {
        $sqlQuery = 'SELECT * FROM tb_account order by id DESC';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }

    //Check personalised button
    public function fetchPersonalised() {
        $sqlQuery = "SELECT personalised FROM tb_account WHERE username = '" . $_COOKIE['username'] . "'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }

    //Check if it is toggled
    public function checkChecked() {
        $sqlQuery = "SELECT COUNT(personalised) FROM tb_account WHERE (username = '" . $_COOKIE['username'] . "' AND personalised = 'checked')";
        $result = $this->_dbHandle->prepare($sqlQuery);
        $result->execute();
        self::$check = $result->fetch(PDO::FETCH_NUM);
        self::$check = self::$check[0];
    }

    //Update personalised button on toggle click
    public function updatePersonalised() {
        $sqlQuery = "SELECT personalised FROM tb_account WHERE username = '" . $_COOKIE['username'] . "' AND personalised = 'checked' ";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement  
        $row = $statement->fetch();

        if (!$row) {
            $sqlQuery2 = "UPDATE tb_account SET personalised = 'checked' WHERE username = '" . $_COOKIE['username'] . "'";
            $statement2 = $this->_dbHandle->prepare($sqlQuery2); // prepare PDO statement
            $statement2->execute(); // execute the PDO statement  
        } else {
            $sqlQuery2 = "UPDATE tb_account SET personalised = '' WHERE username = '" . $_COOKIE['username'] . "'";
            $statement2 = $this->_dbHandle->prepare($sqlQuery2); // prepare PDO statement
            $statement2->execute(); // execute the PDO statement      
        }
    }

    //Fetch user profile picture
    public function fetchProfilePicture() {
        $sqlQuery = "SELECT profilePicture FROM tb_account WHERE username = '" . $_COOKIE['username'] . "'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
        
    }

    //Upload new profile picture
    public function addPicture($profilePicture) {
        $sqlQuery = "UPDATE tb_account SET profilePicture = '" . $profilePicture . "' WHERE username = '" . $_COOKIE['username'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement
        
    }

    //Check if email exists
    public function checkEmail($email) {
        $sqlQuery = 'SELECT COUNT(*) FROM tb_account WHERE (email =' . "'$email'" . ')';
        $result = $this->_dbHandle->prepare($sqlQuery);
        $result->execute();
        self::$rows = $result->fetch(PDO::FETCH_NUM);
        self::$rows = self::$rows[0];
    }

    //Update new email
    public function updateEmail($existingEmail, $verifyEmail) {
        $changed = userDataSet::$changed;
        $sqlQuery = 'SELECT * FROM tb_account WHERE (email =' . "'$existingEmail'" . ')';
        $result = $this->_dbHandle->prepare($sqlQuery);
        $result->execute();
        $count = $result->rowCount();
        if ($count > 0) {
            $sqlQuery2 = 'UPDATE tb_account SET email = "' . $verifyEmail . '" WHERE username = "' . $_COOKIE['username'] . '"';
            $statement = $this->_dbHandle->prepare($sqlQuery2); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement
            userDataSet::$changed = '<div class="alert alert-success" role="alert">You have successfully changed your email address.</div>';
        } else {
            userDataSet::$changed = '<div class="alert alert-danger" role="alert">Your existing email address was incorrect.</div>';
        }
    }

    //Update password
    public function updatePassword($existing, $verify) {

        $existing = hash("sha512", $existing);
        $sqlQuery = 'SELECT * FROM tb_account WHERE username = "' . $_COOKIE['username'] . '" AND password = :existing';
        $result = $this->_dbHandle->prepare($sqlQuery);
        $result->execute([':existing' => "$existing"]);
        $count = $result->rowCount();
        if ($count > 0) {
            $verify = hash("sha512", $verify);
            $sqlQuery2 = 'UPDATE tb_account SET password = :verify WHERE username = "' . $_COOKIE['username'] . '"';
            $statement = $this->_dbHandle->prepare($sqlQuery2); // prepare a PDO statement
            $statement->execute([':verify' => "$verify"]);
            userDataSet::$changed = '<div class="alert alert-success" role="alert">You have successfully changed your password.</div>';
        } else {
            userDataSet::$changed = '<div class="alert alert-danger" role="alert">Your existing password was incorrect.</div>';
        }
    }

    //Add new account
    public function createAccount($email, $username, $password) {
        $password = hash("sha512", $password);
        $sqlQuery = 'SELECT COUNT(*) FROM tb_account WHERE (email =' . "'$email'" . ')';
        $result = $this->_dbHandle->prepare($sqlQuery);

        if ($result->fetchColumn() > 0) {
            $registered = "An account with this email address already exists.";
        } else {
            $sqlQuery2 = 'INSERT INTO tb_account (email, username, password, profilePicture)VALUES (' . "'$email'" . ', ' . "'$username'" . ', ' . "'$password'" . ', ' . "'miniheader.png'" . ')';
            $statement = $this->_dbHandle->prepare($sqlQuery2); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement
            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new userData($row);
                $registered = "You have successfully created an account!";
            }
            return $dataSet;
        }
    }

}