<?php
require_once '/xampp/htdocs/sdw/BusinessLayer/pharmacyController/pharmacyproductController.php';

$pharmacyproductID = $_GET['pharmacyproductID'];

$pharmacyproductID = new pharmacyproductController();
$pharmacyproductData = $pharmacyproduct->viewPharmacyProduct($pharmacyproductID);

if(isset($_POST['update'])){
    $pharmacyproduct->editPharmacyProduct();
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
  <link href="/sdw/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/sdw/css/shop-homepage.css" rel="stylesheet">
  
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
            <a class="nav-link" href="../loginRegisterModuleView/homepage.php">Home
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
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br></br>
        <h1 class="my-4">Pharmacy Department</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Pets Department</a>
          <a href="#" class="list-group-item">Food Department</a>
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

        <div class="row">
       <form action="" method="POST">
          <table class="table table-striped table-bordered table-hover" id="pharmacyproductTable">
  <?php 
  foreach($pharmacyproductData as $row){?>
      <thead>
      <tr>
        <th>Picture</th>
        <td></td>
      </tr>
      <tr>
        <th>Pharmacy Product Name</th>
        <td><input class="form-control" name="pharmacyproductName" value="<?=$row['pharmacyproductName']?>" readonly></td>
      </tr>
      <tr>
        <th>Pharmacy Product Price</th>
        <td><input class="form-control" name="pharmacyProductPrice" value="<?=$row['pharmacyPrice']?>" required="required"></td>
      </tr>
     
      <tr>
        <th>Pharmacy Product Details</th>
        <td><input class="form-control" name="Pharmacy Product Detail" value="<?=$row['Pharmacy Product Detail']?>" readonly></td>
      </tr>
      <tr>
        <th>Pharmacy Product Quantity</th>
        <td><div><input class="form-control" name="Pharmacy Product Quantiy" value="<?=$row['pharmacyproductQuantity']?>" required="required"></td>
      </tr>
      <tr>
        <th>Action</th>
        <td><input type="hidden" name="pharmacyproductID" value="<?=$row['pharmacyproductID']?>">
          <input type="submit" class="btn btn-primary" name="update" value="Update">&nbsp;
        <input type="button" class="btn btn-primary" onclick="location.href='allPharmacyProductView.php'" value="BACK"></td>
      </tr>
                <?php
                  echo "</tr>";
                  }
                ?>
      </tbody>
      </table>
    </form>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <br></br><br></br><br></br><br></br><br></br>
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
    $('#pharmacyproductTable').DataTable();
  } );
</script>

</body>

</html>