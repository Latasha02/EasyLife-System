<?php
require_once '/xampp/htdocs/sdw/BusinessLayer/pharmacyController/pharmacycontroller.php';

$food = new pharmacyController();

if(isset($_POST['add'])){
    $pharmacy->addPharmacy();
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

<script>
    var load = function(event){
    var image = document.getElementById('placeImage');
    image.src = URL.createObjectURL(event.target.files[0]);
      };

    function displayFile(){
    var x = document.getElementById("pharmacyPic").files[0];
    var y = x.name;

    document.myForm.fileOut.value = y;
    }
</script>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br></br>
        <h1 class="my-4">Pharmacy Department</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Pets Department</a>
          <a href="#" class="list-group-item">Food</a>
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
       <form method="post" action="" enctype="multipart/form-data">
          <table class="table table-striped table-bordered table-hover" id="pharmacyTable">
      <thead>
      <tr>
        <th rowspan="3">Picture &nbsp;</th>
        <td style="text-align: right;" rowspan="3"><span style="border: 1px solid black; display: inline-block"><img id="placeImage" height="120" width="120"></span>
        <input type="button" value="Select File" id="demo" onclick="document.getElementById('pharmacyPic').click();">
                    <input type="file" accept="image/*" name="pharmacyPic" id="pharmacyPic" onchange="load(event)" style="display: none;"></td>
      </tr>
      <tr></tr>
      <tr></tr>
      <tr>
        <th>Pharmacy Name</th>
        <td><input class="form-control" name="pharmacyName" required="required" placeholder="pharmacy's Name"></td>
      </tr>
      <tr>
        <th>Pharmacy Price</th>
        <td><input class="form-control" name="pharmacyPrice" placeholder="Pharmacy Price" required="required"></td>
      </tr>
     
      <tr>
        <th>Pharmacy Details</th>
        <td><input class="form-control" name="pharmacyDetail" required="required" placeholder="pharmacy's Details"></td>
      </tr>
      <tr>
        <th>Pharmacy Quantity</th>
        <td><input class="form-control" name="pharmacyQuantity" placeholder="Pharmacy Quantity" required="required"></td>
      </tr>

      <tr>
        <th>Action</th>
        <td><input type="submit" class="btn btn-primary" name="add" value="Add">&nbsp;
        <input type="reset"  class="btn btn-primary" value="RESET">
        <input type="button" class="btn btn-primary" onclick="location.href='allPharmacyView.php'" value="Back"></td>
      </tr>
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
