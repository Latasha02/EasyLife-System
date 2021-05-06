<?php
require_once 'configAPI.php';

// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();

    if ($response->isSuccessful()) {
     
        header('Location: ../../ApplicationLayer/paymentModuleView/paymentInvoice.php');
    } else {
        echo $response->getMessage();
    }
}
else {
    echo 'Transaction is declined';
}
