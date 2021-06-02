<?php
require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/foodController/foodController.php';
session_start();
$customerID = $_SESSION['customerID'];
$product = new foodController();
$data = $product->viewAllFood();


if(isset($_POST['delete'])){
    $food->delete();
}

if (isset($_POST['addToCart'])) {
  $price=$_POST['productPrice'];
  $amount=$_POST['productQuantity'];
  
  $productTotalPrice=$price*$amount;
  $product->addToCart($productTotalPrice);}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Bootstrap core CSS -->
  <link href="/SEM-group-5/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/SEM-group-5/css/shop-homepage.css" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../loginRegisterModuleView/homepage.php">Keep It Simple</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Customer</a>   
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="../login register/loginView.php">Logout</a>      
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cartModuleView/cartView.php">Cart</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br></br>
        <h1 class="my-4">Food Department</h1>
        <div class="list-group">
          <a href="../goodsModuleView/cAllGoodsView.php" class="list-group-item" >Goods Department</a>
          <a href="../petproductModuleView/cAllpetproductView.php" class="list-group-item">Pets Department</a>
          <a href="../pharmacyModuleView/cpharmacyproductView.php" class="list-group-item">Medicine</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
            </div>
            <div class="carousel-item">
            </div>
            <div class="carousel-item">
            </div>
          </div>
        </div>
                  <br></br>
                  <h1>Customer View</h1><br>
        <div class="row">
          <table class="table table-striped table-bordered table-hover" id="foodTable">
      <thead>
      <tr>
        <th>Picture</th>
        <th>Food Name</th>
        <th>Food Price</th>
        <th>Food Details</th>
        <th>Food Quantity</th>
        <th>View</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
          <?php
            foreach($data as $row){
              echo "<tr>";
          ?>

          <form action="" method="POST">
          <tr>
            <td rowspan="1">
                <?php
                $image=$row['foodPic'];
                echo '<span style="border: 1px solid black; display: inline-block"><input type ="image" img id="placeImage" img src="uploadimage/'.$image.'" height="100" width="100"></span>';
                ?></td>
            <td><?=$row['foodName']?></td>
            <td>RM<?=$row['foodPrice']?></td>
            <td><?=$row['foodDetail']?></td>
            <td><?=$row['foodQuantity']?></td>
            <td><button> <a href="../foodModuleView/foodView.php?foodID=<?=$row['foodID'];?>">VIEW</a></button></td>
            

          <td><form action="" method="POST">
            <input type="number" name="productQuantity" value="1">
            <input type="hidden" name="productName" value="<?=$row['foodName']?>">
            <input type="hidden" name="productPrice" value="<?=$row['foodPrice']?>">
            <input type="hidden" name="customerID" value="<?php echo $customerID?>">     
            <input type="submit" name="addToCart" value="Add To Cart">
          </form></td>
                   </form>
                <?php
                  echo "</tr>";
                  }
                ?>
          <table>
            <input type="button" class="btn btn-primary" onclick="location.href='../login register/cHomepageView.php'" value="Back"></td>
          </table>
        </tbody>
        </table>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br>
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Keep It Simple &copy; Group 5</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script>
  $(document).ready(function () {
    $('#foodTable').DataTable();
  } );
</script>

</body>

</html>