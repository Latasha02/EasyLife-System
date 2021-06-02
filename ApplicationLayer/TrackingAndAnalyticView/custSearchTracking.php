<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Track My Order - Customer</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Tracking Department</h1>
        <div class="list-group">
          <a href="http://localhost/sdw/ApplicationLayer/foodModuleView/cAllFoodView.php?customerID=" class="list-group-item">Food Department</a>
          <a href="http://localhost/sdw/ApplicationLayer/goodsModuleView/cAllGoodsView.php?customerID=" class="list-group-item">Goods Department</a>
          <a href="http://localhost/sdw/ApplicationLayer/petproductModuleView/cAllpetproductView.php" class="list-group-item">Pets Department</a>
          <a href="http://localhost/sdw/ApplicationLayer/pharmacyModuleView/cpharmacyproductView.php" class="list-group-item">Medicine Department</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://bit.ly/3igNN9V" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://bit.ly/3vKQVyO" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://bit.ly/3uKT5gk" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
      <!-- /.col-lg-9 -->

      <div class="col-lg-3">
      </div>
      <div class="col-lg-9">
      <form action = "custViewTracking.php" method = "POST" enctype = "multipart/form-data" style = "margin-left: auto; margin-right: auto">
           
          <fieldset style = "border: solid black 1px; padding: 5px 100px">
            <table align = "center">
              <tr>
                <th style = "text-align: center; font-size: 30px">TRACKING ID</th>
              </tr>

              <tr>
                <td style = "padding-bottom: 1em; text-align: center; color:grey"><small>Please enter a valid tracking ID.</small></td>
              </tr>

              <tr>
                <td style = "padding-bottom: 1em"><input type = "text" name = "search" style = "color:dimgrey; text-align: center"></td>
              </tr>

              <tr>
                <td style = "padding-bottom: 1em; text-align: center">
                  <button class = "btn btn-info" name = "searchTrackID">
                    <i class ="fas fa-check"> Submit </i>
                  </button>
                </td>
              </tr>
            </table>
          </fieldset>
          <br>
      </form>

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
