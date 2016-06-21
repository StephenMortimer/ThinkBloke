<?php

require_once ('Models/ProductData.php');
require_once ('Models/Database.php');

class productDataSet {

    protected $_dbHandle, $_dbInstance;
    // For personalised likes
    public static $largest;
    public static $secondLargest;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function countLikes() {
        //Count Gaming
        $gaming = "SELECT COUNT(category) FROM tb_likes WHERE username = '" . $_COOKIE['username'] . "' AND category = 'Gaming' ";
        $statement = $this->_dbHandle->prepare($gaming); // prepare PDO statement
        $statement->execute(); // execute the PDO statement
        $result = $statement->fetch();
        $gamingCount = $result['COUNT(category)'];

        //Count Entertainment
        $entertainment = "SELECT COUNT(category) FROM tb_likes WHERE username = '" . $_COOKIE['username'] . "' AND category = 'Entertainment' ";
        $statement2 = $this->_dbHandle->prepare($entertainment); // prepare PDO statement
        $statement2->execute(); // execute the PDO statement
        $result2 = $statement2->fetch();
        $entertainmentCount = $result2['COUNT(category)'];
        //Count Sports
        $sports = "SELECT COUNT(category) FROM tb_likes WHERE username = '" . $_COOKIE['username'] . "' AND category = 'Sports' ";
        $statement3 = $this->_dbHandle->prepare($sports); // prepare PDO statement
        $statement3->execute(); // execute the PDO statement
        $result3 = $statement3->fetch();
        $sportsCount = $result3['COUNT(category)'];
        //Count Gadgets
        $gadgets = "SELECT COUNT(category) FROM tb_likes WHERE username = '" . $_COOKIE['username'] . "' AND category = 'Gadgets' ";
        $statement4 = $this->_dbHandle->prepare($gadgets); // prepare PDO statement
        $statement4->execute(); // execute the PDO statement
        $result4 = $statement4->fetch();
        $gadgetsCount = $result4['COUNT(category)'];
        //Count Novelty
        $novelty = "SELECT COUNT(category) FROM tb_likes WHERE username = '" . $_COOKIE['username'] . "' AND category = 'Novelty' ";
        $statement5 = $this->_dbHandle->prepare($novelty); // prepare PDO statement
        $statement5->execute(); // execute the PDO statement
        $result5 = $statement5->fetch();
        $noveltyCount = $result5['COUNT(category)'];
        //Count Food
        $food = "SELECT COUNT(category) FROM tb_likes WHERE username = '" . $_COOKIE['username'] . "' AND category = 'Food ' ";
        $statement6 = $this->_dbHandle->prepare($food); // prepare PDO statement
        $statement6->execute(); // execute the PDO statement
        $result6 = $statement6->fetch();
        $foodCount = $result6['COUNT(category)'];
        //Array of all count results
        $countArray = array("Gaming" => $gamingCount, "Entertainment" => $entertainmentCount, "Sports" => $sportsCount, "Gadgets" => $gadgetsCount, "Novelty" => $noveltyCount, "Food" => $foodCount);
        //Get largest number
        self::$largest = array_search(max($countArray), $countArray);

        //Second array without largest
        $secondArray = array("Gaming" => $gamingCount, "Entertainment" => $entertainmentCount, "Sports" => $sportsCount, "Gadgets" => $gadgetsCount, "Novelty" => $noveltyCount, "Food" => $foodCount);

        if (($key = array_search(max($secondArray), $secondArray)) !== false) {
            unset($secondArray[$key]);
            //Get second largest number
            self::$secondLargest = array_search(max($secondArray), $secondArray);
        }
    }

    //Fetch all products
    public function fetchAll() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY id DESC LIMIT  0, 96';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch products by oldest date
    public function fetchProductByOldest() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY id ASC';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch products by ID
    public function fetchProductById() {
        $sqlQuery = "SELECT * FROM tb_product WHERE id = '" . $_GET['id'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Edit/Update Product
    public function updateProduct($pname, $pcategory, $psummary, $pprice, $plink, $id) {
        $sqlQuery = 'UPDATE tb_product SET pname = "' . $pname . '", pcategory = "' . $pcategory . '", psummary = "' . $psummary . '", pprice = "' . $pprice . '", plink = "' . $plink . '" WHERE id = "' . $id . '"';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement
        print $sqlQuery;
    }

    //Fetch personalised likes
    public function fetchLiked() {
        $sqlQuery = "SELECT * FROM tb_product WHERE pcategory = '" . self::$largest . "' OR pcategory = '" . self::$secondLargest . "' ORDER BY RAND()";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch nothing
    public function fetchNone() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE 1 = 0;';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products by liked
    public function fetchAllByLikes() {
        $sqlQuery = "SELECT * FROM tb_product, tb_likes WHERE tb_product.id = tb_likes.productId AND tb_likes.username = '" . $_COOKIE['username'] . "' AND tb_likes.likeDislike = 'like' ORDER BY tb_likes.id DESC";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
        if (!$row) {
            echo "You haven't liked any products!";
        }
    }

    //Fetch all products by disliked
    public function fetchAllByDislikes() {
        $sqlQuery = "SELECT * FROM tb_product, tb_likes WHERE tb_product.id = tb_likes.productId AND tb_likes.username = '" . $_COOKIE['username'] . "' AND tb_likes.likeDislike = 'dislike'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Add like to product
    public function addLike($id, $category) {
        $sqlQuery = "SELECT productId, username, likeDislike from tb_likes WHERE productId = '" . $id . "' AND username = '" . $_COOKIE['username'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement       
        $row = $statement->fetch();

        $sqlQuery2 = "SELECT productId, username, likeDislike from tb_likes WHERE productId = '" . $id . "' AND username = '" . $_COOKIE['username'] . "' AND likeDislike = 'dislike'";
        $statement2 = $this->_dbHandle->prepare($sqlQuery2); // prepare PDO statement
        $statement2->execute(); // execute the PDO statement        
        $row2 = $statement2->fetch();

        if (!$row) {
            //Insert Row
            $sqlQuery3 = 'INSERT INTO tb_likes (productId, username, likeDislike, category)VALUES (' . $id . ', ' . '"' . $_COOKIE['username'] . '"' . ', ' . '"' . 'like' . '"' . ', ' . '"' . $category . '"' . ')';
            $statement3 = $this->_dbHandle->prepare($sqlQuery3);
            $statement3->execute(); // execute the PDO statement       
            //Increment by 1
            $sqlQuery4 = 'UPDATE tb_product SET plikes = plikes + 1 WHERE id = ' . $id . '';
            $statement4 = $this->_dbHandle->prepare($sqlQuery4);
            $statement4->execute(); // execute the PDO statement      
        } else {
            
        }

        if ($row2) {

            $sqlQuery5 = "DELETE FROM tb_likes WHERE productId = '" . $_GET['id'] . "' AND username = '" . $_COOKIE['username'] . "'";
            $statement5 = $this->_dbHandle->prepare($sqlQuery5);
            $statement5->execute(); // execute the PDO statement  

            $sqlQuery6 = 'INSERT INTO tb_likes (productId, username, likeDislike, category)VALUES (' . $_GET['id'] . ', ' . '"' . $_COOKIE['username'] . '"' . ', ' . '"' . 'like' . '"' . ', ' . '"' . $_GET['category'] . '"' . ')';
            $statement6 = $this->_dbHandle->prepare($sqlQuery6);
            $statement6->execute(); // execute the PDO statement 

            $sqlQuery7 = 'UPDATE tb_product SET pdislikes = pdislikes - 1 WHERE id = ' . $_GET['id'] . '';
            $statement7 = $this->_dbHandle->prepare($sqlQuery7);
            $statement7->execute(); // execute the PDO statement          

            $sqlQuery8 = 'UPDATE tb_product SET plikes = plikes + 1 WHERE id = ' . $_GET['id'] . '';
            $statement8 = $this->_dbHandle->prepare($sqlQuery8);
            $statement8->execute(); // execute the PDO statement 
        } else {
            
        }
    }

    //Remove like from product (used on profile page)
    public function removeLike() {
        $sqlQuery = "DELETE FROM tb_likes WHERE productId = '" . $_GET['id'] . "' AND username = '" . $_COOKIE['username'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement          

        $sqlQuery2 = 'UPDATE tb_product SET plikes = plikes - 1 WHERE id = ' . $_GET['id'] . '';
        $statement2 = $this->_dbHandle->prepare($sqlQuery2);
        $statement2->execute(); // execute the PDO statement 
        header("Location:profile.php");
    }

    //Remove dislike from product (used on profile page)
    public function removeDislike() {
        $sqlQuery = "DELETE FROM tb_likes WHERE productId = '" . $_GET['id'] . "' AND username = '" . $_COOKIE['username'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement  

        $sqlQuery2 = 'UPDATE tb_product SET pdislikes = pdislikes - 1 WHERE id = ' . $_GET['id'] . '';
        $statement2 = $this->_dbHandle->prepare($sqlQuery2);
        $statement2->execute(); // execute the PDO statement 
        header("Location:profile.php");
    }

    //Add a dislike to product
    public function addDislike() {
        $sqlQuery = "SELECT productId, username, likeDislike from tb_likes WHERE productId = '" . $_GET['id'] . "' AND username = '" . $_COOKIE['username'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement     
        $row = $statement->fetch();

        $sqlQuery2 = "SELECT productId, username, likeDislike from tb_likes WHERE productId = '" . $_GET['id'] . "' AND username = '" . $_COOKIE['username'] . "' AND likeDislike = 'like'";
        $statement2 = $this->_dbHandle->prepare($sqlQuery2); // prepare PDO statement
        $statement2->execute(); // execute the PDO statement        
        $row2 = $statement2->fetch();

        if (!$row) {
            $sqlQuery3 = 'INSERT INTO tb_likes (productId, username, likeDislike, category)VALUES (' . $_GET['id'] . ', ' . '"' . $_COOKIE['username'] . '"' . ', ' . '"' . 'dislike' . '"' . ', ' . '"' . $_GET['category'] . '"' . ')';
            $statement3 = $this->_dbHandle->prepare($sqlQuery3);
            $statement3->execute(); // execute the PDO statement 

            $sqlQuery4 = 'UPDATE tb_product SET pdislikes = pdislikes + 1 WHERE id = ' . $_GET['id'] . '';
            $statement4 = $this->_dbHandle->prepare($sqlQuery4);
            $statement4->execute(); // execute the PDO statement 
        } else {
            
        }
        if ($row2) {
            $sqlQuery5 = "DELETE FROM tb_likes WHERE productId = '" . $_GET['id'] . "' AND username = '" . $_COOKIE['username'] . "'";
            $statement5 = $this->_dbHandle->prepare($sqlQuery5);
            $statement5->execute(); // execute the PDO statement  

            $sqlQuery6 = 'INSERT INTO tb_likes (productId, username, likeDislike, category)VALUES (' . $_GET['id'] . ', ' . '"' . $_COOKIE['username'] . '"' . ', ' . '"' . 'dislike' . '"' . ', ' . '"' . $_GET['category'] . '"' . ')';
            $statement6 = $this->_dbHandle->prepare($sqlQuery6);
            $statement6->execute(); // execute the PDO statement  

            $sqlQuery7 = 'UPDATE tb_product SET plikes = plikes - 1 WHERE id = ' . $_GET['id'] . '';
            $statement7 = $this->_dbHandle->prepare($sqlQuery7);
            $statement7->execute(); // execute the PDO statement  

            $sqlQuery8 = 'UPDATE tb_product SET pdislikes = pdislikes + 1 WHERE id = ' . $_GET['id'] . '';
            $statement8 = $this->_dbHandle->prepare($sqlQuery8);
            $statement8->execute(); // execute the PDO statement 
        } else {
            
        }
    }

    //Fetch products by random date
    public function fetchAllRandom() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY RAND()';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Count rows in product table
    public function CountRow() {
        $count = 'SELECT * FROM tb_product ORDER BY id DESC';
        $statement = $this->_dbHandle->prepare($count); // prepare PDO statement
        $statement->execute(); // execute the PDO statement
        $number = $statement->rowCount();
    }

    //Add product from form
    public function addProduct($pname, $pcategory, $pimage, $psummary, $pprice, $plink) {
        $sqlQuery = 'INSERT INTO tb_product (pname, pcategory, pimage, psummary, pprice, plink)VALUES (' . ':pname' . ', ' . "'$pcategory'" . ', ' . "'$pimage'" . ', ' . ':psummary' . ', ' . "'$pprice'" . ', ' . "'$plink'" . ')';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':pname', $pname, PDO::PARAM_STR);
        $statement->bindParam(':psummary', $psummary, PDO::PARAM_STR);
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch products where category equals...
    public function fetchProductByCategory($pcategory) {
        $sqlQuery = "SELECT * FROM tb_product WHERE pcategory = '" . $pcategory . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch product where name equals...
    public function fetchProductByName($id) {
        $sqlQuery = "SELECT * FROM tb_product WHERE pname LIKE '%" . $_POST['pname'] . "%'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch product by most expensive first
    public function fetchProductByPriceHighest() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY pprice DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch product by least expensive first
    public function fetchProductByPriceLowest() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY pprice ASC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch most popular products first
    public function fetchAllByLikesHighest() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY plikes - pdislikes DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch least popular products first
    public function fetchAllByDislikesHighest() {
        $sqlQuery = 'SELECT * FROM tb_product ORDER BY pdislikes - plikes DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products of category 'Gaming'
    public function fetchAllByGaming() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE pcategory = "gaming" ORDER BY id DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products of category 'Entertainment'
    public function fetchAllByEntertainment() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE pcategory = "entertainment" ORDER BY id DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products of category 'Sports'
    public function fetchAllBySports() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE pcategory = "Sports" ORDER BY id DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products of category 'Gadgets'
    public function fetchAllByGadgets() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE pcategory = "Gadgets" ORDER BY id DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products of category 'Novelty'
    public function fetchAllByNovelty() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE pcategory = "Novelty" ORDER BY id DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Fetch all products of category 'Food&Drink'
    public function fetchAllByFoodndrink() {
        $sqlQuery = 'SELECT * FROM tb_product WHERE pcategory = "Food&Drink" ORDER BY id DESC';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new productData($row);
        }
        return $dataSet;
    }

    //Delete product by ID
    public function deleteProduct() {
        $sqlQuery = "DELETE FROM tb_product WHERE id = '" . $_GET['id'] . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
    }

}
