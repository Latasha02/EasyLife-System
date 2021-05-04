<?php
  
  require_once '/xampp/htdocs/sdw/BusinessLayer/TrackingAndAnalyticC/Tracking&AnalyticC.php';

      $trackingID = $_POST['search'];

      $tracking = new trackingAnalyticController();

      $data = $tracking->view($trackingID);

      $search = $tracking->search($trackingID);
    
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tracking Status - Customer</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    table, th, td{
      border: 1px solid black;
    }

    th, td{
      text-align: center;
      padding-top: 1em;
      padding-bottom: 1em;
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

        <h1 class="my-4">Tracking Department</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Food Department</a>
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Pets Department</a>
          <a href="#" class="list-group-item">Medicine Department</a>
          <br>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
      <br>
      <form action = "custSearchTracking.php" method = "POST" enctype = "multipart/form-data" style = "margin-left: auto; margin-right: auto">

        <h2 style = "text-align: center"><b>TRACKING STATUS</b></h2>

        <?php
          $i = 1;
          foreach($data as $row){
        ?>

        <h5 style = "text-align: center; color:blue"><b>TRACKING ID : <?=$row['trackingID']?></b></h5>

            <table align = "center">
              <tr>
                <th>DATE</th>
                <th>STATUS</th>
                <th>REMARKS</th>
              </tr>

              <tr>
                <td><?=$row['date']?></td>
                <td style = "color: red"><?=$row['trackStatus']?></td>
                <td><?=$row['trackRemarks']?></td>
              </tr>

              <?php 
                $i++; } 
              ?>

            </table>

            <br>

            <button class="btn btn-danger" name="back" onclick="location.href='/opt/lampp/htdocs/sdw/ApplicationLayer/TrackingAndAnalyticView/custSearchTracking.php?trackingID=<?=$row['trackingID']?>'">Back</button>  

      </form>
      
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
