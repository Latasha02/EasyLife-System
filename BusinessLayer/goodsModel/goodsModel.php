<?php
require_once '/xampp/htdocs/SEM-group-5/libs/database.php';

class goodsModel{
    public $productid, $prodName, $prodType,$prodPrice,$prodDetail,$prodQuantity,$fileIn2,$productName, $productPrice, $productQuantity, $customerID;

    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sdw', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    function addProduct(){
        $sql = "insert into product(prodName, prodType, prodPrice, prodDetail, prodQuantity, fileIn2) values(:prodName, :prodType, :prodPrice, :prodDetail, :prodQuantity, :fileIn2)";
        $args = [':prodName'=>$this->prodName, ':prodType'=>$this->prodType, ':prodPrice'=>$this->prodPrice, ':prodDetail'=>$this->prodDetail, ':prodQuantity'=>$this->prodQuantity, ':fileIn2'=>$this->fileIn2];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallProduct(){
        $sql = "select * from product";
        return DB::run($sql);
    }

    
    function viewProduct(){
        $sql = "select * from product where productid=:productid";
        $args = [':productid'=>$this->productid];
        return DB::run($sql,$args);
    }
    
    function modifyProduct(){
       $sql = "update product set prodName=:prodName,prodType=:prodType,prodPrice=:prodPrice,prodDetail=:prodDetail,prodQuantity=:prodQuantity where productid=:productid";
        $args = [ ':productid'=>$this->productid,':prodName'=>$this->prodName,':prodType'=>$this->prodType,':prodPrice'=>$this->prodPrice,':prodDetail'=>$this->prodDetail,':prodQuantity'=>$this->prodQuantity];
        return DB::run($sql,$args);
    }
    
    function deleteProduct(){
        $sql = "delete from product where productid=:productid";
        $args = [':productid'=>$this->productid];
        return DB::run($sql,$args);
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