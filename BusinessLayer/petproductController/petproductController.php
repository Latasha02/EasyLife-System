<?php 
require_once '\xampp\htdocs\SEM-group-5\BusinessLayer\petproductModel\petproductModel.php';

class petproductController{
    
function addpetproduct(){
        $petproduct = new petproductModel();
        $petproduct->petproductName = $_POST['petproductName'];
        $petproduct->petproductPrice = $_POST['petproductPrice'];
        $petproduct->petproductType= $_POST['petproductType'];
        $petproduct->petproductDetail = $_POST['petproductDetail'];
        $petproduct->petproductQuantity = $_POST['petproductQuantity'];
        $petproduct->petproductPic = $_POST['petproductPic'];

        $filename=$_FILES['petproductPic']['name'];
        $filetmpname=$_FILES['petproductPic']['tmp_name'];
        $folder='uploadimage/';
        move_uploaded_file($filetmpname, $folder.$filename);
        $petproduct->petproductPic = $filename;

        if($petproduct->addpetproduct() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../petproductModuleView/allpetproductView.php';</script>";
        }
    }
    
    
    function viewAll(){
        $petproduct = new petproductModel();
        return $petproduct->viewallpetproduct();
    }

    function viewpetproduct($petproductID){
        $petproduct = new petproductModel();
        $petproduct->petproductID = $petproductID;
        return $petproduct->viewpetproduct();
    }
    
    function editpetproduct(){
        $petproduct = new petproductModel();
        $petproduct->petproductID = $_POST['petproductID'];
        $petproduct->petproductName = $_POST['petproductName'];
        $petproduct->petproductPrice = $_POST['petproductPrice'];
        $petproduct->petproductType= $_POST['petproductType'];
        $petproduct->petproductDetail = $_POST['petproductDetail'];
        $petproduct->petproductQuantity = $_POST['petproductQuantity'];

        if($petproduct->modifypetproduct()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../petproductModuleView/allpetproductView.php?petproductID=".$_POST['petproductID']."';</script>";
        }
    }
    
    function delete(){
        $petproduct = new petproductModel();
        $petproduct->petproductID = $_POST['petproductID'];
        if($petproduct->deletepetproduct()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../petproductModuleView/allpetproductView.php';</script>";
        }
    }

    function addToCart($productTotalPrice){
        $product = new petproductModel();
        $product->productName = $_POST['productName'];
        $product->productPrice = $productTotalPrice;
        $product->productQuantity = $_POST['productQuantity'];
        $product->customerID = $_POST['customerID'];

        if($product->addToCart() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../petproductModuleView/cAllpetproductView.php?customerID=$product->customerID';</script>";
        }
    }

    function viewAllpetproduct(){
        $product = new petproductModel();
        return $product->viewallpetproduct();
    }



    }

?>
