<?php
 require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/paymentController/paymentController.php';
//  require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/paymentController/paypalButton.php';
 require_once '/xampp/htdocs/SEM-group-5/libs/config.php';

 $payment = new paymentController();
 $data = $payment->viewDetails();
 $error_message = "";
 session_start();
 if(isset($_POST['add'])){
  $payment = $_POST['paymentMethod'];
  
  $item_name = $_POST['item_name'];
  $item_number = $_POST['item_number'];
  $total = (float) $_POST['amount'] + 4.5;
  
  if($payment == 'paypal'){
     if(empty($_POST['item_name']) || empty($_POST['item_number']) || empty($_POST['amount'])) {
     $error_message = "Invalid cart details. Please check your cart details and try again.";
    }
    if(!$total){
      $error_message = "Invalid amount details. Please check your cart details and try again.";
    }
    $_SESSION['item_name'] = $item_name;
    $_SESSION['item_number'] = $item_number;
    $_SESSION['total'] = $total;
    
    header("Location: ../../libs/paypal/charge.php");
 } 
    
 
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
                  <br></br>
                  <h1>Details </h1><br>
                  <?php if(!empty($error_message)) { echo $error_message;} ?>
        <div class="row">
          <table class="table table-striped table-bordered table-hover" id="foodTable">
      <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>CartID</th>
        <th>Food Quantity</th>
      
      </tr>
      </thead>
      <tbody>
      <div class="container">
    <form method="POST" action="">
      
        <?php
        $i=1;
        $total=0;
        $totalPayment=0;
        $shipping=4.50;
        foreach($data as $row){
        echo "<tr>"
       
        ."<td>".$row['productName']."</td>"
        ."<td> RM".$row['productPrice']."</td>"
        ."<td> ".$row['cartID']."</td>"
        ."<td>".$row['productQuantity']."</td>";
      

        $total += $row['productPrice'];
        $i++;
        echo "</tr>";
        }
        echo '<tr><td colspan="3">TOTAL</td>
        <td>RM' . $total . '</td></tr>';
      
        echo '<tr><td colspan="3">Shipping Fee</td>
        <td>RM' . $shipping . '</td></tr>';

        $totalPayment = $total + $shipping;
        echo '<tr><td colspan="3">TOTAL PAYMENT</td>
        <td>RM' .$totalPayment. '</td></tr>';

        ?>
        <tr>
        <!--Paypal payment form for displaying the buy button-->
        <!-- <form action="<?php echo PAYPAL-URL; ?>" method="post"> -->
        <!--Identify your business so that you can collect the payment-->
        <!-- <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>"> -->

        <!--Specify a buy now button -->
        <input type="hidden" name="cmd" value="_xclick">

        <!--specify details about the item that buyers will purchase -->
        <input type="hidden" name="item_name" value="<?php echo $row['productName']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['cartID']; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['productPrice']; ?>">
        <!-- <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>"> -->

        <!--specify URLs -->
        <!-- <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
        <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>"> -->
        

        <!--Display the payment button--> 
        <td><button class="btn"type="submit" name="add">
        <img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0"  alt="PayPal - The safer, easier way to pay online!"/>
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"/>
        </button><input type="hidden" name="paymentMethod" value="paypal"/></td>
        </form>
        </tr>
        
            </div>
       
        </tbody>
    
        </table>
        <?php require '/xampp/htdocs/SEM-group-5/BusinessLayer/paymentController/paypalButton.php'; ?>
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