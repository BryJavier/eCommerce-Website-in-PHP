<?php
    require_once "utility/config.php";
    $query = "update transaction set order_canceled = true where id = '".$_POST['id']."'";

    $db->query($query);
    header('Location: all_products.php');
?>