<?php 
require_once '\xampp\htdocs\SEM-group-5\BusinessLayer\foodModel\foodModel.php';
echo ok;

class foodController{
    
function addFood(){
        $food = new foodModel();
        $food->foodName = $_POST['foodName'];
        $food->foodPrice = $_POST['foodPrice'];
        $food->foodType= $_POST['foodType'];
        $food->foodDetail = $_POST['foodDetail'];
        $food->foodQuantity = $_POST['foodQuantity'];
        $food->foodPic = $_POST['foodPic'];

        $filename=$_FILES['foodPic']['name'];
        $filetmpname=$_FILES['foodPic']['tmp_name'];
        $folder='uploadimage/';
        move_uploaded_file($filetmpname, $folder.$filename);
        $food->foodPic = $filename;

        if($food->addFood() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../foodModuleView/allFoodView.php';</script>";
        }
    }
    
    
    function viewAll(){
        $food = new foodModel();
        return $food->viewallFood();
    }

    function viewFood($foodID){
        $food = new foodModel();
        $food->foodID = $foodID;
        return $food->viewFood();
    }
    
    function editFood(){
        $food = new foodModel();
        $food->foodID = $_POST['foodID'];
        $food->foodName = $_POST['foodName'];
        $food->foodPrice = $_POST['foodPrice'];
        $food->foodType= $_POST['foodType'];
        $food->foodDetail = $_POST['foodDetail'];
        $food->foodQuantity = $_POST['foodQuantity'];

        if($food->modifyFood()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../foodModuleView/allFoodView.php?foodID=".$_POST['foodID']."';</script>";
        }
    }
    
    function delete(){
        $food = new foodModel();
        $food->foodID = $_POST['foodID'];
        if($food->deleteFood()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../foodModuleView/allFoodView.php';</script>";
        }
    }

    function addToCart($productTotalPrice){
        $product = new foodModel();
        $product->productName = $_POST['productName'];
        $product->productPrice = $productTotalPrice;
        $product->productQuantity = $_POST['productQuantity'];
        $product->customerID = $_POST['customerID'];

        if($product->addToCart() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../foodModuleView/cAllFoodView.php?customerID=$product->customerID';</script>";
        }
    }

    function viewAllFood(){
        $product = new foodModel();
        return $product->viewallFood();
    }



    }

?>
