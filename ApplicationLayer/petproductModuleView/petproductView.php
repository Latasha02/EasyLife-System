<?php 
require_once '/xampp/htdocs/sdw/BusinessLayer/petproductController/petproductController.php';

$petproductID = $_GET['petproductID'];

$petproduct = new petproductController();
$petproductData = $petproduct->viewpetproduct($petproductID); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
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
          <a href="../petproductModuleView/allGoodsView.php" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Food Department</a>
          <a href="#" class="list-group-item">Medicine Department</a>
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
              <br>
<?php 
          if(!empty($_SESSION["shopping_cart"])) {
          $cart_count = count(array_keys($_SESSION["shopping_cart"]));
          echo $cart_count;} ?>

        <div class='product_wrapper'>
        <?php

            foreach($petproductData as $row){
              echo "<form method='POST' action=''>
              <tr>";
        ?>
        <h2 style='color: #006699'>petproduct Details</h2>
        <table class='table table-striped table-bordered table-hover' id='petproductTable'>

            <thead>
            <tr>
            <th>Picture</th> 
            <td rowspan='1'>
                <?php
                $image=$row['petproductPic'];
                echo '<span style="border: 1px solid black; display: inline-block"><input type ="image" img id="placeImage" img src="uploadimage/'.$image.'" height="100" width="100"></span>';
                ?></td>
            </tr>
            <tr>
            <th>petproduct Name</th>
            <td><?=$row['petproductName']?></td>
            </tr>
            <tr>
            <th>petproduct Price</th>
            <td>RM<?=$row['petproductPrice']?></td>
            </tr>
            <tr>
            <th>petproduct Type</th>
            <td><?=$row['petproductType']?></td>
            </tr>
            <tr>
            <th>petproduct Details</th>
            <td><?=$row['petproductDetail']?></td>
            </tr>
            <tr>
            <th>petproduct Quantity</th>
            <td><?=$row['petproductQuantity']?></td>
            </tr>
            </tbody>
            </tr>
        </table>
      </form>
      <?php
      echo "</tr>";
      ?>

      <table>
        <td>
          <input type="button" class="btn btn-primary" onclick="location.href='editpetproductView.php?petproductID=<?=$row['petproductID']?>'" value="EDIT">
          <input type="hidden" name="petproductID" value="<?=$row['petproductID']?>">
          <input type="button" class="btn btn-primary" onclick="location.href='allpetproductView.php'" value="Back">
        </td>
      </table>

      <?php
      }
      ?>

<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
</div>

        </div>


      </div>


    </div>


  </div>

<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
</div>

</div>


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
