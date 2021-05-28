<?php
require_once '/xampp/htdocs/SEM-group-5/libs/database.php';

class foodModel{ 
    public $foodID,  $foodName, $foodPrice, $foodType, $foodDetail, $foodQuantity, $foodPic, $productName, $productPrice, $productQuantity, $customerID;

function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sdw', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    function addFood(){
        $sql = "insert into food(foodName, foodPrice, foodType, foodDetail, foodQuantity, foodPic) values(:foodName, :foodPrice, :foodType, :foodDetail, :foodQuantity, :foodPic)";
        $args = [':foodName'=>$this->foodName, ':foodPrice'=>$this->foodPrice, ':foodType'=>$this->foodType, ':foodDetail'=>$this->foodDetail, ':foodQuantity'=>$this->foodQuantity, ':foodPic'=>$this->foodPic];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallFood(){
        $sql = "select * from food";
        return DB::run($sql);
    }
    
    function viewFood(){
        $sql = "select * from food where foodID=:foodID";
        $args = [':foodID'=>$this->foodID];
        return DB::run($sql,$args);
    }
    
    function modifyFood(){
        $sql = "update food set foodName=:foodName, foodPrice=:foodPrice, foodType=:foodType, foodDetail=:foodDetail, foodQuantity=:foodQuantity where foodID=:foodID";

        $args = ['foodID'=>$this->foodID, ':foodName'=>$this->foodName, ':foodPrice'=>$this->foodPrice, ':foodType'=>$this->foodType, ':foodDetail'=>$this->foodDetail, ':foodQuantity'=>$this->foodQuantity];
        return DB::run($sql,$args);
    }

    function deleteFood(){
        $sql = "delete from food where foodID=:foodID";
        $args = [':foodID'=>$this->foodID];
        $stmt = foodModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    
    function addToCart(){
        $sql = "insert into cart(productName, productPrice, productQuantity, customerID) values(:productName, :productPrice, :productQuantity, :customerID)";
        $args = [':productName'=>$this->productName, ':productPrice'=>$this->productPrice, ':productQuantity'=>$this->productQuantity, ':customerID'=>$this->customerID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

}

?>
