<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bryan's PC Parts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

    <?php
        setcookie('page', basename($_SERVER['PHP_SELF']), time()+3600);
        require_once "utility/config.php";
        include "topnav.php";
    ?>

    <!-- header -->
      <div class="header-welcome">
        <h1>Your Cart</h1>
      </div>

    <!-- if the cart is empty, display this -->
      <div class="header-welcome" id="cart-empty" style="display:none"></div>

    <!-- shopping cart -->
    <div class="cart-main bg-1">
    <div class="card cart-card gmd-5">
        <div class="cardhead">
            <div class="cart-title">Your Cart</div>
            <span _ngcontent-c6="" class="apntmnt_counter ng-star-inserted"><span _ngcontent-c6=""
                    class="counter">0</span></span>
        </div>

        <!-- -------------------------- -->
        <!--------- DESKTOP VIEW ---------->
        <!-- -------------------------- -->

        <div class="cart-row"></div>
        <div class="btcntyp-main">
            <div class="ttlamnt-main"> 
                <div class="ttlamnt-titl">Total Amount: </div>
                <div class="ttlamnt-amnt"></div>
            </div>
        </div>
        <button id="checkout-btn" class="crtcontinu-btn"> Continue <i class="material-icons">east</i></button>
    </div>

    <!-- -------------------------- -->
    <!--------- MOBILE VIEW ---------->
    <!-- -------------------------- -->
    <div class="mblcrt-view">
        <div class="mblcrt-footer">
            <div class="mblcrt-amnt-main">
                <div class="mblcrt-ttlamnt-div">
                    <div class="mblcrt-ttlamnt-amnt">PHP 0</div>
                </div>
                <div class="cntnu-btn">
                        <button id="checkout-btn-mbl" class="mblcrt-crtcontinu-btn"> Continue <i class="material-icons">east</i> </button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php
         include "navbar.php";
    ?>

    <script src="js/cart.js" type="text/javascript"></script>
    <script src="js/navbar.js" type="text/javascript"></script>
</body>
</html>
