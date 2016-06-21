<?php

//Account table
class userData {

    private $_id, $_email, $_username, $_password, $_profilePicture, $_personalised;

    public function __construct($dbRow) {
        if (isset($dbRow['id'])) {
            $this->_id = $dbRow['id'];
        }

        if (isset($dbRow['email'])) {
            $this->_email = $dbRow['email'];
        }
        if (isset($dbRow['username'])) {
            $this->_username = $dbRow['username'];
        }
        if (isset($dbRow['password'])) {
            $this->_password = $dbRow['password'];
        }
        if (isset($dbRow['profilePicture'])) {
            $this->_profilePicture = $dbRow['profilePicture'];
        }
        if (isset($dbRow['personalised'])) {
            $this->_personalised = $dbRow['personalised'];
        }
    }

    public function getID() {
        return $this->_id;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getProfilePicture() {
        return $this->_profilePicture;
    }

    public function getPersonalised() {
        return $this->_personalised;
    }

}
