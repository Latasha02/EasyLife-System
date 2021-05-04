<?php 
require_once '/xampp/htdocs/sdw/libs/database.php';

class orderModel{
    public $productName, $productPrice, $productQuantity, $customerID, $name, $phoneNo, $address, $status;

function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sdw', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    function updateCart(){
        $sql = "update cart set productQuantity=:productQuantity, productPrice=:productPrice where cartID=:cartID";
        $args = [':cartID'=>$this->cartID, ':productQuantity'=>$this->productQuantity, ':productPrice'=>$this->productPrice];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }

    function cartView(){
        $sql = "select * from cart";
        return DB::run($sql);
    }

    function deleteProduct(){
        $sql = "delete from cart where cartID=:cartID";
        $args = [':cartID'=>$this->cartID];
        $stmt = orderModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function addInfo(){

        $sql="insert into custorder (name,phoneNo,address,orderStatus) values (:name, :phoneNo, :address, :status)";
        $args= [':name'=>$this->name, ':phoneNo'=>$this->phoneNo, ':address'=>$this->address, ':status'=>$this->status ];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }

    function viewOrder(){
        $sql = "select * from custorder where orderStatus=0";
        return DB::run($sql);
    }

    function rViewOrder(){
        $sql = "select * from custorder where orderStatus=1 OR orderStatus=2";
        return DB::run($sql);
    }

    function accept(){
        $sql = "update custorder set orderStatus=:status where orderID=:orderID";
        $args = [':status'=>$this->status, ':orderID'=>$this->orderID];
        return DB::run($sql, $args);
    }

    function rAccept(){
        $sql = "update custorder set orderStatus=:status where orderID=:orderID";
        $args = [':status'=>$this->status, ':orderID'=>$this->orderID];
        return DB::run($sql, $args);
    }

}

?>
