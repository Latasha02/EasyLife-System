<?php
require_once '/xampp/htdocs/sdw/libs/config.php';
require_once '/xampp/htdocs/sdw/BusinessLayer/paymentController/paymentController.php';

if(!empty($_GET['OrderID']) && !empty($_GET['productName']) && !empty($_GET['productPrice']) && !empty($_GET['productQuantity']) ){
    $payment = new paymentController();
    $OrderID = $_GET['OrderID'];
    $productNameID = $_GET['productName'];
    $productPrice = $_GET['productPrice'];
    $productQuantity = $_GET['productQuantity'];

    $paypalCheck=$payment->paypalCheck($OrderID, $productNameID, $productPrice, $productQuantity);
    if($paypalCheck){
        header('Location:/..paymentModuleView/paymentInvoice.php'); // Success redirect to orders
    }
}
else{
    
    //header('Location:Location:ApplicationLayer/foodModuleView/allFoodView.php'); // Fail
}
?>