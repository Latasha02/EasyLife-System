<?php
require_once 'configAPI.php';

session_start();
echo $_SESSION['total'];
if (!empty($_SESSION['total'])) {

    try {
        $response = $gateway->purchase(array(
            'amount' =>  $_SESSION['total'],
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();

        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
            // unset($_SESSION['quantity']);
            // unset($_SESSION['ProductID']);
            // unset($_SESSION['OrderAddress']);
            unset($_SESSION['total']);
            
        } else {
            // not successful
            echo $response->getMessage();
            
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}
