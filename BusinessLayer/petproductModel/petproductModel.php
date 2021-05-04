<?php
require_once '/xampp/htdocs/sdw/libs/database.php';

class petproductModel{ 
    public $petproductID,  $petproductName, $petproductPrice, $petproductType, $petproductDetail, $petproductQuantity, $petproductPic, $productName, $productPrice, $productQuantity, $customerID;

function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sdw', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    function addpetproduct(){
        $sql = "insert into petproduct(petproductName, petproductPrice, petproductType, petproductDetail, petproductQuantity, petproductPic) values(:petproductName, :petproductPrice, :petproductType, :petproductDetail, :petproductQuantity, :petproductPic)";
        $args = [':petproductName'=>$this->petproductName, ':petproductPrice'=>$this->petproductPrice, ':petproductType'=>$this->petproductType, ':petproductDetail'=>$this->petproductDetail, ':petproductQuantity'=>$this->petproductQuantity, ':petproductPic'=>$this->petproductPic];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallpetproduct(){
        $sql = "select * from petproduct";
        return DB::run($sql);
    }
    
    function viewpetproduct(){
        $sql = "select * from petproduct where petproductID=:petproductID";
        $args = [':petproductID'=>$this->petproductID];
        return DB::run($sql,$args);
    }
    
    function modifypetproduct(){
        $sql = "update petproduct set petproductName=:petproductName, petproductPrice=:petproductPrice, petproductType=:petproductType, petproductDetail=:petproductDetail, petproductQuantity=:petproductQuantity where petproductID=:petproductID";

        $args = ['petproductID'=>$this->petproductID, ':petproductName'=>$this->petproductName, ':petproductPrice'=>$this->petproductPrice, ':petproductType'=>$this->petproductType, ':petproductDetail'=>$this->petproductDetail, ':petproductQuantity'=>$this->petproductQuantity];
        return DB::run($sql,$args);
    }

    function deletepetproduct(){
        $sql = "delete from petproduct where petproductID=:petproductID";
        $args = [':petproductID'=>$this->petproductID];
        $stmt = petproductModel::connect()->prepare($sql);
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
