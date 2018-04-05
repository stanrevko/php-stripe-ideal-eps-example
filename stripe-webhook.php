<?php
include_once("_lib/db_class.php");
require_once('_include/stripe/config.php');
$source = json_decode($_REQUEST['source']);

$redirect_url = "https://www.der-zooexperte.de/$_SESSION[l]/checkout.htm";

if ($source->status == 'chargeable') {
    try{
        $charge = \Stripe\Charge::create(array(
            'amount' => $source->amount,
            'currency' => $source->currency,
            'source' => $source->id,
            'description' => $event->type." payment for " . $source->owner->name,
        ));

        if($charge->status == "succeeded"){
            $redirect_url = 'https://www.der-zooexperte.de/index.php?do=thxp';
        }
    }catch (Exception $e){
        //todo: set errors
    }
}

header('Location: '.$redirect_url);