<?php
require 'config.php';
require_once '/xampp/htdocs/sdw/BusinessLayer/paymentController/paymentController.php';

$payment = new paymentController();
$paypalCheck=$payment->paypalCheck();
?>
<?php if($paypalCheck) { ?>
<table>
<?php foreach($paypalCheck as $paypalCheck){  ?>
<tr>
   <td>Invoices - <?php echo $paypalCheck->orderID; ?></td>
   <td><?php echo $paypalCheck->productName; ?></td>
   <td><?php echo $paypalCheck->productPrice.' '.$paypalCheck->currency; ?></td>
   <td><?php echo $payment->timeFormat($paypalCheck->created); ?></td>
</tr>
<?php } ?>
</table>
<?php }  else { ?>
<div> No Orders</div>
<?php } ?>