<?php
require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/petproductController/petproductController.php';

$petproductID = $_GET['petproductID'];

$petproduct = new petproductController();
$petproductData = $petproduct->viewpetproduct($petproductID);

if(isset($_POST['update'])){
    $petproduct->editpetproduct();
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
        <h1 class="my-4">Pets Department</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Food Department</a>
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

  <div class="row">
  <h2 style="color: #006699">Edit Product Details</h2>

  <table class="table table-striped table-bordered table-hover" id="petproductTable">
  <?php
    foreach($petproductData as $row){
      echo "<tr>";
  ?>
  <form action="" method="POST">
    <thead>
      <tr>
        <th rowspan="1">Picture &nbsp;</th>
        <td><?php
                $image=$row['petproductPic'];
                echo '<span style="border: 1px solid black; display: inline-block"><input type ="image" img id="placeImage" img src="uploadimage/'.$image.'" height="100" width="100"></span>';
                ?>
        </td>
      </tr>
      <tr>
        <th>petproduct Name</th>
        <td><input class="form-control" name="petproductName" value="<?=$row['petproductName']?>" readonly></td>
      </tr>
      <tr>
        <th>petproduct Price</th>
        <td><input class="form-control" name="petproductPrice" value="<?=$row['petproductPrice']?>" required="required"></td>
      </tr>
      <tr>
        <th>petproduct Type</th>
        <td>  
          <select class="form-control" name="petproductType"  id="petproductType" required="required">
          <option VALUE="">-Choose petproduct Type-</option>
          <option value="Food" <?=$row['petproductType']=="Food" ? "checked" : ""?>>Food</option>
          <option value="Toys" <?=$row['petproductType']=="Toys" ? "checked" : ""?>>Toys</option>
          <option value="Shampoo" <?=$row['petproductType']=="Shampoo" ? "checked" : ""?>>Shampoo</option>
          <option value="Cage" <?=$row['petproductType']=="Cage" ? "checked" : ""?>>Cage</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>petproduct Details</th>
        <td><input class="form-control" name="petproductDetail" value="<?=$row['petproductDetail']?>" readonly></td>
      </tr>
      <tr>
        <th>petproduct Quantity</th>
        <td><input class="form-control" name="petproductQuantity" value="<?=$row['petproductQuantity']?>" required="required"></td>
      </tr>
      <tr>
        <th>Action</th>
        <td><input type="hidden" name="petproductID" value="<?=$row['petproductID']?>">
          <input type="submit" class="btn btn-primary" name="update" value="Update">&nbsp;
        <input type="button" class="btn btn-primary" onclick="location.href='allpetproductView.php'"value="BACK"></td>
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
    $('#petproductTable').DataTable();
  } );
</script>

</body>

</html>