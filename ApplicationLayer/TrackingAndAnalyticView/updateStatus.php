 <?php

  require_once '/xampp/htdocs/sdw/BusinessLayer/TrackingAndAnalyticC/Tracking&AnalyticC.php';

  date_default_timezone_set('Asia/Kuala_Lumpur');

  $trackingID = $_GET['trackingID'];

  $tracking = new trackingAnalyticController();

  $status = $tracking->view($trackingID);

  if(isset($_POST['update'])){
     $tracking->update($trackingID);
  }
?> 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Update Tracking Status - Runner</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td{
      text-align: center;
    }

    th{
      background-color: gainsboro;
    }
  </style>

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Keep It Simple</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="manageTracking.php">Home
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

        
        <h1 class="my-4">Tracking Department</h1>

        <div class="list-group">
          <a href="#" class="list-group-item">Food Department</a>
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Pets Department</a>
          <a href="#" class="list-group-item">Medicine Department</a>
          <a href="./runnerUpdate.php" class="list-group-item">Update Status</a>
          <a href="./runnerAnalytic.php" class="list-group-item">Analytic Report</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->
      

      <div class="col-lg-9">
        <br>
        <form action = "" method = "POST" enctype = "multipart/form-data" style = "margin-left: auto; margin-right: auto">

          <h2 style = "text-align: center"><b>TRACKING STATUS</b></h2>

          <br>

          <table>
          <tr>
            <td>TRACKING ID</td>
            <td>DATE</td>
            <td>STATUS</td>
            <td>REMARKS</td>
            <td>ACTION</td>
          </tr>

          <tr>
          <td> 
          <?php 
             foreach ($status as $row){
              echo $row['trackingID'];
            
          ?>
          </td>

          <td>
            <input type = "text" name = "date" value="<?=date("Y-m-d")?>">
          </td>

          <td>
              <select name = "trackStatus">
                <option selected = "selected">--CHOOSE STATUS--</option>
                <option>PROCESSING</option>
                <option>DELIVERING</option>
                <option>DELIVERED</option>
          </td>

          <td>
            <input type ="text" name = "trackRemarks" rows = "2" cols = "10">
          </td>

          <td>
            <button class="btn btn-success" name="update">
            <i class="fas fa-check">Update</i></button>
          </td>
          </tr>
          </table>

          <br><br>

            <table style="border:1px solid black" align = "center">

              <tr>                
                <th>DATE</th> 
                <th>STATUS</th>
                <th>REMARK</th>
              </tr>

              <tr>
                <td><?=$row['date']?></td>
                <td><?=$row['trackStatus']?></td>
                <td><?=$row['trackRemarks']?></td>
              </tr>

              <?php }?>

            </table>  
        </form>
          <br>
          <br>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
