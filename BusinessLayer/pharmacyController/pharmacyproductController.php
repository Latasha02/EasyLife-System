<?php
require_once '\xampp\htdocs\sdw\BusinessLayer\pharmacyModel\pharmacyproductModel.php';

class pharmacyproductController{
    
function addPharmacyproduct(){
        $pharmacyproduct = new pharmacyproductModel();
        $pharmacyproduct->pharmacyproductName = $_POST['pharmacyproductName'];
        $pharmacyproduct->pharmacyproductPrice = $_POST['pharmacyproductPrice'];
        $pharmacyproduct->pharmacyDetail = $_POST['pharmacyproductDetail'];
        $pharmacyproduct->pharmacyproductQuantity = $_POST['pharmacyproductQuantity'];
        $pharmacyproduct->pharmacyproductPic = $_POST['pharmacyproductPic'];

        $filename=$_FILES['pharmacyproductPic']['name'];
        $filetmpname=$_FILES['pharmacyproductPic']['tmp_name'];
        $folder='uploadimage/';
        move_uploaded_file($filetmpname, $folder.$filename);
        $pharmacyproduct->pharmacyproductPic = $filename;

        if($pharmacyproduct->addpharmacyproduct() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../pharmacyproductModuleView/allpharmacyproductView.php';</script>";
        }
    }
    
    
    function viewAll(){
        $pharmacyproduct = new pharmacyproductModel();
        return $pharmacyproduct->viewallpharmacyproduct();
    }

    function viewPharmacyProduct($pharmacyproductID){
        $pharmacyproduct = new pharmacyproductModel();
        $pharmacyproduct->pharmacyproductID = $pharmacyproductID;
        return $pharmacyproduct->viewPharmacyProduct();
    }
    
    function editPharmacyProduct(){
        $pharmacyproduct = new pharmacyproductModel();
        $pharmacyproduct->pharmacyproductID = $_POST['pharmacyproductID'];
        $pharmacyproduct->pharmacyproductPrice = $_POST['pharmacyproductPrice'];
        $pharmacyproduct->pharmacyproductQuantity = $_POST['pharmacyproductQuantity'];

        if($pharmacyproduct->modifypharmacyproduct()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../pharmacyproductModuleView/allpharmacyprofuctView.php?pharmacyproductID=".$_POST['pharmacyproductID']."';</script>";
        }
    }
    
    function delete(){
        $pharmacyproduct = new pharmacyproductModel();
        $pharmacyproduct->pharmacyproductID = $_POST['pharmacyproductID'];
        if($pharmacyproduct->deletepharmacyproduct()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../pharmacyproductModuleView/allpharmacyproductView.php';</script>";
        }
    }
    }

?>
