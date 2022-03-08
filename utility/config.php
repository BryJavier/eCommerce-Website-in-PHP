<?php
/*
Username: user
Password: admin
*/

// Attempt to connect to the database
$db = mysqli_connect('localhost', 'user', 'admin', 'products');

//Checks if connection is successful
if($db === false){
    die("ERROR CONNECTING TO THE DATABASE: ". mysqli_connect_error());
}


session_start();
?>