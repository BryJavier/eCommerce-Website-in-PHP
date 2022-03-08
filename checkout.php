<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bryan's PC Parts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body class="bg-light" data-new-gr-c-s-check-loaded="14.1022.0" data-gr-ext-installed="">

    <?php
        require_once "utility/config.php";

        setcookie('page', basename($_SERVER['PHP_SELF']), time()+3600);
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login.php");
            exit;
        }
        
        include "topnav.php";

        // Define variable and initialize with empty values
        $address = $address2 = $address_err = "";
        $mode_of_payment = "";
        $products = "";
        $country = $province = $zip_code = "";

        //Processing form data when for is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Check if address is empty
            if(empty(trim($_POST["address1"]))){
                $address_err = "Please enter an address.";
            }else{
                $address = trim($_POST["address1"])." ". trim($_POST["address2"]);
            }
            
            //Country
            $country = $_POST["country"];

            //Province
            $province = $_POST["province"];

            //Zip Code
            $zip_code = $_POST["zip-code"];

            //Mode of payment
            $mode_of_payment = $_POST["payment-method"];

            //Products JSON File
            $products = $_POST["product-json"];

            //Prepare an insert statement for users table
            $sql = "update users set address = ?, country = ?, province = ?, zip_code = ? ".
                    "where username = '". $_SESSION["username"]. "'";
            
            if($stmt = mysqli_prepare($db, $sql)){
                //Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_address, $param_country, $param_province, $param_zip_code);

                //Set parameters
                $param_address = $address;
                $param_country = $country;
                $param_province = $province;
                $param_zip_code = $zip_code;

                //Attempt to execute the prepared statement
                if(!mysqli_stmt_execute($stmt)){
                    echo "Oops! Something wen wrong. Please try again later.";
                }
                
            
                //Close statement
                mysqli_stmt_close($stmt);
            }


            //Prepare an insert statement for transaction table
            $sql = "insert into transaction(username, products, mode_of_payment, purchase_date) ".
                    "values((select username from users where username = '". $_SESSION["username"]. "'), ".
                    "?, ?, ?)";

            if($stmt = mysqli_prepare($db, $sql)){
                //Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_products, $param_mode_of_payment, $param_purchase_date);

                //Set parameters
                $param_products = $products;
                $param_mode_of_payment = $mode_of_payment;
                $param_purchase_date = date("Y-m-d H:i:s");

                //Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    //Redirect to checkout confirmation page
                    header('Location: order_confirmation.php');
                }else{
                    echo "Oops! Something wen wrong. Please try again later.";
                }
            
                //Close statement
                mysqli_stmt_close($stmt);
            }
            
            
            mysqli_close($db);
        }
    ?>

    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Order Summary</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <span id="cart-items">
                    
                </span>

                <li class="list-group-item d-flex justify-content-between">
                <span>Total (PHP)</span>
                <strong id="total-price">$20</strong>
                </li>
            </ul>

            
            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>

            <?php 
                $query = "select address, country, province, zip_code from users where username = '".$_SESSION['username']."'";
                $result = $db->query($query);
                if($result){
                    $addressRow = $result->fetch_assoc();
                }

            ?>

            <form class="needs-validation" method="POST">
                <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address1" class="form-control" value="<?php echo isset($addressRow) ? $addressRow['address'] : ''; ?>" id="address" placeholder="1234 Quezon Ave" required="">
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
                </div>

                <div class="mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select class="custom-select d-block w-100" id="country" name="country" required="">
                    <?php 
                        if(isset($addressRow) && $addressRow['country'] == "Philippines"){
                            echo '<option value="'.$addressRow['country'].'">'.$addressRow['country'].'</option>';
                            echo '<option value="">Choose...</option>';
                        }else{
                            echo '<option value="Philippines">Philippines</option>';
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                    Please select a valid country.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="state">Province</label>
                    <select class="custom-select d-block w-100" id="state" name="province" required="">
                    <?php
                        if(isset($addressRow) && $addressRow['province'] == 'Quezon City'){
                            echo '<option value="'.$addressRow['province'].'">'.$addressRow['province'].'</option>';
                            echo '<option value="Makati City">Makati City</option>';
                        }else if(isset($addressRow) && $addressRow['province'] == 'Makati City'){
                            echo '<option value="'.$addressRow['province'].'">'.$addressRow['province'].'</option>';
                            echo '<option value="Quezon City">Quezon City</option>';
                        }else{
                            echo '<option value="">Choose...</option>';
                            echo '<option value="Quezon City">Quezon City</option>';
                            echo '<option value="Makati City">Makati City</option>';
                        }   
                    ?>
            
                    </select>
                    <div class="invalid-feedback">
                    Please provide a valid province.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" value="<?php echo isset($addressRow) ? $addressRow['zip_code'] : ''; ?>" name="zip-code" placeholder="" required="">
                    <div class="invalid-feedback">
                    Zip code required.
                    </div>
                </div>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3" id="payment">
                    <div class="custom-control custom-radio">
                        <input id="radio" value="Cash on Delivery" aria-label="cod" name="payment-method" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="cod">Cash On Delivery</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="radio" value="Credit Card" aria-label="cc" name="payment-method" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="radio" value="Debit Card" aria-label="dc" name="payment-method" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                </div>

                <div id="payment-info">
                
                </div>
                <hr class="mb-4">
                <input type="hidden" id="product-json" name="product-json">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2021 Bryan's PC Parts</p>
        </footer>
    </div>    

    <?php
         include "navbar.php";
    ?>
    <script src="js/cart.js" type="text/javascript"></script>
    <script src="js/navbar.js" type="text/javascript"></script>
    <script src="js/product.js" type="text/javascript"></script>
    <script src="js/checkout.js" type="text/javascript"></script>
</body>
</html>

