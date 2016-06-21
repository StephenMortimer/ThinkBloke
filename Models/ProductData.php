<?php

//Product Table
class productData {

    private $_id, $_productId, $_pname, $_pcategory, $_pimage, $_psummary, $_pprice, $_plink, $_plikes, $_pdislikes;

    public function __construct($dbRow) {
        if (isset($dbRow['id'])) {
            $this->_id = $dbRow['id'];
        }
        if (isset($dbRow['pname'])) {
            $this->_pname = $dbRow['pname'];
        }
        if (isset($dbRow['productId'])) {
            $this->_productId = $dbRow['productId'];
        }
        if (isset($dbRow['pcategory'])) {
            $this->_pcategory = $dbRow['pcategory'];
        }
        if (isset($dbRow['pimage'])) {
            $this->_pimage = $dbRow['pimage'];
        }
        if (isset($dbRow['psummary'])) {
            $this->_psummary = $dbRow['psummary'];
        }
        if (isset($dbRow['pprice'])) {
            $this->_pprice = $dbRow['pprice'];
        }
        if (isset($dbRow['plink'])) {
            $this->_plink = $dbRow['plink'];
        }
        if (isset($dbRow['plikes'])) {
            $this->_plikes = $dbRow['plikes'];
        }
        if (isset($dbRow['pdislikes'])) {
            $this->_pdislikes = $dbRow['pdislikes'];
        }
    }

    public function getID() {
        return $this->_id;
    }

    public function getProductID() {
        return $this->_productId;
    }

    public function getPname() {
        return $this->_pname;
    }

    public function getPimage() {
        return $this->_pimage;
    }

    public function getPcategory() {
        return $this->_pcategory;
    }

    public function getPsummary() {
        return $this->_psummary;
    }

    public function getPprice() {
        return $this->_pprice;
    }

    public function getPlink() {
        return $this->_plink;
    }

    public function getPlikes() {
        return $this->_plikes;
    }

    public function getPdislikes() {
        return $this->_pdislikes;
    }

}
