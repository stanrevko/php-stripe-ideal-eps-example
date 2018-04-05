<div class="" style="height: 100px; margin-top: 50px;">
    <div style="float: left; width: 33%">
    <form action="/stripe-pay.php?type=ideal" method="POST">
        <input type="submit" value="iDeal" class="stripe-button-el stripe-btn-eps" >
    </form>
    </div>
    <div style="float: left; width: 33%">
        <form action="/stripe-pay.php?type=eps" method="POST">
            <input type="submit" class="stripe-button-el stripe-btn-eps" value="EPS">
        </form>
    </div>
    <div style="float: left; width: 33%">
    <form action="https://www.der-zooexperte.de/index.php?do=thxp" method="post">
      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="<?php echo $stripe['publishable_key']; ?>"
              data-description="<?=$_SESSION['orderidx']?>"
              data-currency="eur"
              data-amount="<?=$_SESSION['ogoneprice']?>"
              data-locale="auto"></script>
    </form>
    </div>

</div>

<style >
    .stripe-btn-eps{
        display: block;
        min-height: 30px;
        width: 120px;
        font-size: 14px;
        color: #fff;
        font-weight: bold;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
        background-image: linear-gradient(#7dc5ee,#008cdd 85%,#30a2e4)
    }

</style>