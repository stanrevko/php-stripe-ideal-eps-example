<?php
include_once("_lib/db_class.php");
require_once('_include/stripe/config.php');

$sourceStr = $_REQUEST['source'];
$clientSecret = $_REQUEST['client_secret'];
?>
<div id="source-updates">
   Please wait 3 seconds ...
</div>

<form id="stripe-form-continue" action="/stripe-webhook.php">
    <input id="stripe-source" name="source" type="hidden"/>
    <input type="submit" value="Redirect"></input>
</form>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    Stripe.setPublishableKey('<?=$stripe['publishable_key']?>');
    Stripe.source.poll(
        '<?=$sourceStr?>',
        '<?=$clientSecret?>',
    function(status, source) {
        var para = document.createElement("p");
        var node = document.createTextNode("New source status: " + source.status);
        para.appendChild(node);
        var element = document.getElementById("source-updates");
        element.appendChild(para);

        if(source){
            document.getElementById('stripe-source').value = JSON.stringify(source) ;
            document.getElementById('stripe-form-continue').submit();
        }else{
            alert('Payment Error' + status );
        }
    })
</script>