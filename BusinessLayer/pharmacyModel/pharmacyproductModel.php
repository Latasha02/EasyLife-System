<?php
require_once '/xampp/htdocs/sdw/libs/database.php';

class pharmacyproductModel{
    public $pharmacyproductID,  $pharmacyproductName, $pharmacyproductPrice,  $pharmacyproductDetail, $pharmacyproductQuantity, $pharmacyproductPic;

function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sdw', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    function addpharmacyproduct(){
        $sql = "insert into pharmacyproduct(pharmacyproductName, pharmacyproductPrice, pharmacyproductDetail, pharmacyproductQuantity, pharmacyproductPic) values(:pharmacyproductName, :pharmacyproductPrice,  :pharmacyproductDetail, :pharmacyproductQuantity, :pharmacyproductPic)";
        $args = [':pharmacyproductName'=>$this->pharmacyproductName, ':pharmacyproductPrice'=>$this->pharmacyproductPrice, ':pharmacyproductType'=>$this->pharmacyproductType, ':pharmacyproductDetail'=>$this->pharmacyproductDetail, ':pharmacyproductQuantity'=>$this->pharmacyproductQuantity, ':pharmacyproductPic'=>$this->pharmacyproductPic];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallpharmacyproduct(){
        $sql = "select * from pharmacyproduct";
        return DB::run($sql);
    }
    
    function viewpharmacyproduct(){
        $sql = "select * from pharmacyproduct where pharmacyproductID=:pharmacyproductID";
        $args = [':pharmacyproductID'=>$this->pharmacyproductID];
        return DB::run($sql,$args);
    }
    
    function modifypharmacyproduct(){
        $sql = "update pharmacyproduct set pharmacyproductPrice=:pharmacyproductPrice, pharmacyproductQuantity=:pharmacyproductQuantity where pharmacyproductID=:pharmacyproductID";

        $args = ['pharmacyproductID'=>$this->pharmacyproductID, ':pharmacyproductPrice'=>$this->pharmacyproductPrice,  ':pharmacyproductQuantity'=>$this->pharmacyproductQuantity];
        return DB::run($sql,$args);
    }

    function deletepharmacyproduct(){
        $sql = "delete from pharmacyproduct where pharmacyproductID=:pharmacyproductID";
        $args = [':pharmacyproductID'=>$this->pharmacyproductID];
        $stmt = pharmacyproductModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

}

?>
