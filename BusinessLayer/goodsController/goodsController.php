<?php
require_once '\xampp\htdocs\SEM-group-5\BusinessLayer\goodsModel\goodsModel.php';

class goodsController{

    function addProduct(){
        $product = new goodsModel();
        $product->prodName =  $_POST['prodName'];
        $product->prodType =  $_POST['prodType'];
        $product->prodPrice =  $_POST['prodPrice'];
        $product->prodDetail =  $_POST['prodDetail'];
        $product->prodQuantity =  $_POST['prodQuantity'];
 
        $filename=$_FILES['fileIn2']['name'];
        $filetmpname=$_FILES['fileIn2']['tmp_name'];
        $folder='uploadimage/';
        move_uploaded_file($filetmpname, $folder.$filename);
        $product->fileIn2 = $filename;

        if($product->addProduct() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../goodsModuleView/allGoodsView.php';</script>";
        }
    }

    function viewAll(){
        $product= new goodsModel();
        return $product->viewallProduct();
    }

    function viewProduct($productid){
        $product = new goodsModel();
        $product->productid = $productid;
        return $product->viewProduct();
    }
    
    function editProduct(){
        $product = new goodsModel();
        $product->productid =  $_POST['productid'];
        $product->prodName =  $_POST['prodName'];
        $product->prodType =  $_POST['prodType'];
        $product->prodPrice =  $_POST['prodPrice'];
        $product->prodDetail =  $_POST['prodDetail'];
        $product->prodQuantity =  $_POST['prodQuantity'];

        if($product->modifyProduct()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../goodsModuleView/allGoodsView.php?productid=".$_POST['productid']."';</script>";
        }
    }
    
    function delete(){
        $product = new goodsModel();
        $product->productid = $_POST['productid'];
        if($product->deleteProduct()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../goodsModuleView/allGoodsView.php';</script>";
        }
    }

    function addToCart($productTotalPrice){
        $product = new goodsModel();
        $product->productName = $_POST['productName'];
        $product->productPrice = $productTotalPrice;
        $product->productQuantity = $_POST['productQuantity'];
        $product->customerID = $_POST['customerID'];

        if($product->addToCart() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../goodsModuleView/cAllGoodsView.php?customerID=$product->customerID';</script>";
        }
    }

    function viewAllProduct(){
        $product = new goodsModel();
        return $product->viewallProduct();
    }

     
}
?>