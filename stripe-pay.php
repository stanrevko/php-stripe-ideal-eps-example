<?php
include_once("_lib/db_class.php");
require_once('_include/stripe/config.php');

$owner_name =   $_SESSION['user'];
$owner_email = $_SESSION['uemail'];
$amount  = $_SESSION['ogoneprice'];
$return_url = "https://www.der-zooexperte.de/stripe-continue.php";

if(isset($_GET['type']) && $_GET['type']){
    $type = $_GET['type'];
    if($type == "ideal" || $type == "eps"){
        $source = \Stripe\Source::create(array(
            'type' => $type,
            'amount' => $amount,
            'currency' => 'eur',
            'owner' => array(
                'name' => $owner_name,
                'email' => $owner_email,
            ),
            'redirect' => array('return_url' => $return_url),
        ));

        header('Location: '. $source->redirect->url);
    }else{
        exit('Wrong payment type');
    }
}else{
    exit('Payment type is empty');
}