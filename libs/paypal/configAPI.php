<?php
require_once "vendor/autoload.php";

use Omnipay\Omnipay;

define('CLIENT_ID', 'AQrA6H-umUVS54lmnIW-uNwjxsMwIgogiGM063h-xpk5sBSc8GaO5rIEe-kSObquE9njVtAxomXwy9lQ');
define('CLIENT_SECRET', 'EIwsGUw1lJwj9iiQi9KfvDuNAsz_IIy0q6Wn-cFdUm4OiEkxQi51vDXlwz68209aoQ6pmP92hHZ7AEOK');

define('PAYPAL_RETURN_URL', 'http://localhost/sdw/libs/paypal/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/sdw/libs/paypal/cancel.php');
define('PAYPAL_CURRENCY', 'MYR'); // set your currency here

// Connect with the database
$db = new mysqli('localhost', 'root', '', 'sdw');

if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live
