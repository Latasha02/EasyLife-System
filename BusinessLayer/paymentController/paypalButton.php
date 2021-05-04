<?php
require_once '/xampp/htdocs/sdw/BusinessLayer/paymentController/process.php';

?>

<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
<?php if(PRO_PayPal) { ?>
      env: 'production',
<?php } else {?>
       env: 'sandbox',
<?php } ?>

client: {
     sandbox:    '<?php echo PayPal_CLIENT_ID; ?>',
     production: '<?php echo PayPal_CLIENT_ID; ?>'
},

// Show the buyer a 'Pay Now' button in the checkout flow
commit: true,

// payment() is called when the button is clicked
payment: function(data, actions) {

   // Make a call to the REST api to create the payment
   return actions.payment.create({
   payment: {
        transactions: [
       {
        amount: {
        total: '<?php echo $product->productPrice ?>'
    
        }
        } ]
        }
        });
        },

        // onAuthorize() is called when the buyer approves the payment
         onAuthorize: function(data, actions) {
                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                console.log('Payment Complete!');

                window.location = "<?php echo BASE_URL ?>/xampp/htdocs/sdw/BusinessLayer/paymentController/process.php?payment_id="+data.payment_id+"&orderID="+data.orderID+&cartID=<?php echo $product->cartID ?>";

                });
            }
        }, '#paypal-button-container');
</script>