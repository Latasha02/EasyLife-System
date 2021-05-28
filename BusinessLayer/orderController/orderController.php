<?php 
require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/orderModel/orderModel.php';

class orderController{ 
    
function update($productTotalPrice){
        $product = new orderModel();
        $product->productQuantity = $_POST['productQuantity'];
        $product->productPrice = $productTotalPrice;
        $product->cartID = $_POST['cartID'];
        
        if($product->updateCart()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../cartModuleView/cartView.php';</script>";
        }
    }

function viewCart(){
        $product = new orderModel();
        return $product->cartView();
    }

function delete(){
        $product = new orderModel();
        $product->cartID = $_POST['cartID'];
        if($product->deleteProduct()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../cartModuleView/cartView.php';</script>";
        }
    }

function confirm(){
    $product = new orderModel();
    $product->status=0;
    $product->name = $_POST['name'];
    $product->phoneNo = $_POST['phoneNo'];
    $product->address = $_POST['address'];

    if($product->addInfo()){
            $message = "Success Order!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../login register/cHomepageView.php';</script>";
    }
}

function viewOrder(){
    $product = new orderModel();
    return $product->viewOrder();
}

function rViewOrder(){
    $product = new orderModel();
    return $product->rViewOrder();
}

function accept(){
    $product = new orderModel();
    $product->orderID = $_POST['orderID'];
    $product->status = 1;

    if($product->accept()){
        $message = "Success accept!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../cartModuleView/spOrderView.php';</script>";
        }
    }

function rAccept(){
    $product = new orderModel();
    $product->orderID = $_POST['orderID'];
    $product->status = 2;

    if($product->accept()){
        $message = "Success accept!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../cartModuleView/rOrderView.php';</script>";
        }
}


}
?>
