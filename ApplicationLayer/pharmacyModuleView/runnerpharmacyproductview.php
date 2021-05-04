<?php
//this page is interface for runner to view delivery task
require_once '/xampp/htdocs/sdw/BusinessLayer/pharmacyController/pharmacyproductController.php';

$pharmacyproduct = new pharmacyproductController();
$data = $pharmacyproduct->runnerViewAllpharmacyorder();
$d= $pharmacyproduct->viewAllpharmacyorder();

if(isset($_POST['delivery'])){
    $pharmacyproduct->editStatus();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="/sdw/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/sdw/css/shop-homepage.css" rel="stylesheet">

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

        <h1 class="my-4"><br></br>pharmacyproduct Department</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Goods Department</a>
          <a href="#" class="list-group-item">Pets Department</a>
          <a href="#" class="list-group-item">Pharmacy Department</a>
        </div>

      </div>
	<hr color="black" width="100%">
	<h1 align="center">Task to do</h1>
	<hr color="black" width="100%">
	<table border="1px" align="center">
            <thead>
            <th>No</th>
            
            <th>Product Name</th>
            <th>Action</th> 
            <th>Status</th>          
            </thead>
                      
            <?php
            $i = 1;
            foreach($data as $row){   
                      echo "<td>".$i."</td>"
                       . "<td>".$row['pharmacyproductID']."</td>";
               ?>
               
            <td><form action="" method="POST">  
                    <input type="hidden" name="pharmacyproductorderID" value="<?=$row['pharmacyproductorderID']?>">
                    <input type="hidden" name="pharmacyproductorderstatus" value="Delivered">
                    <input type="submit" name="delivery" value="Delivered">
                    
                </form></td>       
              <?php
              echo "<td>".$row['pharmacyproductorderstatus']."</td>";
              $i++;
             echo "</tr>";  
          }
            ?>
        </table>
        </div>
<footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">© 2020 Copyright AFO Software</div>
</footer>
</body>
</html>
</body>
</html>