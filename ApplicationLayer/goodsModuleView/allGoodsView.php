<?php
require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/goodsController/goodsController.php';
session_start();

$product = new goodsController();
$data = $product->viewAllProduct(); 

if(isset($_POST['delete'])){
    $product->delete();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
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
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login register/loginView.php">Logout</a>   
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cartModuleView/spOrderView.php">Order Notification</a>
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
        <h1 class="my-4">Goods Department</h1>
        <div class="list-group">
          <a href="../foodModuleView/allFoodView.php" class="list-group-item">Food Department</a>
          <a href="../petproductModuleView/allpetproductView.php" class="list-group-item">Pets Department</a>
          <a href="../pharmacyModuleView/allPharmacyproductView.php" class="list-group-item">Medicine Department</a>
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

      <br></br>

      <div class="row">
        <form action="" method="POST">
        <h2 style="color: #006699">View Product Details</h2><br>
        <table class="table table-striped table-bordered table-hover" id="goodsTable">
      <thead>
      <tr>
        <th>Picture</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Details</th>
        <th>Product Quantity</th>
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
                $image=$row['fileIn2'];
                echo '<span style="border: 1px solid black; display: inline-block"><input type ="image" img id="placeImage" img src="uploadimage/'.$image.'" height="100" width="100"></span>';
                ?></td>
            <td><a href="goodsView.php?productid=<?=$row['productid']?>"><?=$row['prodName']?></a></td>
            <td>RM<?=$row['prodPrice']?></td>
            <td><?=$row['prodDetail']?></td>
            <td><?=$row['prodQuantity']?></td>
          <td>
          <input type="button" class="btn btn-primary" onclick="location.href='editGoodsView.php?productid=<?=$row['productid']?>'" value="EDIT"><br>
          <input type="hidden" name="productid" value="<?=$row['productid']?>"><br>
          <input type="hidden" name="productid" value="<?=$row['productid']?>"><input type="submit" name="delete" value="DELETE">
                </td>
          </form>
                <?php
                  echo "</tr>";
                  }
                ?>
        </tbody>
        </table>

        <table>
          <td><input type="button" class="btn btn-primary" onclick="location.href='addGoodsView.php'" value="Add Product">
          <input type="button" class="btn btn-primary" onclick="location.href='../login register/spHomepageView.php'" value="Back"></td>
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
    $('#goodsTable').DataTable();
  } );
</script>

</body>

</html>