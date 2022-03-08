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
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/order_confirmation.css">
</head>
<body>

    <?php
        setcookie('page', basename($_SERVER['PHP_SELF']), time()+3600);
        require_once "utility/config.php";

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login.php");
            exit;
        }

        $dbError = mysqli_connect_errno();
        if($dbError){
            echo "Error: Could not connect to the database. Please try again. <br> Error Code: $dbError";
        }else{
            //If connection is successful, execute select query
            $query = "select (select max(transaction.id) from transaction where transaction.username = '".$_SESSION['username']."') as id, transaction.username, transaction.products, transaction.mode_of_payment, transaction.purchase_date, ".
                    "users.username, users.firstname, users.lastname, users.address, users.country, users.province, users.zip_code ".
                    "from transaction ".
                    "inner join users ".
                    "on transaction.username = users.username ".
                    "where transaction.id = (select max(transaction.id) from transaction where transaction.username = '".$_SESSION['username']."')";

            $result = $db->query($query);
            $row = $result->fetch_assoc();

            $products = json_decode($row['products']);


        }
        include "topnav.php";
    ?>
    <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="invoice p-5">
                    <h5>Your Order is Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, <?php echo $row['firstname']. " " . $row['lastname'];?></span> <span>You order has been confirmed and will be shipped in the following days!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span class="content"><?php echo $row['purchase_date']?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span> <span class="content"><?php echo $row['id']?></span></div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment</span> <span class="content"><?php echo $row['mode_of_payment']?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping Address</span> <span class="content"><?php echo $row['address'].' '.$row['province'].' '. $row['country'].' '.$row['zip_code']?></span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <?php
                                    $totalPrice = 0;
                                   for ($i=0; $i < count($products->products); $i++) { 
                                       echo '<tr>';
                                       echo '<td width="20%"> <img src="'.$products->image["$i"].'" width="90"> </td>';
                                       echo '<td width="60%"> <span class="font-weight-bold">'.$products->products["$i"].'</span>';
                                            echo '<div class="product-qty"> <span class="d-block">Quantity:'.$products->qty["$i"].'</span></div>';
                                       echo '</td>';
                                       echo '<td width="20%">';
                                            echo '<div class="text-right"> <span class="font-weight-bold">₱'.number_format($products->price["$i"],2).'</span> </div>';
                                       echo '</td>';
                                       echo '</tr>';

                                       $totalPrice += $products->price["$i"];
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">₱<?php echo number_format($totalPrice,2)?></span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Bryan's PC Parts</span>
                    <hr>
                    <form action="cancel_order.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id']?>" name="id">
                        <p><button type="submit" class="btn btn-danger">Cancel Order</button></p>
                    </form>
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
    <script src="js/order_confirmation.js" type="text/javascript"></script>
</body>
</html>

