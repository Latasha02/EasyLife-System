<?php
require_once 'configAPI.php';
session_start();
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();

    if ($response->isSuccessful()) {
        $arr_body = $response->getData();
        $payment_id = $arr_body['id'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $product_name = $_SESSION['item_name'];
        $order_no = $_SESSION['item_number'];
        echo print_r($_SESSION);

        // Insert transaction data into the database
        $isPaymentExist = $db->query("SELECT * FROM payment WHERE payment_id = '".$payment_id."'");

        if($isPaymentExist->num_rows == 0) {
            $insert = $db->query("INSERT INTO payment(payment_id, productName, orderID, Total) VALUES('". $payment_id ."', '". $product_name ."', '". $order_no ."', '". $amount ."')");
        }
        // echo print_r($arr_body);
        unset($_SESSION['item_name']);
        unset($_SESSION['item_number']);
        unset($_SESSION['total']);
       header('Location: ../../ApplicationLayer/paymentModuleView/paymentInvoice.php');
    } else {
        echo $response->getMessage();
    }
}
else {
    echo 'Transaction is declined';
}
