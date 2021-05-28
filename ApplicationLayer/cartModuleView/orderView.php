<?php
require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/orderController/orderController.php';

$order = new orderController();
$data = $order->viewCart();
$customerID = $_GET['customerID'];


if(isset($_POST['confirm'])){
    $order->confirm();
}


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
            <a class="nav-link" href="cartView.php">Cart</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br></br><br></br><br></br>
        
        <div class="list-group">
          <a href="#" class="list-group-item">Food Department</a>
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="../petproductModuleView/cAllpetproductView.php" class="list-group-item">Pets Department</a>
          <a href="#" class="list-group-item">Medicine</a>
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
                  <h1>Order Information</h1><br>

              <form action="" method="POST" align="center">
              Your name: <input type="text" name="name" placeholder="Customer's Name"><br><br>
              Phone Number: <input type="text" name="phoneNo" placeholder="Phone Number"><br><br>
              Address: <input type="text" name="address" placeholder="Your address">

        <div class="row">
          <table class="table table-striped table-bordered table-hover" id="foodTable">
      <thead>
      <tr>
        <th>Number</th>
        <th>Product Name</th>
      </tr>
      </thead>
      <tbody>
          <?php
          $i=1;
          $finalPrice =0;

            foreach($data as $row){
              echo "<tr>";
             ?>

            <td><?php echo $i ?></td>
            <td><?=$row['productName']?></td>
                <?php $i++; $finalPrice += $row['productPrice'];
                  echo "</tr>";
                  }
                ?>
               <td colspan="2"><?php echo 'Total Price :RM'.$finalPrice?></td>
          <table>      
            <input type="button" class="btn btn-primary" onclick="location.href='../login register/cHomepageView.php'" value="Back"></td>
            <input type="submit" class="btn btn-primary" name="confirm" value="Confirm"></td>
          </form>
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