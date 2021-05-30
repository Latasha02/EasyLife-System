<?php
// require 'config.php';
require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/paymentController/paymentController.php';
session_start();
$paymentID = $_SESSION["paymentID"];
$payment = new paymentController();
$paypalCheck = $payment->getInvoiceDetail($paymentID);
$data = $paypalCheck;

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
  <style>
  
  #invoice-details div {
     display:flex;
  }
  #invoice-details div span{
      width: 120px;
  }

  .total {
     height:50px;
     margin-top:30px;
     border-top:2px solid black;
     border-bottom:2px solid black;
     display:flex;
     align-items: center;
     justify-content:flex-end;
  }
 
  </style>

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


<div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br></br>
        <h1 class="my-4">Order Summary</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Pets Department</a>
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
        <br><br>
        <div class="container">
            <div class="card">
            <div class="card-header">
            Invoice
            <strong><?php echo $data[0]["payment_id"]?></strong> 
            <span class="float-right"> <strong>Status:</strong> Success</span>

            </div>
            <div class="card-body">
            <div class="row mb-4">
            <div class="col-sm-6">
            <h6 class="mb-3">Order id : <?php echo $data[0]["orderID"];?></h6>
            <div>
            </div>
            </div>
            </div>
            <hr>
            <div>
               <span><?php echo $data[0]["productName"]?></span>
               <span class="float-right"><?php echo "RM" . $data[0]["Total"]?></span> 
            </div>
            <div class="total">
               <span class="float-right" style="width:100px;"><strong>Total</strong></span>
               <span class="float-right"><?php echo "RM" . $data[0]["Total"]?></span>
               
            </div>
        <br>
        
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


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